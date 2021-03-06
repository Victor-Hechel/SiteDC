<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'MasterController.php';

class ProfessoresController extends MasterController {

	public function __CONSTRUCT(){
 		parent::__CONSTRUCT();
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('table');
        $this->load->model('Professores');
	}


	public function indexAdmin(){

		$dados = array(
			'titulo' => 'Index',
			'view' => 'index',
			'controller' => 'Professores',
			'tipo' => 'Admin'
		);
		$this->load->view('carregarTelas', $dados);

	}

	public function indexUser(){
		$dados = array(
			'titulo' => 'Professores',
			'view' => 'index',
			'controller' => 'Professores',
			'tipo' => 'User',
			'dados' => $this->Professores->ListarAtivos()
		);

		$this->load->view('carregarTelas', $dados);
	}

	public function AtualizarInfo(){
		$siapeOld = $this->input->post('siapeOld');
		if ($siapeOld !== '') 
			$this->form_validation->set_rules('siape', 'Siape', "trim|required");
		else
			$this->form_validation->set_rules('siape', 'Siape', "trim|required|is_unique[professores.siape]");

		$this->form_validation->set_rules('nome', 'Nome', "trim|required|max_length[50]");

		if($this->form_validation->run() == true){
			$fotoOld = $this->input->post('fotoOld');
			$fotoPrincipal = $this->input->post('foto');

			
			$dados = elements(array("siape", 
									"nome", 
									"titulacao", 
									"lattes",
									"email",
									"foto"
									), $this->input->post());

			if($this->input->post("trocarFoto") == "t"){
				$this->RemoveOldImage($fotoOld);
				$fotoOld = "";
			}


			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0){
				$dados['foto'] = $this->AddImagem();
			}
			if (!isset($dados['foto']) || $dados['foto'] == null) {
				$dados['foto'] = $fotoOld;
			}elseif ($fotoOld !== "") {
				$this->RemoveOldImage($fotoOld);
			}



			if ($siapeOld !== '') {
				$this->Professores->Editar($dados, $siapeOld);
			}else{
				$this->Professores->Cadastrar($dados);
			}

			$this->session->set_flashdata('sucesso', 'Notícias atualizadas com sucesso');
			redirect('/admin/professores');
		}
		if($this->input->post('siapeOld') != null)
			$id = $this->input->post('siapeOld');
		else
			$id = $this->uri->segment(4);

		if($id !== null){
			$professor = $this->Professores->getProfessor($id);
			$info = array('siape' => $professor->siape,
				 		  'nome' => $professor->nome,
				  		  'titulacao' => $professor->titulacao,
				  		  'lattes' => $professor->lattes,
				  		  'email' => $professor->email,
				  		  'foto' => $professor->foto,
				  		  'siapeOld' => $id);
			
		}else{
			$info = array('siape' => null,
				 		  'nome' => null,
				  		  'titulacao' => null,
				  		  'lattes' => null,
				  		  'email' => null,
				  		  'foto' => null,
				  		  'siapeOld' => null);
		}

		$dados = array(
			'titulo' => 'Cadastrar Professor',
			'view' => 'Editar',
			'controller' => 'Professores',
			'tipo' => 'Admin',
			'dados' => $info
		);

		$this->load->view('carregarTelas', $dados);

	}

	private function AddImagem(){
		$config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){

        	$data = $this->upload->data();
        	return $data['file_name'];
        }else{
        	echo $this->upload->display_errors();
        	return null;
        }
	}

	private function RemoveOldImage($foto){
		unlink("uploads/$foto");
	}

	public function Excluir(){

		$id = $this->uri->segment(4);

		if ($id !== NULL) {
			$this->Professores->Excluir($id);
		}

		$this->session->set_flashdata('sucesso', 'Professor excluído com sucesso');
		redirect("/admin/professores");
	}

	public function Detalhes(){
		$id = $this->uri->segment(4);

		if ($id !== NULL) {
			$professor = $this->Professores->getProfessor($id);

			$dados = array(
				'titulo' => 'Professor',
				'view' => 'Detalhes',
				'controller' => 'Professores',
				'tipo' => 'Admin',
				'dados' => $professor
			);

			$this->load->view('carregarTelas', $dados);
		}
	}

	public function Listar(){
		echo json_encode($this->Professores->Listar());
	}

	public function AlterarAtivo(){
		$id = $this->uri->segment(4);
		$value = $this->uri->segment(5);
		$this->Professores->AlterarAtivo($id, $value);
	}
}
