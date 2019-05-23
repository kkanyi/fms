<?php
/**
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Ion Auth Model
 * @property Bcrypt $bcrypt The Bcrypt library
 * @property Ion_auth $ion_auth The Ion_auth library
 */

	/*
	$response = array('status' => 'OK');

	$this->output
	->set_status_header(200)
	->set_content_type('application/json', 'utf-8')
	->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
	->_display();
	exit;
	*/

class Stations_model extends CI_Model{

	public function __construct(){
			// $this->load->model('model_name');
	}
	
	/**
	 * Generates a random salt value for forgotten passwords or any other keys. Uses SHA1.
	 *
	 * @param string $password
	 *
	 * @return false|string
	 * @author Mathew
	 */
	public function ajax_stations(){
		// var_dump($this->input->post('columns'));
		// exit();
	$this->datatables->select('id,station_name,notes,company');
	$this->datatables->from('stations');
	foreach ($this->input->post('columns') as $column) {
		if ($column['searchable']==true AND $column['search']['value']!=null) {
			// json_encode($column);
			$this->datatables->like($column['data'],$column['search']['value']);
		}
		// var_dump($column['search']['value']);
		// exit();
	}
	// $this->datatables->like('company', $this->input->post('company'));
	// $this->datatables->join('categories', 'product_category_id=category_id');
	$this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info" data-code="$1" data-name="$2" data-price="$3" data-category="$4">Edit</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-code="$1">Delete</a>','product_code,product_name,product_price,category_id,category_name');
	return $this->datatables->generate();
	}	
}
