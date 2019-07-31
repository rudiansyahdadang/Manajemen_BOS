<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_kas extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('m_buku_kas');
		$this->load->model('m_data_sekolah');

		if($this->session->userdata('status') != "masuk"){
			redirect(base_url("masuk"));
		}
	}
	public function tunai()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah']		= $this->session->userdata('nama_sekolah');


		$data['data_sekolah']				= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas']		= $this->m_buku_kas->tampil_data_4_buku_kas()->result();
		$this->load->view('buku_kas/tunai', $data);
	}
	public function tambah_pengeluaran()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah']		= $this->session->userdata('nama_sekolah');

		$data['tampil_data_uraian_pengeluaran']			= $this->m_buku_kas->tampil_data_uraian_pengeluaran()->result();
		$data['tampil_data_tahun_anggaran']				= $this->m_buku_kas->tampil_data_tahun_anggaran()->result();
		$this->load->view('buku_kas/tambah_pengeluaran',$data);
	}
	public function tambah_pemasukan()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['tampil_data_uraian_pemasukan']			= $this->m_buku_kas->tampil_data_uraian_pemasukan()->result();
		$data['tampil_data_tahun_anggaran']				= $this->m_buku_kas->tampil_data_tahun_anggaran()->result();
		$this->load->view('buku_kas/tambah_pemasukan',$data);
	}
	public function aksi_tambah_pengeluaran()
	{
		$id_uraian		= $this->input->post('id_uraian');
		$id_tahun		= $this->input->post('id_tahun');
		$tgl			= $this->input->post('tgl');
		$no_kode		= $this->input->post('no_kode');
		$no_bukti		= $this->input->post('no_bukti');
		$uraian			= $this->input->post('uraian');
		$pemasukan_dana			= $this->input->post('pemasukan_dana');
		$pengeluaran_dana			= $this->input->post('pengeluaran_dana');
		$sumber_tujuan	= $this->input->post('sumber_tujuan');

		$data = array(
			'id_uraian' 	=> $id_uraian, 
			'id_tahun' 		=> $id_tahun, 
			'tgl' 			=> $tgl, 
			'no_kode' 		=> $no_kode, 
			'no_bukti' 		=> $no_bukti, 
			'uraian' 		=> $uraian, 
			'pengeluaran_dana' 		=> $pengeluaran_dana,
			'pemasukan_dana' 			=> $pemasukan_dana, 
			'sumber_tujuan' => $sumber_tujuan
		);

		$this->m_buku_kas->masukan_data($data,'4_buku_kas');
		redirect(base_url('buku_kas/tunai'));
	}
	public function aksi_tambah_pemasukan()
	{
		$id_uraian		= $this->input->post('id_uraian');
		$id_tahun		= $this->input->post('id_tahun');
		$tgl			= $this->input->post('tgl');
		$no_kode		= $this->input->post('no_kode');
		$no_bukti		= $this->input->post('no_bukti');
		$uraian			= $this->input->post('uraian');
		$pemasukan_dana			= $this->input->post('pemasukan_dana');
		$pengeluaran_dana			= $this->input->post('pengeluaran_dana');
		$sumber_tujuan	= $this->input->post('sumber_tujuan');
		$keterangan_sumber_dana	= $this->input->post('keterangan_sumber_dana');

		$data = array(
			'id_uraian' 	=> $id_uraian, 
			'id_tahun' 		=> $id_tahun, 
			'tgl' 			=> $tgl, 
			'no_kode' 		=> $no_kode, 
			'no_bukti' 		=> $no_bukti, 
			'uraian' 		=> $uraian, 
			'pengeluaran_dana' 		=> $pengeluaran_dana,
			'pemasukan_dana' 			=> $pemasukan_dana,  
			'sumber_tujuan' => $sumber_tujuan,
			'keterangan_sumber_dana' => $keterangan_sumber_dana
		);

		$this->m_buku_kas->masukan_data($data,'4_buku_kas');
		redirect(base_url('buku_kas/tunai'));
	}
	public function hapus_dana($id_buku_kas)
	{
		$where = array(
			'id_buku_kas' => $id_buku_kas,
			 );

		$this->m_buku_kas->hapus_data($where,'4_buku_kas');
		redirect(base_url('buku_kas/tunai'));
	}
	public function perbaharui_pemasukan_dana($id_buku_kas)
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');

		
		$data['perbaharui']	= $this->m_buku_kas->tampil_data_perbaharui_pemasukan_4_buku_kas($id_buku_kas)->result();

		$data['tampil_data_uraian_pemasukan']			= $this->m_buku_kas->tampil_data_uraian_pemasukan()->result();
		$data['tampil_data_tahun_anggaran']				= $this->m_buku_kas->tampil_data_tahun_anggaran()->result();
		

		$this->load->view('buku_kas/perbaharui_pemasukan_dana',$data);
	}
	public function aksi_perbaharui()
	{
		$id_buku_kas			= $this->input->post('id_buku_kas');
		$id_uraian				= $this->input->post('id_uraian');
		$id_tahun				= $this->input->post('id_tahun');
		$tgl					= $this->input->post('tgl');
		$no_kode				= $this->input->post('no_kode');
		$no_bukti				= $this->input->post('no_bukti');
		$uraian					= $this->input->post('uraian');
		$pemasukan_dana			= $this->input->post('pemasukan_dana');
		$pengeluaran_dana		= $this->input->post('pengeluaran_dana');
		$sumber_tujuan			= $this->input->post('sumber_tujuan');

		$where = array(
			'id_buku_kas' => $id_buku_kas, 
		);

		$data = array(
			'id_uraian' => $id_uraian, 
			'id_tahun' => $id_tahun, 
			'tgl' => $tgl, 
			'no_kode' => $no_kode, 
			'no_bukti' => $no_bukti, 
			'uraian' => $uraian, 
			'pemasukan_dana' => $pemasukan_dana, 
			'pengeluaran_dana' => $pengeluaran_dana, 
			'sumber_tujuan' => $sumber_tujuan 
		);

		$this->m_buku_kas->aksi_perbaharui($where,$data,'4_buku_kas');
		redirect(base_url('buku_kas/tunai'));
	}
	public function perbaharui_pengeluaran_dana($id_buku_kas)
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		
		$data['perbaharui']	= $this->m_buku_kas->tampil_data_perbaharui_pemasukan_4_buku_kas($id_buku_kas)->result();

		$data['tampil_data_uraian_pengeluaran']			= $this->m_buku_kas->tampil_data_uraian_pengeluaran()->result();
		$data['tampil_data_tahun_anggaran']				= $this->m_buku_kas->tampil_data_tahun_anggaran()->result();
		

		$this->load->view('buku_kas/perbaharui_pengeluaran_dana',$data);
	}
	public function umum()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['data_sekolah']				= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas']		= $this->m_buku_kas->tampil_data_4_buku_kas()->result();
		$this->load->view('buku_kas/umum', $data);
	}
	public function bank()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['data_sekolah']				= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas']		= $this->m_buku_kas->tampil_data_4_buku_bank()->result();
		$this->load->view('buku_kas/bank', $data);
	}
	public function pajak()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['tampil_data_4_buku_kas']		= $this->m_buku_kas->tampil_data_4_buku_pajak()->result();
		$this->load->view('buku_kas/pajak', $data);
	}
	public function laporan_tunai()
	{
		$bulan = $this->input->post('bulan');

		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$nama_bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                
                '07' => 'Juli',
                
                '08' => 'Agustus',
                
                '09' => 'September',
                
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );

		$data['nama_bulan']							= $nama_bulan ; 
		$data['bulan']								= $bulan ;
		$data['data_sekolah']						= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas_laporan']		= $this->m_buku_kas->tampil_data_4_buku_kas_laporan($bulan)->result();
		$this->load->view('buku_kas/laporan_tunai', $data);
	}
	public function laporan_umum()
	{
		$bulan = $this->input->post('bulan');

		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$nama_bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );

		$data['nama_bulan']							= $nama_bulan ; 
		$data['bulan']								= $bulan ;
		$data['data_sekolah']						= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas_laporan']		= $this->m_buku_kas->tampil_data_4_buku_kas_laporan($bulan)->result();
		$this->load->view('buku_kas/laporan_umum', $data);
	}
	public function laporan_bank()
	{
		$bulan = $this->input->post('bulan');
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$nama_bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );
		$data['nama_bulan']							= $nama_bulan ; 
		$data['bulan']								= $bulan ;
		$data['data_sekolah']						= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas_laporan']		= $this->m_buku_kas->tampil_data_4_buku_kas_laporan_bank($bulan)->result();
		$this->load->view('buku_kas/laporan_bank', $data);
	}
	public function laporan_pajak()
	{
		$bulan = $this->input->post('bulan');

		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$nama_bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
        );

		$data['nama_bulan']							= $nama_bulan ; 
		$data['bulan']								= $bulan ;
		$data['data_sekolah']						= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_4_buku_kas_laporan']		= $this->m_buku_kas->tampil_data_4_buku_kas_laporan_pajak($bulan)->result();
		$this->load->view('buku_kas/laporan_pajak', $data);
	}
	public function realisasi()
	{
		$data['nama_lengkap'] 		= $this->session->userdata('nama_lengkap');
		$data['email'] 				= $this->session->userdata('email');
		$data['nama_sekolah'] 		= $this->session->userdata('nama_sekolah');

		$data['data_sekolah']				= $this->m_data_sekolah->tampil_data()->result();
		$data['tampil_data_1_tahun_anggaran_judul']	= $this->m_buku_kas->tampil_data_1_tahun_anggaran_uraian()->result();
		$data['tampil_data_4_buku_kas']		= $this->m_buku_kas->tampil_data_4_buku_kas()->result();

		$data['realisasi_a1']				= $this->m_buku_kas->realisasi_a1()->result();
		$data['realisasi_b1']				= $this->m_buku_kas->realisasi_b1()->result();
		$data['realisasi_c1']				= $this->m_buku_kas->realisasi_c1()->result();
		$data['realisasi_d1']				= $this->m_buku_kas->realisasi_d1()->result();
		$data['realisasi_e1']				= $this->m_buku_kas->realisasi_e1()->result();
		$data['realisasi_f1']				= $this->m_buku_kas->realisasi_f1()->result();
		$data['realisasi_g1']				= $this->m_buku_kas->realisasi_g1()->result();
		$data['realisasi_h1']				= $this->m_buku_kas->realisasi_h1()->result();
		$data['realisasi_i1']				= $this->m_buku_kas->realisasi_i1()->result();
		$data['realisasi_a1_jumlah']		= $this->m_buku_kas->realisasi_a1_jumlah()->result();
		$data['realisasi_b1_jumlah']		= $this->m_buku_kas->realisasi_b1_jumlah()->result();
		$data['realisasi_c1_jumlah']		= $this->m_buku_kas->realisasi_c1_jumlah()->result();
		$data['realisasi_d1_jumlah']		= $this->m_buku_kas->realisasi_d1_jumlah()->result();
		$data['realisasi_e1_jumlah']		= $this->m_buku_kas->realisasi_e1_jumlah()->result();
		$data['realisasi_f1_jumlah']		= $this->m_buku_kas->realisasi_f1_jumlah()->result();
		$data['realisasi_g1_jumlah']		= $this->m_buku_kas->realisasi_g1_jumlah()->result();
		$data['realisasi_h1_jumlah']		= $this->m_buku_kas->realisasi_h1_jumlah()->result();
		$data['realisasi_i1_jumlah']		= $this->m_buku_kas->realisasi_i1_jumlah()->result();
		$data['realisasi_penggunaan']		= $this->m_buku_kas->realisasi_penggunaan()->result();
		$data['realisasi_penerimaan']		= $this->m_buku_kas->realisasi_penerimaan()->result();
		$this->load->view('buku_kas/realisasi', $data);
	}
	
	
}
