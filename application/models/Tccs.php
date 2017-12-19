<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tccs extends CI_Model{

	public function Listar(){
		$this->db->order_by('ano', 'DESC');
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