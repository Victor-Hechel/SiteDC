<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'MasterController.php';

class NoticiasController extends MasterController {

	public function __CONSTRUCT(){
 		parent::__CONSTRUCT();
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
        $this->load->model('Noticias');
	}

	public function ListarNoticias(){
		echo json_encode($this->Noticias->Listar());
	}


	public function indexAdmin(){

		$dados = array(
			'titulo' => 'Notícias - Admin',
			'view' => 'index',
			'controller' => 'Noticias',
			'tipo' => 'Admin'
		);
		$this->load->view('carregarTelas', $dados);

	}

	public function AtualizarInfo(){

		$this->form_validation->set_rules('titulo', 'Título', "trim|required|max_length[60]");
		$this->form_validation->set_rules('descricao', 'Descrição', "trim|required|max_length[500]");

		if($this->form_validation->run() == true){
			$id = $this->input->post('id');
			$dados = elements(array("titulo", "descricao"), $this->input->post());

			$fotoPrincipal = $this->input->post('fotoPrincipal');
			$fotoOld = $this->input->post('fotoOld');

			if(isset($_FILES['fotoPrincipal']) && $_FILES['fotoPrincipal']['size'] > 0){
				$dados['foto'] = $this->AddImagem();
			}
			if (!isset($dados['foto']) || $dados['foto'] == null) {
				$dados['foto'] = $this->input->post('fotoOld');
			}elseif ($fotoOld !== "") {
				$this->RemoveOldImage($fotoOld);
			}

			if ($id !== '') {
				$dados['datahoraatualizacao'] = date('Y-m-d H:i:s');
				$this->Noticias->Editar($dados, $id);
			}else{
				$this->Noticias->Cadastrar($dados);
			}

			$this->session->set_flashdata('sucesso', 'Notícias atualizadas com sucesso');
			redirect('/admin/noticias');
		}

		$id = $this->uri->segment(4);

		if($id !== null){
			$noticia = $this->Noticias->getNoticia($id);
			$info = array('id' => $noticia->id,
				 		  'titulo' => $noticia->titulo,
				  		  'descricao' => $noticia->descricao,
				  		  'foto' => $noticia->foto);
			
		}else{
			$info = array('id' => null,
				 		  'titulo' => null,
				  		  'descricao' => null,
				  		  'foto' => null);
		}

		$dados = array(
			'titulo' => 'Cadastrar Notícia',
			'view' => 'Editar',
			'controller' => 'Noticias',
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
        if($this->upload->do_upload('fotoPrincipal')){

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
			$this->Noticias->Excluir($id);
		}
	}

	public function Detalhes(){
		$id = $this->uri->segment(4);

		if ($id !== NULL) {
			$noticia = $this->Noticias->getNoticia($id);

			$dados = array(
				'titulo' => 'Cadastrar Notícia',
				'view' => 'Detalhes',
				'controller' => 'Noticias',
				'tipo' => 'Admin',
				'dados' => $noticia
			);

			$this->load->view('carregarTelas', $dados);
		}
	}
}
