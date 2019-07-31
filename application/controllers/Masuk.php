<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	
	function __construct(){
		parent::__construct();		
		$this->load->model('m_dashboard');
		$this->load->library('bcrypt');
	}
	public function index()
	{
		$this->load->view('masuk');
	}
	function aksi_masuk()
	{
		$nama_pengguna = $this->input->post('nama_pengguna');
		$kata_sandi = $this->input->post('kata_sandi');

// var_dump();die();

		$where = array(
			'nama_pengguna' => $nama_pengguna,
			'kata_sandi' => md5($kata_sandi)
			);
		$cek = $this->m_dashboard->cek_user("pengguna",$where)->num_rows();
		$ambildata = $this->m_dashboard->cek_user("pengguna",$where)->result();
		$data_sekolah = $this->db->get('data_sekolah')->result();
		foreach ($data_sekolah as $data_sekolah) {
				$nama_sekolah = $data_sekolah->nama_sekolah;
		}

		foreach ($ambildata as $b) {
			
		if($cek > 0){
 
			$data_session = array(
				'nama_sekolah' => $nama_sekolah,
				'nama_lengkap' => $b->nama_lengkap,
				'email'			=> $b->email,
				'status' 		=> "masuk"
				);

			$this->session->set_userdata($data_session);
 
			redirect(base_url());
 
		}else{
			echo "Username dan password salah !";
		}
		}
	}
	function keluar()
	{
	$this->session->sess_destroy();
	redirect(base_url('masuk'));
	}
}

