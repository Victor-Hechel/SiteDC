<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Model{


	public function Cadastrar($dados){
		if ($dados != null) {
			echo("<br>Dados<br>");
			print_r($dados);
			$infoBasica = $this->GetInfoBasicaFromArray($dados);
			echo("<br>Info Basica<br>");
			print_r($infoBasica);

			$id = $this->CadastrarDadosBásicos($infoBasica);
			
			$infoBolsistas = $this->GetBolsistasFromArray($dados, $id);
			echo("<br>Bolsistas<br>");
			print_r($infoBolsistas);
			$this->CadastrarBolsistas($infoBolsistas);

			$infoEquipe = $this->GetEquipeFromArray($dados, $id);
			echo("<br>Equipe<br>");
			print_r($infoEquipe);
			$this->CadastrarEquipe($infoEquipe);

		}
	}

	private function GetInfoBasicaFromArray($dados){
		return array('titulo' => $dados['titulo'],
					 'coordenador' => $dados['coordenador'],
					 'descricao' => $dados['descricao'],
				     'tipo' => $dados['tipo']);
	}

	private function GetBolsistasFromArray($dados, $id){
		$infoBolsistas = array();
		foreach ($dados['bolsista'] as $value) {
			$infoBolsistas[] = array('aluno' => $value, 'idprojeto' => $id);
		}
		return $infoBolsistas;
	}

	private function GetEquipeFromArray($dados, $id){
		$infoEquipe = array();
		foreach ($dados['equipe'] as $value) {
			$infoEquipe[] = array('idprofessor' => $value, 'idprojeto' => $id);
		}

		return $infoEquipe;
	}

	private function CadastrarDadosBásicos($infoBasica){
		$this->db->insert('projetos', $infoBasica);
		return $this->db->insert_id();
	}

	private function CadastrarBolsistas($infoBolsistas){
		$this->db->insert_batch('projeto_bolsista', $infoBolsistas);
	}

	private function CadastrarEquipe($infoEquipe){
		$this->db->insert_batch('projeto_professor', $infoEquipe);
	}

	public function Listar(){
		$this->db->select("projetos.id, projetos.titulo, professores.nome, projetos.tipo");
		$this->db->from("projetos");
		$this->db->join("professores", "professores.siape = projetos.coordenador");
		$query = $this->db->get(); 
		return $query->result();
	}

	public function Excluir($id){
		$this->db->where("id", $id);
		$this->db->delete("projetos");
	}

	public function Update($dados, $id){
		
		$infoBasica = $this->GetInfoBasicaFromArray($dados);

		$this->EditarInfoBasica($infoBasica, $id);

		$this->DeleteBolsistas($id);

		$infoBolsistas = $this->GetBolsistasFromArray($dados, $id);
		$this->CadastrarBolsistas($infoBolsistas);

		$this->DeleteEquipe($id);
		$infoEquipe = $this->GetEquipeFromArray($dados, $id);
		$this->CadastrarEquipe($infoEquipe);
	}

	private function EditarInfoBasica($info, $id){
		$this->db->where('id', $id);
		$this->db->update('projetos', $info);
	}

	private function DeleteBolsistas($id){
		$this->db->where('idprojeto', $id);
		$this->db->delete('projeto_bolsista');
	}

	private function DeleteEquipe($id){
		$this->db->where('idprojeto', $id);
		$this->db->delete('projeto_professor');
	}

	public function getProjeto($id){
		$this->db->select("projetos.id, projetos.titulo, professores.siape, projetos.tipo, 
						   projetos.coordenador, projetos.descricao, projeto_bolsista.aluno,
						   projeto_professor.idprofessor");
		$this->db->from("projetos");
		$this->db->join("professores", "professores.siape = projetos.coordenador");
		$this->db->join("projeto_bolsista", "projeto_bolsista.idprojeto = projetos.id");
		$this->db->join("projeto_professor", "projeto_professor.idprojeto = projetos.id", "left");
		$this->db->where('projetos.id', $id);
		$data = $this->db->get()->result();
		
		$bolsistasArr = array();
		$professoresArr = array();
		foreach ($data as $value) {
			if(!in_array($value->idprofessor, $professoresArr)){
				$professoresArr[] = $value->idprofessor;
			}

			if(!in_array($value->aluno, $bolsistasArr)){
				$bolsistasArr[] = $value->aluno;
			}
		}
		$data[0]->aluno = $bolsistasArr;
		$data[0]->idprofessor = $professoresArr;

		return $data[0];
	}

	public function getBolsistas($idProjeto){
		$this->db->select("projeto_bolsista.aluno");
		$this->db->from("projeto_bolsista");
		$this->db->where("projeto_bolsista.idprojeto", $idProjeto);
		return $this->db->get()->result();
	}
}