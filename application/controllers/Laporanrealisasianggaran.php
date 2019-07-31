<?php
Class Laporanrealisasianggaran extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('m_buku_kas');
        $this->load->model('m_data_sekolah');
    }
    
    function cetak(){
        // Cell(width,heigh,text,border,end line, align)
        //a4 widh 219mm
        //horizontal 189mm
        $nama_lengkap       = $this->session->userdata('nama_lengkap');
        $email              = $this->session->userdata('email');
        $nama_sekolah       = $this->session->userdata('nama_sekolah');

        $data_sekolah               = $this->m_data_sekolah->tampil_data()->result();
        $tampil_data_1_tahun_anggaran_judul = $this->m_buku_kas->tampil_data_1_tahun_anggaran_uraian()->result();
        $tampil_data_4_buku_kas     = $this->m_buku_kas->tampil_data_4_buku_kas()->result();

        $realisasi_a1               = $this->m_buku_kas->realisasi_a1()->result();
        $realisasi_b1               = $this->m_buku_kas->realisasi_b1()->result();
        $realisasi_c1               = $this->m_buku_kas->realisasi_c1()->result();
        $realisasi_d1               = $this->m_buku_kas->realisasi_d1()->result();
        $realisasi_e1               = $this->m_buku_kas->realisasi_e1()->result();
        $realisasi_f1               = $this->m_buku_kas->realisasi_f1()->result();
        $realisasi_g1               = $this->m_buku_kas->realisasi_g1()->result();
        $realisasi_h1               = $this->m_buku_kas->realisasi_h1()->result();
        $realisasi_i1               = $this->m_buku_kas->realisasi_i1()->result();
        $realisasi_a1_jumlah        = $this->m_buku_kas->realisasi_a1_jumlah()->result();
        $realisasi_b1_jumlah        = $this->m_buku_kas->realisasi_b1_jumlah()->result();
        $realisasi_c1_jumlah        = $this->m_buku_kas->realisasi_c1_jumlah()->result();
        $realisasi_d1_jumlah        = $this->m_buku_kas->realisasi_d1_jumlah()->result();
        $realisasi_e1_jumlah        = $this->m_buku_kas->realisasi_e1_jumlah()->result();
        $realisasi_f1_jumlah        = $this->m_buku_kas->realisasi_f1_jumlah()->result();
        $realisasi_g1_jumlah        = $this->m_buku_kas->realisasi_g1_jumlah()->result();
        $realisasi_h1_jumlah        = $this->m_buku_kas->realisasi_h1_jumlah()->result();
        $realisasi_i1_jumlah        = $this->m_buku_kas->realisasi_i1_jumlah()->result();
        $realisasi_penggunaan       = $this->m_buku_kas->realisasi_penggunaan()->result();
        $realisasi_penerimaan       = $this->m_buku_kas->realisasi_penerimaan()->result();

        $pdf = new FPDF('L','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',14);
        // mencetak string 
        $pdf->Cell(275,7,'SMK TERPADU AL-IKHWAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(275,7,'JL. KHOER AFANDI NO.13, KOTA TASIKMALAYA',0,1,'C');
        $pdf->Image("http://localhost/ci/images/logo.jpg", 10, 4, 20.78);

        $pdf->SetLineWidth(0.5);

        $pdf->Line(10, 27, 287, 27);
        $pdf->SetLineWidth(0.1);
        // Line(titik awal garis, kiri atas, titik akhir garis, kanan atas)
        $pdf->Line(10, 28, 287, 28);
        // Line(titik awal garis, kiri atas, titik akhir garis, kanan atas)
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,8,'',0,1,'L');
        $pdf->Cell(275,5,'Tahun Anggaran 2017-2018',0,1,'C');

        $pdf->SetFont('Arial','',11);
        $kirim = 38;
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'',1,0,'C');
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim+140,10,'Rencana Anggaran Per Sumber Dana',1,1,'C');
        
        $pdf->Cell($kirim-20,10,'No Kode',1,0,'C');
        $pdf->Cell($kirim+5,10,'Nama Uraian Kegiatan',1,0,'C');
        $pdf->Cell($kirim,10,'Jumlah (RP)',1,0,'C');
        $pdf->Cell($kirim-12,10,'Rutin',1,0,'C');
        $pdf->Cell($kirim+51,10,'Bantuan Operasional Sekolah',1,0,'C');
        $pdf->Cell($kirim-11,10,'Bantuan Lain',1,0,'C');
        $pdf->Cell($kirim-2,10,'Pendapatan Lainnya',1,1,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'',1,0,'C');
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'Pusat',1,0,'C');
        $pdf->Cell($kirim-5,10,'Provinsi',1,0,'C');
        $pdf->Cell($kirim-10,10,'Kota/Kab.',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');
        $pdf->SetFont('Arial','',11);

        $pdf->Cell($kirim-20,10,'A',1,0,'C');
        $pdf->Cell($kirim+5,10,'Penerimaan',1,0,'L');
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        foreach ($realisasi_a1 as $realisasi_a1 ) {

        $pdf->Cell($kirim-20,10,$realisasi_a1->kode_uraian,1,0,'C');
        $pdf->Cell($kirim+5,10,$realisasi_a1->uraian2,1,0,'L');
        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_a1->pemasukan_dana),1,0,'C');
        $rutin = "";
        $pusat = "";
        $prov = "";
        $kota = "";
        $bl = "";
        $pl = "";
        if($realisasi_a1->keterangan_sumber_dana == "pusat") {
            $pusat = "Rp. ".number_format($realisasi_a1->pemasukan_dana) ;
        }
        if($realisasi_a1->keterangan_sumber_dana == "prov") {
            $prov = "Rp. ".number_format($realisasi_a1->pemasukan_dana) ;
        }
        if($realisasi_a1->keterangan_sumber_dana == "kota") {
            $kota = "Rp. ".number_format($realisasi_a1->pemasukan_dana) ;
        }
        if($realisasi_a1->keterangan_sumber_dana == "bl") {
            $bl = "Rp. ".number_format($realisasi_a1->pemasukan_dana) ;
        }
        if($realisasi_a1->keterangan_sumber_dana == "pl") {
            $pl = "Rp. ".number_format($realisasi_a1->pemasukan_dana) ;
        }
        
        $pdf->Cell($kirim-12,10,$rutin,1,0,'C');
        $pdf->Cell($kirim-10,10,$pusat,1,0,'C');
        $pdf->Cell($kirim-5,10,$prov,1,0,'C');
        $pdf->Cell($kirim-10,10,$kota,1,0,'C');
        $pdf->Cell($kirim-11,10,$bl,1,0,'C');
        $pdf->Cell($kirim-2,10,$pl,1,1,'C');

        }

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'R');
        foreach ($realisasi_a1_jumlah as $realisasi_a1_jumlah ){}

        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_a1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'B',1,0,'C');
        $pdf->Cell($kirim+5,10,'Penggunaan Dana',1,0,'L');
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');
       
        $pdf->Cell($kirim-20,10,'1',1,0,'C');
        $pdf->SetFont('Arial','',9);

        $pdf->Cell($kirim+5,10,'Pengembangan Kompetisi Lulusan',1,0,'L');
        $pdf->SetFont('Arial','',11);

        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');
       
        foreach ($realisasi_b1 as $realisasi_b1 ) {

        $pdf->Cell($kirim-20,10,$realisasi_b1->kode_uraian,1,0,'C');
        $pdf->Cell($kirim+5,10,$realisasi_b1->uraian2,1,0,'L');
        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_b1->pengeluaran_dana),1,0,'C');
        $rutin = "";
        $pusat = "";
        $prov = "";
        $kota = "";
        $bl = "";
        $pl = "";
        if($realisasi_b1->keterangan_sumber_dana == "pusat") {
            $pusat = "Rp. ".number_format($realisasi_b1->pemasukan_dana) ;
        }
        if($realisasi_b1->keterangan_sumber_dana == "prov") {
            $prov = "Rp. ".number_format($realisasi_b1->pemasukan_dana) ;
        }
        if($realisasi_b1->keterangan_sumber_dana == "kota") {
            $kota = "Rp. ".number_format($realisasi_b1->pemasukan_dana) ;
        }
        if($realisasi_b1->keterangan_sumber_dana == "bl") {
            $bl = "Rp. ".number_format($realisasi_b1->pemasukan_dana) ;
        }
        if($realisasi_b1->keterangan_sumber_dana == "pl") {
            $pl = "Rp. ".number_format($realisasi_b1->pemasukan_dana) ;
        }
        
        $pdf->Cell($kirim-12,10,$rutin,1,0,'C');
        $pdf->Cell($kirim-10,10,$pusat,1,0,'C');
        $pdf->Cell($kirim-5,10,$prov,1,0,'C');
        $pdf->Cell($kirim-10,10,$kota,1,0,'C');
        $pdf->Cell($kirim-11,10,$bl,1,0,'C');
        $pdf->Cell($kirim-2,10,$pl,1,1,'C');

        }
       
        $pdf->Cell($kirim-20,10,'3',1,0,'C');
        $pdf->SetFont('Arial','',9);

        $pdf->Cell($kirim+5,10,'Pengembangan Standar Proses',1,0,'L');
        $pdf->SetFont('Arial','',11);

        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        foreach ($realisasi_d1 as $realisasi_d1 ) {

        $pdf->Cell($kirim-20,10,$realisasi_d1->kode_uraian,1,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell($kirim+5,10,$realisasi_d1->uraian2,1,0,'C');
        $pdf->SetFont('Arial','',11);

        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_d1->pengeluaran_dana),1,0,'C');
        $rutin = "";
        $pusat = "";
        $prov = "";
        $kota = "";
        $bl = "";
        $pl = "";
        if($realisasi_d1->keterangan_sumber_dana == "pusat") {
            $pusat = "Rp. ".number_format($realisasi_d1->pemasukan_dana) ;
        }
        if($realisasi_d1->keterangan_sumber_dana == "prov") {
            $prov = "Rp. ".number_format($realisasi_d1->pemasukan_dana) ;
        }
        if($realisasi_d1->keterangan_sumber_dana == "kota") {
            $kota = "Rp. ".number_format($realisasi_d1->pemasukan_dana) ;
        }
        if($realisasi_d1->keterangan_sumber_dana == "bl") {
            $bl = "Rp. ".number_format($realisasi_d1->pemasukan_dana) ;
        }
        if($realisasi_d1->keterangan_sumber_dana == "pl") {
            $pl = "Rp. ".number_format($realisasi_d1->pemasukan_dana) ;
        }
        
        $pdf->Cell($kirim-12,10,$rutin,1,0,'C');
        $pdf->Cell($kirim-10,10,$pusat,1,0,'C');
        $pdf->Cell($kirim-5,10,$prov,1,0,'C');
        $pdf->Cell($kirim-10,10,$kota,1,0,'C');
        $pdf->Cell($kirim-11,10,$bl,1,0,'C');
        $pdf->Cell($kirim-2,10,$pl,1,1,'C');
        }

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'L');
        foreach ($realisasi_d1_jumlah as $realisasi_d1_jumlah ){}
        $pdf->Cell($kirim,10, "Rp. ".number_format($realisasi_d1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell($kirim+5,10,'Pengembangan Pendidik dan Tenaga Kependidikan',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'R');
        foreach ($realisasi_e1_jumlah as $realisasi_e1_jumlah ){}
        $pdf->Cell($kirim,10, "Rp. ".number_format($realisasi_e1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'5',1,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell($kirim+5,10,'Pengembangan Sarana dan Prasarana',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'R');
        foreach ($realisasi_f1_jumlah as $realisasi_f1_jumlah ){}
        $pdf->Cell($kirim,10, "Rp. ".number_format($realisasi_f1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

         $pdf->Cell($kirim-20,10,'6',1,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell($kirim+5,10,'Pengembangan Standar Pengelolaan',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'R');
        foreach ($realisasi_g1_jumlah as $realisasi_g1_jumlah ){}
        $pdf->Cell($kirim,10, "Rp. ".number_format($realisasi_g1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'7',1,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell($kirim+5,10,'Pengembangan Standar Pembiayaan',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        foreach ($realisasi_h1 as $realisasi_h1 ) {
        $pdf->Cell($kirim-20,10,$realisasi_h1->kode_uraian,1,0,'L');
        $pdf->Cell($kirim+5,10,$realisasi_h1->uraian2,1,0,'L');
        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_h1->pengeluaran_dana) ,1,0,'C');
        $rutin = "";
        $pusat = "";
        $prov = "";
        $kota = "";
        $bl = "";
        $pl = "";
        if($realisasi_h1->keterangan_sumber_dana == "pusat") {
            $pusat = "Rp. ".number_format($realisasi_h1->pemasukan_dana) ;
        }
        if($realisasi_h1->keterangan_sumber_dana == "prov") {
            $prov = "Rp. ".number_format($realisasi_h1->pemasukan_dana) ;
        }
        if($realisasi_h1->keterangan_sumber_dana == "kota") {
            $kota = "Rp. ".number_format($realisasi_h1->pemasukan_dana) ;
        }
        if($realisasi_h1->keterangan_sumber_dana == "bl") {
            $bl = "Rp. ".number_format($realisasi_h1->pemasukan_dana) ;
        }
        if($realisasi_h1->keterangan_sumber_dana == "pl") {
            $pl = "Rp. ".number_format($realisasi_h1->pemasukan_dana) ;
        }
        
        $pdf->Cell($kirim-12,10,$rutin,1,0,'C');
        $pdf->Cell($kirim-10,10,$pusat,1,0,'C');
        $pdf->Cell($kirim-5,10,$prov,1,0,'C');
        $pdf->Cell($kirim-10,10,$kota,1,0,'C');
        $pdf->Cell($kirim-11,10,$bl,1,0,'C');
        $pdf->Cell($kirim-2,10,$pl,1,1,'C');

        }

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'R');
        foreach ($realisasi_h1_jumlah as $realisasi_h1_jumlah ){}
        $pdf->Cell($kirim,10, "Rp. ".number_format($realisasi_h1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

         $pdf->Cell($kirim-20,10,'8',1,0,'C');
        $pdf->SetFont('Arial','',9);
        $pdf->Cell($kirim+5,10,'Pengembangan Standar Penilaian',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'Jumlah',1,0,'R');
        foreach ($realisasi_i1_jumlah as $realisasi_i1_jumlah ){}
        $pdf->Cell($kirim,10, "Rp. ".number_format($realisasi_i1_jumlah->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'',1,0,'R');
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'B',1,0,'C');
        $pdf->Cell($kirim+5,10,'Total Penggunaan Dana',1,0,'L');
        foreach ($realisasi_penggunaan as $realisasi_penggunaan ){}
        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_penggunaan->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+5,10,'',1,0,'R');
        $pdf->Cell($kirim,10,'',1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'C',1,0,'C');
        $pdf->Cell($kirim+5,10,'Sisa Dana',1,0,'L');
        foreach ($realisasi_penerimaan as $realisasi_penerimaan) {}
        $pdf->Cell($kirim,10,"Rp. ".number_format($realisasi_penerimaan->jum),1,0,'C');
        $pdf->Cell($kirim-12,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-5,10,'',1,0,'C');
        $pdf->Cell($kirim-10,10,'',1,0,'C');
        $pdf->Cell($kirim-11,10,'',1,0,'C');
        $pdf->Cell($kirim-2,10,'',1,1,'C');

        $MarginKiri = 70;
        $pdf->Cell($MarginKiri,10,"",0,1,'C');
        $pdf->Cell($MarginKiri,10,"Mengetahui",0  ,0,'C');
        $pdf->Cell($MarginKiri,10,"Menyetujui",0  ,0,'C');
        $pdf->Cell($MarginKiri,10,"",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Tasikmalaya,     ".date("F")." 2018",0,1,'C');
        $pdf->Cell($MarginKiri, 10,"Ketua Komite Sekolah,",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Kepala Sekolah,",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Ketua Pengelola,",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Bendahara,",0  ,1,'C');
        $pdf->Cell($MarginKiri,20,"",0,0,'C');
        $pdf->Cell($MarginKiri,20,"",0,0,'C');
        $pdf->Cell($MarginKiri,20,"",0,0,'C');
        $pdf->Cell($MarginKiri,20,"",0,1,'C');
        $pdf->Cell($MarginKiri,10,"H. Iis Iswara",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Dr. Hj. Eti Tismayati, Dra, M. Ag",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Dessy Syam FE, M. Pd",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Hj. Lasmanah Aidah",0,1,'C');
        
        $pdf->Output();
    }
}