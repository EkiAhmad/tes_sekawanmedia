<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->auth->check_login();
	}
 
	public function index()
	{
		// $data['data'] = $this->home->get_home();
       		$this->load->view('theme/header');       
       		$this->load->view('home/home');
       		// $this->load->view('home/home',$data);
       		$this->load->view('theme/footer');
	}

}

/* End of file HomeController.php */
/* Location: ./application/controllers/HomeController.php */