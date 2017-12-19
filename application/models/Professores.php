<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends CI_Model{


	public function Cadastrar($dados){
		if ($dados != null) {
			$this->db->insert('professores', $dados);
		}
	}

	public function Listar(){
		$this->db->select("professores.siape, professores.nome, professores.email, professores.ativo");
		$this->db->from("professores");
		$query = $this->db->get(); 
		return $query->result();
	}

	public function Excluir($id){
		$this->db->where("siape", $id);
		$this->db->delete('professores');
	}

	public function Editar($dados, $id){
		$this->db->where('siape', $id);
		$this->db->update('professores', $dados);
	}

	public function getProfessor($id){
		$this->db->select("siape, nome, titulacao, lattes, email, foto");
		$this->db->where('siape', $id);
		return $this->db->get('professores')->row();
	}

	public function addFoto($siape, $ext){
		$this->db->where('siape', $siape);
		$this->db->update('professores', array('foto' => $ext));
	}

	public function AlterarAtivo($id, $arr){
		$this->db->where('siape', $id);
		$this->db->update('professores', array('ativo' => $arr));
	}

	public function ListarAtivos(){
		$this->db->select("professores.siape, professores.nome");
		$this->db->where("ativo", "t");
		$this->db->from("professores");
		return $this->db->get()->result();
	}
}