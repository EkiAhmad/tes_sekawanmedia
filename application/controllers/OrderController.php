<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->auth->check_login();
	}

	public function index()
	{
		$this->load->view('theme/header');       
       	$this->load->view('order/list');
       	// $this->load->view('order/list',$data);
       	$this->load->view('theme/footer');
	}

}

/* End of file OrderController.php */
/* Location: ./application/controllers/OrderController.php */