<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('auth');
		$this->load->model('product');
		$this->auth->check_login();
	}

	public function index()
	{
		$this->db->select('*');
	    $this->db->from('master_produk');

	    $query = $this->db->get();
	    $data = $query->result_array();

		$this->load->view('theme/header');       
       	// $this->load->view('product/list');
       	$this->load->view('product/list',$query);
       	$this->load->view('theme/footer');
	}

	public function add()
	{
		$this->load->view('theme/header');       
       	$this->load->view('product/add');
       	// $this->load->view('product/add',$query);
       	$this->load->view('theme/footer');
	}

	public function edit($id)
	{
		$this->db->select('*');
	    $this->db->from('master_produk');
	    $this->db->where('id', $id );

	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	    	$data = $query->row_array();
			$this->load->view('theme/header');
	       	// $this->load->view('product/edit');
	       	$this->load->view('product/edit',$data);
	       	$this->load->view('theme/footer');
       	}
	}

	public function add_process()
	{
		// echo "<pre>";
		// print_r ($this->input->post());
		// echo "</pre>";die();
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$muatan = $this->input->post('muatan');
		$bbm = $this->input->post('bbm');
		$servis = $this->input->post('servis');
		$jumlah_muatan = $this->input->post('jumlah_muatan');
		$jumlah_produk = $this->input->post('jumlah_produk');
		$this->product->add($nama,$jenis,$muatan,$bbm,$servis,$jumlah_muatan,$jumlah_produk);
		$this->session->set_flashdata('success_add_data','Add Data Success');
		redirect('productcontroller');
	}

	public function edit_process($id)
	{
		// echo "<pre>";
		// print_r ($this->input->post());
		// echo "</pre>";die();
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$muatan = $this->input->post('muatan');
		$bbm = $this->input->post('bbm');
		$servis = $this->input->post('servis');
		$jumlah_muatan = $this->input->post('jumlah_muatan');
		$jumlah_produk = $this->input->post('jumlah_produk');
		$this->product->edit($id,$nama,$jenis,$muatan,$bbm,$servis,$jumlah_muatan,$jumlah_produk);
		$this->session->set_flashdata('success_edit_data','Edit Data Success');
		redirect('productcontroller');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('master_produk');
		redirect('productcontroller');
	}

}

/* End of file ProductController.php */
/* Location: ./application/controllers/ProductController.php */