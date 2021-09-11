<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->auth->check_login();
	}

	public function index()
	{
		$this->db->select('name,email,role');
	    $this->db->from('master_profile');

	    $query = $this->db->get();
	    $data = $query->result_array();
	    // echo "<pre>";
	    // print_r ($data);
	    // echo "</pre>";die();
		$this->load->view('theme/header');       
       	// $this->load->view('customer/list');
       	$this->load->view('customer/list',$query);
       	$this->load->view('theme/footer');
	}

}

/* End of file CustomerController.php */
/* Location: ./application/controllers/CustomerController.php */