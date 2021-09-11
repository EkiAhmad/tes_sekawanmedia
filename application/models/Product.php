<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function __construct()
	{
        parent::__construct();
	}

	function add($nama,$jenis,$muatan,$bbm,$servis,$jumlah_muatan,$jumlah_produk)
	{
		$data = array(
			'nama'=>$nama,
			'jenis'=>$jenis,
			'muatan'=>$muatan,
			'bbm'=>$bbm,
			'servis'=>$servis,
			'jumlah_muatan'=>$jumlah_muatan,
			'jumlah_produk'=>$jumlah_produk
		);
		$this->db->insert('master_produk',$data);
	}

	function edit($id,$nama,$jenis,$muatan,$bbm,$servis,$jumlah_muatan,$jumlah_produk)
	{
		$this->db->set('nama', $nama);
		$this->db->set('jenis', $jenis);
		$this->db->set('muatan', $muatan);
		$this->db->set('bbm', $bbm);
		$this->db->set('servis', $servis);
		$this->db->set('jumlah_muatan', $jumlah_muatan);
		$this->db->set('jumlah_produk', $jumlah_produk);
		$this->db->where('id', $id);
		$result = $this->db->update('master_produk');
		redirect('productcontroller');
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */