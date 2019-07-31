<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rkas_new extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('m_rkas_new');
		$this->load->model('m_data_sekolah');

		if($this->session->userdata('status') != "masuk"){
			redirect(base_url("masuk"));
		}
	}

	public function tahun_anggaran()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['tahun_anggaran']		= $this->m_rkas_new->tampil_data_1_tahun_anggaran()->result();
		$this->load->view('rkas_new/tahun_anggaran', $data);
	}
	public function tambah_tahun()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$this->load->view('rkas_new/tambah_tahun',$data);
	}
	public function aksi_tambah_tahun()
	{
		$tahun			= $this->input->post('tahun');

		$data = array(
			'tahun' => $tahun 
		);

		$this->m_rkas_new->masukan_data($data,'1_tahun_anggaran');
		redirect(base_url('rkas_new/tahun_anggaran'));
	}

	public function uraian()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['data_sekolah']							= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_1_tahun_anggaran_judul']	= $this->m_rkas_new->tampil_data_1_tahun_anggaran_uraian()->result();
		$data['tampil_data_1_tahun_anggaran_uraian']	= $this->m_rkas_new->tampil_data_1_tahun_anggaran_uraian()->result();

		$data['uraian']			= $this->m_rkas_new->tampil_data_2_uraian()->result();
		$data['penerimaan']		= $this->m_rkas_new->tampil_data_penerimaan()->result();
		$data['tampil_data_penerimaan_jumlah']		= $this->m_rkas_new->tampil_data_penerimaan_jumlah()->result();

		$data['sisa_dana']		= $this->m_rkas_new->sisa_dana()->result();
		$data['pendapatan_rutin']		= $this->m_rkas_new->pendapatan_rutin()->result();
		$data['bos_pusat']		= $this->m_rkas_new->bos_pusat()->result();
		$data['bos_provinsi']		= $this->m_rkas_new->bos_provinsi()->result();
		$data['bos_kota']		= $this->m_rkas_new->bos_kota()->result();
		$data['bl']		= $this->m_rkas_new->bl()->result();
		$data['pl']		= $this->m_rkas_new->pl()->result();

		$data['b1']				= $this->m_rkas_new->b1()->result();
		$data['c1']				= $this->m_rkas_new->c1()->result();
		$data['d1']				= $this->m_rkas_new->d1()->result();
		$data['e1']				= $this->m_rkas_new->e1()->result();
		$data['f1']				= $this->m_rkas_new->f1()->result();
		$data['g1']				= $this->m_rkas_new->g1()->result();
		$data['h1']				= $this->m_rkas_new->h1()->result();
		$data['i1']				= $this->m_rkas_new->i1()->result();


		$data['b1_jumlah']				= $this->m_rkas_new->b1_jumlah()->result();
		$data['b1_jumlah_1']				= $this->m_rkas_new->b1_jumlah()->result();
		$data['c1_jumlah']				= $this->m_rkas_new->c1_jumlah()->result();
		$data['c1_jumlah_1']				= $this->m_rkas_new->c1_jumlah()->result();
		$data['d1_jumlah']				= $this->m_rkas_new->d1_jumlah()->result();
		$data['d1_jumlah_1']				= $this->m_rkas_new->d1_jumlah()->result();
		$data['e1_jumlah']				= $this->m_rkas_new->e1_jumlah()->result();
		$data['e1_jumlah_1']				= $this->m_rkas_new->e1_jumlah()->result();
		$data['f1_jumlah']				= $this->m_rkas_new->f1_jumlah()->result();
		$data['f1_jumlah_1']				= $this->m_rkas_new->f1_jumlah()->result();
		$data['g1_jumlah']				= $this->m_rkas_new->g1_jumlah()->result();
		$data['g1_jumlah_1']				= $this->m_rkas_new->g1_jumlah()->result();
		$data['h1_jumlah']				= $this->m_rkas_new->h1_jumlah()->result();
		$data['h1_jumlah_1']				= $this->m_rkas_new->h1_jumlah()->result();
		$data['i1_jumlah']				= $this->m_rkas_new->i1_jumlah()->result();
		$data['i1_jumlah_1']				= $this->m_rkas_new->i1_jumlah()->result();

		$data['jumlah_penggunaan_dana']	= $this->m_rkas_new->jumlah_penggunaan_dana()->result();
		$data['jumlah_penggunaan_dana_rapbs']	= $this->m_rkas_new->jumlah_penggunaan_dana_rapbs()->result();
		$data['jumlah_penerimaan_dana']	= $this->m_rkas_new->jumlah_penerimaan_dana()->result();
		$data['jumlah_penerimaan_dana_rapbs']	= $this->m_rkas_new->jumlah_penerimaan_dana_rapbs()->result();
		$this->load->view('rkas_new/uraian', $data);
	}
	public function tambah_sumber_dana($id_ur)
	{

		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$where = array(
			'id_uraian' => $id_ur
		);

		$data['id_uraian']	= $this->m_rkas_new->perbaharui_data($where,'2_uraian')->result();
		$this->load->view('rkas_new/tambah_sumber_dana',$data);
	}
	public function aktifkan_tahun($id_tahun)
	{
		$data = array(
			'status' => '1'
		);
		$data1 = array(
			'status' => '0' , 
		);
		$where = array(
			'id_tahun' => $id_tahun
		);
		$this->m_rkas_new->perbaharui_semua($data1,'1_tahun_anggaran');
		$this->m_rkas_new->aksi_perbaharui($where,$data,'1_tahun_anggaran');
		redirect(base_url('rkas_new/tahun_anggaran'));
	}
	public function perbaharui_sumber_dana($id_uraian_dana)
	{

		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$where = array(
			'id_uraian' => $id_uraian_dana
		);

		$data['id_uraian']	= $this->m_rkas_new->perbaharui_data($where,'3_sumber_dana')->result();
		$this->load->view('rkas_new/perbaharui_sumber_dana',$data);
	}
	public function aksi_perbaharui_sumber_dana()
	{
		$id_uraian			= $this->input->post('id_uraian');
		$rutin				= $this->input->post('rutin');
		$pusat				= $this->input->post('pusat');
		$prov				= $this->input->post('prov');
		$kota				= $this->input->post('kota');
		$bl					= $this->input->post('bl');
		$pl					= $this->input->post('pl');
		$jumlah				= $this->input->post('jumlah');

		$data = array(
			'id_uraian' => $id_uraian, 
			'rutin' => $rutin, 
			'pusat' => $pusat, 
			'prov' => $prov, 
			'kota' => $kota, 
			'bl' => $bl, 
			'pl' => $pl, 
			'jumlah' => $jumlah
		);

		$where = array(
			'id_uraian' => $id_uraian
		);

		$this->m_rkas_new->aksi_perbaharui($where,$data,'3_sumber_dana');
		redirect(base_url('rkas_new/uraian'));
	}

	public function aksi_tambah_sumber_dana()
	{
		$id_uraian			= $this->input->post('id_uraian');
		$id_tahun			= $this->input->post('id_tahun');
		$rutin				= $this->input->post('rutin');
		$pusat				= $this->input->post('pusat');
		$prov				= $this->input->post('prov');
		$kota				= $this->input->post('kota');
		$bl					= $this->input->post('bl');
		$pl					= $this->input->post('pl');
		$jumlah				= $this->input->post('jumlah');

		// var_dump($id_uraian,$id_tahun,$pusat,$prov,$kota,$bl,$pl,$jumlah);die();

		$data = array(
			'id_uraian' => $id_uraian, 
			'id_tahun' => $id_tahun, 
			'rutin' => $rutin, 
			'pusat' => $pusat, 
			'prov' => $prov, 
			'kota' => $kota, 
			'bl' => $bl, 
			'pl' => $pl, 
			'jumlah' => $jumlah
		);

		$this->m_rkas_new->masukan_data($data,'3_sumber_dana');
		redirect(base_url('rkas_new/uraian'));
	}
	public function tambah_uraian()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$isi = array(
			'status' => '1',
		 );

		$data['tahun_anggaran']		= $this->m_rkas_new->perbaharui_data($isi,'1_tahun_anggaran')->result();
		$this->load->view('rkas_new/tambah_uraian',$data);
	}
	public function aksi_tambah_uraian()
	{
		$id_tahun			= $this->input->post('id_tahun');
		$kode_uraian		= $this->input->post('kode_uraian');
		$uraian				= $this->input->post('uraian');

		$data = array(
			'id_tahun' => $id_tahun, 
			'kode_uraian' => $kode_uraian, 
			'uraian' => $uraian, 
		);

		$this->m_rkas_new->masukan_data($data,'2_uraian');
		redirect(base_url('rkas_new/uraian'));
	}
	public function perbaharui_uraian($id_ur)
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');

		$where = array(
			'id_uraian' => $id_ur 
		);

		$isi = array(
			'status' => '1',
		 );

		$data['perbaharui_uraian'] 	= $this->m_rkas_new->perbaharui_data($where,'2_uraian')->result();
		$data['tahun_anggaran']		= $this->m_rkas_new->perbaharui_data($isi,'1_tahun_anggaran')->result();
		$this->load->view('rkas_new/perbaharui_uraian', $data);
	}
	
}
