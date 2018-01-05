<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursosController extends CI_Controller {


	public function __CONSTRUCT(){
 		parent::__CONSTRUCT();
		$this->load->helper('array');
        $this->load->model('Tccs');
	}

	public function index()
	{
		$curso = $this->uri->segment(2);

		$tccs = $this->Tccs->Listar($curso);

		$dados = array(
			'titulo' => 'Cursos',
			'view' => $curso,
			'controller' => 'Cursos',
			'tipo' => 'User',
			'dados' => $tccs
		);
		$this->load->view('carregarTelas', $dados);	
	}

	public function ListarTccsFiltro(){
		$curso = $this->uri->segment(2);
		$filtro = $this->uri->segment(3);
		echo json_encode($this->Tccs->Listar($curso, $filtro));
	}

}