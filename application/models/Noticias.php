<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Model{


	public function Cadastrar($dados){
		if ($dados != null) {
			$this->db->insert('noticias', $dados);
		}
	}

	public function Listar($take = 0){
		$this->db->select("id, titulo, TO_CHAR(datahorapublicacao, 'DD/MM/YYYY HH24:MI') AS 
						   datahorapublicacao, TO_CHAR(datahoraatualizacao, 'DD/MM/YYYY HH24:MI') AS 
						   datahoraatualizacao, descricao, foto");
		$this->db->order_by("datahorapublicacao", "DESC");
		if($take != 0){
			$this->db->limit(3);
		}
		$this->db->from("noticias");
		$query = $this->db->get(); 
		return $query->result();
	}

	public function ListarFiltro($filtro){
		$this->db->select("id, titulo, descricao, TO_CHAR(datahorapublicacao, 'DD/MM/YYYY HH24:MI') AS 
						   datahorapublicacao");
		$this->db->order_by("datahorapublicacao", "DESC");
		$this->db->like("LOWER(titulo)", strtolower($filtro));
		$this->db->or_like("descricao", $filtro);
		$this->db->from("noticias");
		return $this->db->get()->result();
	}

	public function Excluir($id){
		$this->db->where("id", $id);
		$this->db->delete('noticias');
	}

	public function Editar($dados, $id){
		$this->db->where('id', $id);
		$this->db->update('noticias', $dados);
	}

	public function getNoticia($id){
		$this->db->select("id, titulo, TO_CHAR(datahorapublicacao, 'DD/MM/YYYY HH24:MI') AS 
						   datahorapublicacao, TO_CHAR(datahoraatualizacao, 'DD/MM/YYYY HH24:MI') AS 
						   datahoraatualizacao, descricao, foto");
		$this->db->where('id', $id);
		return $this->db->get('noticias')->row();
	}
}