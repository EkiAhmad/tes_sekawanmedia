<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
	}

	public function index()
	{
		$this->load->view('register');
	}

	public function process()
	{
		$this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[master_profile.username]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		// $this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$role = $this->input->post('role');
			$this->auth->register($username,$password,$nama,$email,$role);
			$this->session->set_flashdata('success_register','Register Success');
			redirect('logincontroller');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('registercontroller');
		}
	}

}

/* End of file RegisterController.php */
/* Location: ./application/controllers/RegisterController.php */