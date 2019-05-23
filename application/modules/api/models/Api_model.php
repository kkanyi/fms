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

class Api_model extends CI_Model{

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

		$device['A']='2.814548818659460E-34';
		$device['B']='-1.851678472320860E-27';
		$device['C']='5.027868344966990E-21';
		$device['D']='-7.257539018246840E-15';
		$device['E']='5.955612722787440E-09';
		$device['F']='-2.729885634795430E-03';
		$device['K']='5.882622362232610E+02';
		$X = $data['raw'];

		// Calculate actual value from raw data
		$volume = array();
		// $volume['A']=bcmul('2.814548818659460e-34',bcpow($X, 6));
		// $volume['B']=bcmul('-1.851678472320860E-27',bcpow($X, 5));
		// $volume['C']=bcmul('5.027868344966990E-21',bcpow($X, 4));
		// $volume['D']=bcmul('-7.257539018246840E-15',bcpow($X, 3));
		// $volume['E']=bcmul('5.955612722787440E-09',bcpow($X, 2));
		// $volume['F']=bcmul('-2.729885634795430E-03',$X);
		// var_dump($volume);
		/*$volume['volume'] = 
		bcadd(
			bcmul($A,bcpow($X, 6)),
			bcadd(bcmul('-1.851678472320860E-27',bcpow($X, 5)),
			bcadd(bcmul('5.027868344966990E-21',bcpow($X, 4)),
			bcadd(bcmul('-7.257539018246840E-15',bcpow($X, 3)),
			bcadd(bcmul('5.955612722787440E-09',bcpow($X, 2)),
			bcadd(bcmul('-2.729885634795430E-03',$X),$K))))));*/
			// bcadd(
				// bcmul($device['A'],bcpow($X, 6)),
				// bcadd(bcmul($device['B'],bcpow($X, 5)), 
					// bcadd(left_operand, right_operand))
			// );
			// bcadd(A, bcadd(B, bcadd(C, bcadd(D, bcadd(E, bcadd(F, right_operand))))))

			// bcmul('-7.257539018246840E-15',bcpow($X, 3))
		$volume['volume'] =($device['A']*pow($X,6)+$device['B']*pow($X,5)+$device['C']*pow($X,4)+$device['D']*pow($X,3)+$device['E']*pow($X,2)+($device['F']*$X)+$device['K']); 
		
		$volume['volume2'] =
		bcadd(bcmul($device['A'],bcpow($X,6)),
		bcadd(bcmul($device['B'],bcpow($X,5)),
		bcadd(bcmul($device['C'],bcpow($X,4)),
		bcadd(bcmul($device['D'],bcpow($X,3)),
		bcadd(bcmul($device['E'],bcpow($X,2)),
		bcadd(bcmul($device['F'],$X),$device['K'])))))); 
		return $volume;

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
