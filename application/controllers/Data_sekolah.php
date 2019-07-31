<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sekolah extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->model('m_data_sekolah');		

			if($this->session->userdata('status') != "masuk"){
			redirect(base_url("masuk"));
		}
	}

	public function index()
	{
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['email'] = $this->session->userdata('email');
		$data['nama_sekolah'] = $this->session->userdata('nama_sekolah');

		$data['ambildata'] = $this->m_data_sekolah->tampil_data()->result();
		$this->load->view('Data_sekolah/index',$data);
	}
	public function aksi_data_sekolah()
	{
	$id 				= $this->input->post('id');
	$nama_sekolah		= $this->input->post('nama_sekolah');
	$alamat_lengkap		= $this->input->post('alamat_lengkap');
	$kel_des			= $this->input->post('kel_des');
	$kecamatan			= $this->input->post('kecamatan');
	$kota				= $this->input->post('kota');
	$provinsi			= $this->input->post('provinsi');
	$nama_ketua_yayasan	= $this->input->post('nama_ketua_yayasan');
	$nama_komite_sekolah= $this->input->post('nama_komite_sekolah');
	$nama_kepala_sekolah= $this->input->post('nama_kepala_sekolah');
	$nama_kepala_tu		= $this->input->post('nama_kepala_tu');
 
	$data = array(
		'nama_sekolah'			=> $nama_sekolah,
		'alamat_lengkap'		=> $alamat_lengkap,
		'kel_des'				=> $kel_des,
		'kecamatan'				=> $kecamatan,
		'kota'					=> $kota,
		'provinsi'				=> $provinsi,
		'nama_ketua_yayasan'	=> $nama_ketua_yayasan,
		'nama_komite_sekolah'	=> $nama_komite_sekolah,
		'nama_kepala_sekolah'	=> $nama_kepala_sekolah,
		'nama_kepala_tu'		=> $nama_kepala_tu
		 );
	$where = array(
		'id' => $id 
	);
 
	$this->m_data_sekolah->aksi_perbaharui($where,$data,'data_sekolah');
	redirect('Data_sekolah');
	}
	
}

