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
	public function push_to_db($data){
		// Get device details
		// $device = $this->db->get_where('mytable', array('token' => $date['token']))->row_array();

		$A='2.814548818659460E-34';
		$B='-1.851678472320860E-27';
		$C='5.027868344966990E-21';
		$D='-7.257539018246840E-15';
		$E='5.955612722787440E-09';
		$F='-2.729885634795430E-03';
		$K='5.882622362232610E+02';

		// Calculate actual value from raw data
		$A=bcmul($A,bcpow($X, 6));
		$B=bcmul($B,bcpow($X, 5));
		$C=bcmul($C,bcpow($X, 4));
		$D=bcmul($D,bcpow($X, 3));
		$E=bcmul($E,bcpow($X, 2));
		$F=bcmul($F,bcpow($X, 1));
		return $volume = bcadd($A,bcadd($B,bcadd($C,bcadd($D,bcadd($E,bcadd($F,$K))))));



		/*volume = Ax^6 + Bx^5 + Cx^4 + Dx^3 + Ex^2 + Fx^1 + k

		where A = 2.814548818659460E-34
		B  = -1.851678472320860E-27
		..>
		k = 5.882622362232610E+02*/

		// $this->
		// cleanup all other data
		
		// insert into db
		// return $this->hash_password($password, FALSE, TRUE);
	}	
}
