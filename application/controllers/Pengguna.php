<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	
	function __construct(){
		parent::__construct();		
		$this->load->model('m_pengguna');

		if($this->session->userdata('status') != "masuk"){
			redirect(base_url("masuk"));
		}
	}

	public function index()
	{	
		$data['nama_lengkap'] 	= $this->session->userdata('nama_lengkap');
		$data['email'] 			= $this->session->userdata('email');
		$data['nama_sekolah'] 	= $this->session->userdata('nama_sekolah');

		$data['baca_db']		= $this->m_pengguna->tampil_data()->result();
		$this->load->view('pengguna/index.php', $data);
	}
	public function tambah_pengguna()
	{
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['email'] 		  = $this->session->userdata('email');
		$data['nama_sekolah'] = $this->session->userdata('nama_sekolah');

		$this->load->view('pengguna/tambah_pengguna.php',$data);
	}
	public function aksi_tambah_pengguna()
	{
		$nama_lengkap	 = $this->input->post('nama_lengkap');
		$nama_pengguna	 = $this->input->post('nama_pengguna');
		$kata_sandi		 = $this->input->post('kata_sandi');
		$email 			 = $this->input->post('email');
		$alamat			 = $this->input->post('alamat');
		$keterangan		 = $this->input->post('keterangan');

		$data = array(
			'nama_lengkap'	=> $nama_lengkap,
			'nama_pengguna' => $nama_pengguna,
			'kata_sandi' 	=> md5($kata_sandi),
			'email'			=> $email,
			'alamat'		=> $alamat,
			'keterangan'	=> $keterangan
			);
		$this->m_pengguna->masukan_data($data,'pengguna');
		redirect('pengguna');
	}
	public function hapus_pengguna($id){
		$where = array('id' => $id);
		$this->m_pengguna->hapus_data($where,'pengguna');
		redirect('pengguna');
	}
	public function perbaharui_pengguna($id)
	{
		$data['nama_lengkap']	= $this->session->userdata('nama_lengkap');
		$data['email'] 			= $this->session->userdata('email');
		$data['nama_sekolah']   = $this->session->userdata('nama_sekolah');

		$where = array(
			'id' => $id
		);
		$data['ambildata']		= $this->m_pengguna->perbaharui_data($where,'pengguna')->result();
		$this->load->view('pengguna/perbaharui_pengguna',$data);
	}
	public function aksi_perbaharui()
	{
	$id 				= $this->input->post('id');
	$nama_lengkap		= $this->input->post('nama_lengkap');
	$nama_pengguna		= $this->input->post('nama_pengguna');
	$email				= $this->input->post('email');
	$alamat				= $this->input->post('alamat');
	$keterangan			= $this->input->post('keterangan');
 
	$data = array(
		'nama_lengkap'		=> $nama_lengkap,
		'nama_pengguna'		=> $nama_pengguna,
		'email'				=> $email,
		'alamat'			=> $alamat,
		'keterangan'		=> $keterangan
		 );
	$where = array(
		'id' => $id 
	);
 
	$this->m_pengguna->aksi_perbaharui($where,$data,'pengguna');
	redirect('pengguna');
	}
	public function perbaharui_kata_sandi($id)
	{
		$data['nama_lengkap']	= $this->session->userdata('nama_lengkap');
		$data['email'] 			= $this->session->userdata('email');
		$data['nama_sekolah']   = $this->session->userdata('nama_sekolah');

		
		$where = array(
			'id' => $id
		);
		$data['ambildata']		= $this->m_pengguna->perbaharui_data($where,'pengguna')->result();
		$this->load->view('pengguna/perbaharui_kata_sandi',$data);
	}
	public function aksi_perbaharui_kata_sandi()
	{
		$id 		= $this->input->post('id');
		$kata_sandi = $this->input->post('kata_sandi');

		$data = array(
			'kata_sandi' => md5($kata_sandi) 
		);

		$where = array(
			'id' => $id
		);

		$this->m_pengguna->aksi_perbaharui($where,$data,'pengguna');
		redirect('pengguna');
	}
}

