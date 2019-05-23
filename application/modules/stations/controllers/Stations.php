<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stations extends MX_Controller {

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
        $this->load->model('Stations_model');
        // $this->page_data=array();
    }

	public function index()
	{
		// echo 'Here!!';
		// $this->page_data['content'] = 'Users';
		$this->page_data['page_title'] = 'FMS';
		$ajax_url=base_url("Stations/get_stations_json");
		$this->page_data['scripts'] = '
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
		
		<script type="text/javascript">
		$( document ).ready(function() {
			// Setup - add a text input to each footer cell
		    $(\'#example thead tr\').clone(true).appendTo( \'#example thead\' );
		    $(\'#example thead tr:eq(1) th\').each( function (i) {
		        var title = $(this).text();
		        $(this).html( \'<input type="text" placeholder="Search \'+title+\'" id="search_\'+title+\'" name="search_\'+title+\'"/>\' );
		 
		        $( \'input\', this ).on( \'keyup change\', function () {
		            if ( table.column(i).search() !== this.value ) {
		                table
		                    .column(i)
		                    .search( this.value )
		                    .draw();
		            }
		        } );
		    } );
		 
		    var table = $(\'#example\').DataTable({
		        "processing": true,
        		"serverSide": true,
		        "ajax": {
		            "url": "http://localhost/fuel/stations/get_stations_json",
		            "type": "POST"
		        },
		        "orderCellsTop": true,
		        "fixedHeader": true,
		        "columnDefs": [
					{ "searchable": false, "targets": 0 },
					{ "searchable": false, "targets": 4 }
				],
		        "columns": [
		            { "data": "id", "searchable": false },
		            { "data": "station_name" },
		            { "data": "company" },
		            { "data": "notes" },
		            { "data": "view", "searchable": false }
		        ]
		    });
		   });
		</script> ';
		$this->page_data['css'] = '
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
		<style>
			#search_#, #search_View {
			float: right;
			text-align: right;
			visibility: hidden;
			}
		</style>
		';
		// $page_data['content'] .= $this->load->view('duty_table','',true);

		$this->view_data= array('users' => $this->ion_auth->users()->result()); // get all users
		$this->page_data['content']=$this->load->view('stations_table',$this->view_data,true);
		$this->parser->parse('template/main', $this->page_data);
	}
	public function get_stations_json() { //get product data and encode to be JSON object
      // header('Content-Type: application/json');
      echo $this->Stations_model->ajax_stations();
  	}
	public function edit(){
		$this->page_data['page_title'] = 'FMS';	
		// $this->view_data= array('users' => $this->ion_auth->users()->result()); // get all users
		$this->page_data['content']= 'edit user';//$this->load->view('users_table',$this->view_data,true);
		$this->parser->parse('template/main', $this->page_data);
	}

	public function new_station(){
		$this->page_data['page_title'] = 'FMS';		
		// $this->view_data= array('users' => $this->ion_auth->users()->result()); // get all users
		$this->page_data['content']= 'New user';//$this->load->view('users_table',$this->view_data,true);
		$this->view_data = array('card_title' => 'New User' );

		// form validation 
        $config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|email'
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
			$this->page_data['content'] = $this->load->view('station_form', $this->view_data, true);
        }else{
			// check to see if the user is logging in
			// check for "remember me"
			// $remember = (bool)$this->input->post('remember');
        }
		$this->parser->parse('template/main', $this->page_data);
	}
}
