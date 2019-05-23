<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secure extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// check for login
		if ($this->ion_auth->logged_in()){
			redirect('', 'refresh');
		}else{
			$this->login();
		}
		$this->load->helper('form');
	}
	public function login(){
		if ($this->ion_auth->logged_in()){
			redirect('', 'refresh');
		}
		$page_data = array();

        // form validation 
        $config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide a %s.',
				),
			),
			'error_prefix' => '<p class="text-danger">',
			'error_suffix' => '</p>'
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE){
        	$page_data['messages']= $this->session->userdata('message');
			// $page_data['content'] = $this->load->view('login_form', '', TRUE);
			$this->parser->parse('template/login', $page_data);
        }else{

			// echo "Success";
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
			{
				// echo 'Here!!';
				// exit();
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/', 'refresh');
			}
			else
			{
				// var_dump($this->ion_auth->errors());
				// exit();
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('secure/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
        }
	}
	public function logout(){
		$this->ion_auth->logout();
		$this->login();
	}
}
