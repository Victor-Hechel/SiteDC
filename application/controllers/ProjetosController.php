<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'MasterController.php';

class ProjetosController extends MasterController {

	public function __CONSTRUCT(){
 		parent::__CONSTRUCT();
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('table');
        $this->load->model('Projetos');
        $this->load->model('Professores');        
	}

	public function indexAdmin(){
		
		$dados = array(
			'titulo' => 'Index',
			'view' => 'index',
			'controller' => 'Projetos',
			'tipo' => 'Admin'
		);
		$this->load->view('carregarTelas', $dados);
	}

	public function Cadastrar(){
		$this->form_validation->set_rules("titulo", "Título", "trim|required");
		$this->form_validation->set_rules('coordenador', 'Coordenador', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('descricao', 'Descricao', 'trim|max_length[500]');

		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$dados = elements(array("titulo", "coordenador", "tipo", "descricao", "bolsista", "equipe"), $this->input->post());
			if($id != ''){
				$this->Projetos->Update($dados, $id);
			}else{
				$this->Projetos->Cadastrar($dados);
			}
			$this->session->set_flashdata('sucesso', 'Projetos atualizados com sucesso');
			redirect('/admin/projetos');
		}

		$id = $this->uri->segment(4);

		if($id !== null){
			$projeto = $this->Projetos->getProjeto($id);
			$info = array('id' => $projeto->id,
				 		  'titulo' => $projeto->titulo,
				  		  'descricao' => $projeto->descricao,
				  		  'coordenador' => $projeto->coordenador,
				  		  'tipo' => $projeto->tipo,
				  		  'bolsistas' => $projeto->aluno,
				  		  'equipe' => $projeto->idprofessor);
			
		}else{
			$info = array('id' => null,
				 		  'titulo' => null,
				  		  'descricao' => null,
				  		  'coordenador' => null,
				  		  'tipo' => null,
				  		  'bolsistas' => array(),
				  		  'equipe' => array());
		}

		$professores = $this->Professores->Listar();
		$professoresArray = array();
		foreach ($professores as $key => $value) {
			$professoresArray[$value->siape] = $value->nome;
		}

		$info['professores'] = $professoresArray;

		$dados = array(
			'titulo' => 'Projetos',
			'view' => 'Editar',
			'controller' => 'Projetos',
			'tipo' => 'Admin',
			'dados' => $info
		);

		$this->load->view('carregarTelas', $dados);
 
	}

	public function Listar(){
		$projetos = $this->Projetos->Listar();

		foreach ($projetos as $value) {
			switch ($value->tipo) {
				case 'pesquisa':
					$value->tipo = "Pesquisa";
					break;
				case 'extensao':
					$value->tipo = "Extensão";
					break;
				case 'ensino':
					$value->tipo = "Ensino";
					break;
			}
		}

		echo json_encode($projetos);
	}

	public function Excluir(){
		$id = $this->uri->segment(4);
		$this->Projetos->Excluir($id);
	}

}
