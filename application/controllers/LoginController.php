<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
	}

	public function index()
	{
		$this->load->view('login');
	}
 
	public function process()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->auth->login_user($username,$password))
		{
			redirect('homecontroller');
		}
		else
		{
			$this->session->set_flashdata('error','Wrong Username & Password');
			redirect('logincontroller');
		}
	}
 
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('is_login');
		redirect('logincontroller');
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */