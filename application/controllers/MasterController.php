<?php

class MasterController extends CI_Controller {

	function __construct(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->library('session');

		if(strtolower($this->uri->segment(1)) == 'admin'){
			if($_SESSION['logado'] !== 't'){
				$this->session->set_flashdata('erro', 'Você deve fazer o login');
				redirect('/admin/login');
			}
		}
	}
}

?>