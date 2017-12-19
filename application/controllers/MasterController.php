<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


class MasterController extends CI_Controller {

	function __construct(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->library('session');

		#$logado = "Usuario";
		if(strtolower($this->uri->segment(1)) == 'admin'){
			if($_SESSION['logado'] !== 't'){
				$this->session->set_flashdata('erro', 'Você não tem acesso a essa área');
				redirect('/admin/login');
			}
		}
	}
}

?>