<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * API for fuel monitoring system FMS
	 *
	 *
	 * @author Medford Kanyi kkanyi@gmail.com
	 * @package   Api for fuel monitoring system
	 **/
	public function __construct(){
		parent::__construct();
		$this->load->model('Api_model');
	}

	public function index(){
		// initial test
		$response = array('welcome');    
		$this->output($response);
	}

	public function push(){
		/*
		Data from devices
		- raw reading (float - 10,000,000.0)
		- calculated levels
		- temp (float - float - 100.0)
		- id 
		- delta T (int - 65535)
		Delta T
		- lat-long (upto 5 decimals)
		- datetime
		 */
		// https://fmsaddress/api/push/token/raw/temp/dt/lat/long
		// https://fmsaddress/api/push/1/808393/35.7/65534/5.23898/-0.78133
		// put together data
		$data = array();
		$data['token'] = $this->uri->segment(3);
		$data['raw'] = $this->uri->segment(4);
		$data['temp'] = $this->uri->segment(5);
		$data['dt'] = $this->uri->segment(6);
		$data['lat'] = $this->uri->segment(7);
		$data['long'] = $this->uri->segment(8);
		
		// load to db 
		$push = $this->api_model->push_to_db($data);
		// output response 
		// var_dump($push);
		// var_dump($data);
		$response = array(md5(uniqid(rand(), true)));    
		// $this->output($response);
	}

	private function output($response){
		//add the header here
		header('Content-Type: application/json');
		echo json_encode( $response );
	}
}