<?php 
class My404 extends CI_Controller 
{
 public function __construct() 
 {
    parent::__construct(); 
 } 

 public function index() 
 { 
 	$currentURL = current_url(); 
	$params   = $_SERVER['QUERY_STRING']; 
	$fullURL = $currentURL . '?' . $params; 
    log_message('error', '404. - url attempted = '.$fullURL);
    $this->output->set_status_header('404'); 
    $this->load->view('err404');//loading in custom error view
 } 
} 