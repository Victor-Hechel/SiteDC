<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContaController extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
	}


	public function index(){

		$this->form_validation->set_rules('login', 'LOGIN', 'trim|required');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');

		if ($this->form_validation->run() == true) {
			$this->LogarPost();
		}

		$dados = array(
			'titulo' => 'Login',
			'view' => 'login',
			'controller' => 'Conta',
			'tipo' => 'Admin'
		);
		$this->load->view('carregarTelas', $dados);

	}

	private function LogarPost(){
		$login = $this->input->post('login');
		$senha = $this->input->post('senha');
		if ($this->TentarLogar($login, $senha)) {
			$this->session->set_userdata('logado', 't');
			redirect('/admin');
		}else{
			$this->session->set_flashdata('erro', 'Login ou senha incorretos');
		}
	}

	private function TentarLogar($login, $senha){
		if ($login == 'admin' && $senha == '123') {
			return true;
		}else{
			return false;
		}
	}

	function Logout(){
		$this->session->unset_userdata('variable');
		$this->session->sess_destroy();
		redirect('/admin/login');
	}


}
