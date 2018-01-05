<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __CONSTRUCT(){
 		parent::__CONSTRUCT();
		$this->load->helper('form');
		$this->load->helper('array');
        $this->load->model('Noticias');
	}

	public function index(){

		$dados = array(
			'titulo' => 'Home',
			'view' => 'index',
			'controller' => 'Home',
			'tipo' => 'User',
			'dados' => $this->Noticias->Listar(5)
		);
		$this->load->view('carregarTelas', $dados);	
	}

}