<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'MasterController.php';

class TccsController extends MasterController {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('table');
        $this->load->model('Tccs');
        $this->load->model('Professores');
	}

	public function indexAdmin(){
		$dados = array(
			'titulo' => 'Index',
			'view' => 'index',
			'controller' => 'Tccs',
			'tipo' => 'Admin'
		);
		$this->load->view('carregarTelas', $dados);
	}

	public function Cadastrar(){
		
		$this->form_validation->set_rules('titulo', 'Titulo', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('autor', 'Autor', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('palavraschave', 'Palavras Chave', 'required|trim|max_length[30]');
		$this->form_validation->set_rules('ano', 'Ano', 'trim|required');
		$this->form_validation->set_rules('curso', 'Curso', 'trim|required');


		if($this->form_validation->run() == true){

			
			$id = $this->input->post('id');
			$info = elements(array('titulo', 'autor', 'palavraschave', 'ano', 'curso', 'professorid'), $this->input->post());

			$tccPrincipal = $this->input->post('tcc');
			$tccOld = $this->input->post('tccOld');

			if(isset($_FILES['tcc']) && $_FILES['tcc']['size'] > 0){
				$info['file'] = $this->realizaUpload();
			}
			if (!isset($info['file']) || $info['file'] == null) {
				$info['file'] = $this->input->post('tccOld');
			}elseif ($tccOld !== "") {
				$this->RemoveOldTcc($tccOld);
			}


			if ($id != '') {
				$this->Tccs->Atualizar($id, $info);
			}else{
				$id = $this->Tccs->Cadastrar($info);
			}

			redirect('/admin/Tccs');
		}

		$id = $this->uri->segment(4);
		$info = array();

		if ($id != '') {
			$tcc = $this->Tccs->carregarTcc($id);
			$info['id'] = $tcc->id;
			$info['titulo'] = $tcc->titulo;
			$info['autor'] = $tcc->autor;
			$info['palavrasChave'] = $tcc->palavraschave;
			$info['ano'] = $tcc->ano;
			$info['curso'] = $tcc->curso;
			$info['professorid'] = $tcc->professorid;
			$info['tccOld'] = $tcc->file;

		}else{
			$info['id'] = null;
			$info['titulo'] = null;
			$info['autor'] = null;
			$info['palavrasChave'] = null;
			$info['ano'] = null;
			$info['curso'] = null;
			$info['professorid'] = null;
			$info['tccOld'] = null;
		}

		$professoresObjs = $this->Professores->ListarAtivos();
		$professoresInfo = array();
		foreach ($professoresObjs as $professor) {
			$professoresInfo[$professor->siape] = $professor->nome;
		}

		$info['professores'] = $professoresInfo;

		$dados = array(
			'titulo' => 'Cadastrar',
			'view' => 'Cadastrar',
			'controller' => 'Tccs',
			'tipo' => 'Admin',
			'dados' => $info
		);
		$this->load->view('carregarTelas', $dados);

	}

	public function Excluir(){
		$id = $this->uri->segment(4);
		$file = $this->Tccs->carregarTcc($id)->file;
		$this->Tccs->Excluir($id);
		unlink('./tccs/'.$file);
		redirect('/admin/Tccs');
	}

	private function realizaUpload(){
		$config['upload_path'] = 'tccs';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);
        if($this->upload->do_upload('tcc')){

        	$data = $this->upload->data();
        	return $data['file_name'];
        }else{
        	echo $this->upload->display_errors();
        	return null;
        }
	}

	private function RemoveOldTcc($tcc){
		unlink("tccs/$tcc");
	}

	public function Listar(){
		echo json_encode($this->Tccs->Listar());
	}

}