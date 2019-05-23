<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

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
	function __construct(){
        parent::__construct();
        $this->load->model('ion_auth_model');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        // $this->page_data=array();
    }

	public function index()
	{
		// echo 'Here!!';
		// $this->page_data['content'] = 'Users';
		$this->page_data['page_title'] = 'FMS';
		
		$this->view_data= array('users' => $this->ion_auth->users()->result()); // get all users
		$this->page_data['content']=$this->load->view('users_table',$this->view_data,true);
		$this->parser->parse('template/main', $this->page_data);
	}
	public function edit(){
		$this->page_data['page_title'] = 'FMS';
		
		// $this->view_data= array('users' => $this->ion_auth->users()->result()); // get all users
		$this->page_data['content']= 'edit user';//$this->load->view('users_table',$this->view_data,true);
		$this->parser->parse('template/main', $this->page_data);
	}

	public function new_user(){
		$this->page_data['page_title'] = 'FMS';		
		// $this->view_data= array('users' => $this->ion_auth->users()->result()); // get all users
		$this->page_data['content']= 'New user';//$this->load->view('users_table',$this->view_data,true);
		$this->view_data = array('card_title' => 'New User' );

		// form validation 
        $config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|email|is_unique[users.email]'
			),
			array(
				'field' => 'first_name',
				'label' => 'First name',
				'rules' => 'required'
			),
			array(
				'field' => 'last_name',
				'label' => 'Last name',
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
			array(
				'field' => 'passwordc',
				'label' => 'Confirm password',
				'rules' => 'required|matches[password]',
			),
			'error_prefix' => '<p class="text-danger">',
			'error_suffix' => '</p>'
		);
		$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE){
        	// $page_data['messages']= $this->session->userdata('message');
			$this->page_data['content'] = $this->load->view('user_form', $this->view_data, true);
        }else{
			// check to see if the user is logging in
			// check for "remember me"
			// $remember = (bool)$this->input->post('remember');
        }
		$this->parser->parse('template/main', $this->page_data);
	}
}
