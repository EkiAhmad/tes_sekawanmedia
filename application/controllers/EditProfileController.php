<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfileController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		$this->db->select('*');
	    $this->db->from('master_profile');
	    $this->db->where('id', $id );

	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $data = $query->row_array();
	        // return $row;
	        $this->load->view('theme/header');
			$this->load->view('profile/edit', $data);
			$this->load->view('theme/footer');
	    }
	}

	public function process()
	{
		// echo "<pre>";
		// print_r ($this->input->post());
		// echo "</pre>";die();
		$id = $this->session->userdata('id');
		// $username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$role = $this->input->post('role');
		$this->auth->edit($id,$password,$nama,$email,$role);
		$this->session->set_flashdata('success_change_data','Change Profile Success');
		redirect('homecontroller');
	}

}

/* End of file EditProfileController.php */
/* Location: ./application/controllers/EditProfileController.php */