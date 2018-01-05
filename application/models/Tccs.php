<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tccs extends CI_Model{

	public function Listar($curso = null, $filtro = null){
		$this->db->select("tccs.*, professores.nome AS orientador");
		$this->db->join("professores", "professores.siape = tccs.professorid");
		if ($curso != null) {
			$this->db->where("tccs.curso", $curso);
		}

		if($filtro != null){
			$this->db->like("LOWER(tccs.titulo)", strtolower($filtro));
			$this->db->or_like("LOWER(professores.nome)", strtolower($filtro));
			$this->db->or_like("LOWER(tccs.palavraschave)", strtolower($filtro));
			$this->db->or_like("LOWER(tccs.autor)", strtolower($filtro));
		}

		$this->db->order_by('tccs.ano', 'DESC');
		$this->db->from('tccs');
		return $this->db->get()->result();
	}

	public function Cadastrar($dados){
		$this->db->insert('tccs', $dados);
		return $this->db->insert_id();
	}

	public function Atualizar($id, $dados){
		$this->db->where('id', $id);
		$this->db->update('tccs', $dados);
	}

	public function carregarTcc($id){
		$this->db->where('id', $id);
		return $this->db->get('tccs')->row();
	}

	public function Excluir($id){
		$this->db->where('id', $id);
		$this->db->delete('tccs');
	}
}