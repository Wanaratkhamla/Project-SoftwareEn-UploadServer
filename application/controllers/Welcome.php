<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		// $sql = 'SELECT * FROM member WHERE name = ?';
		//
		// $rs = $this->db->query($sql , array('nos'));
		// foreach ($rs->result() as $r) {
		// 	# code...
		// 	echo $r->name . ' ' . $r->username;
		// }
		// echo $rs->num_rows();
		// $name['fname'] = "wanarat";
		// $name['lname'] = "khamla";
		 $this->load->view('test2');
	}
	public function returnvalue()

	{
		echo "nosss";
		# code...
	}
}
