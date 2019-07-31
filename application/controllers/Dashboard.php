<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	function __construct(){
		parent::__construct();		
		$this->load->model('m_dashboard');

			if($this->session->userdata('status') != "masuk"){
			redirect(base_url("masuk"));
		}
	}

	public function index()
	{
		$data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
		$data['email'] = $this->session->userdata('email');
		$data['nama_sekolah'] = $this->session->userdata('nama_sekolah');

		$data['total_penerimaan_dana'] = $this->m_dashboard->total_penerimaan_dana()->result();
		$data['total_dana_terealisasi'] = $this->m_dashboard->total_dana_terealisasi()->result();
		$this->load->view('dashboard/index',$data);
	}
	
}

