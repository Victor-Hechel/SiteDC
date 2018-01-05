<?php
$this->load->view("layout_components/header");
$this->load->view("layout_components/body$tipo");
if($view != null){
	$this->load->view("$tipo/$controller/$view");
}
$this->load->view("layout_components/footer$tipo");