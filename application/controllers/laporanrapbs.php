<?php
Class Laporanrapbs extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('m_rkas_new');
        $this->load->model('m_data_sekolah');
        $this->load->model('m_buku_kas');

    }
    
    function cetak(){
        // Cell(width,heigh,text,border,end line, align)
        //a4 widh 219mm
        //horizontal 189mm
        $data_sekolah                           = $this->m_data_sekolah->tampil_data()->result();
        $tampil_data_1_tahun_anggaran_judul = $this->m_rkas_new->tampil_data_1_tahun_anggaran_uraian()->result();
        $tampil_data_1_tahun_anggaran_uraian    = $this->m_rkas_new->tampil_data_1_tahun_anggaran_uraian()->result();

        $uraian         = $this->m_rkas_new->tampil_data_2_uraian()->result();
        $penerimaan     = $this->m_rkas_new->tampil_data_penerimaan()->result();
        $tampil_data_penerimaan_jumlah      = $this->m_rkas_new->tampil_data_penerimaan_jumlah()->result();

        $sisa_dana      = $this->m_rkas_new->sisa_dana()->result();
        $pendapatan_rutin       = $this->m_rkas_new->pendapatan_rutin()->result();
        $bos_pusat      = $this->m_rkas_new->bos_pusat()->result();
        $bos_provinsi       = $this->m_rkas_new->bos_provinsi()->result();
        $bos_kota       = $this->m_rkas_new->bos_kota()->result();
        $bl     = $this->m_rkas_new->bl()->result();
        $pl     = $this->m_rkas_new->pl()->result();

        $b1             = $this->m_rkas_new->b1()->result();
        $c1             = $this->m_rkas_new->c1()->result();
        $d1             = $this->m_rkas_new->d1()->result();
        $e1             = $this->m_rkas_new->e1()->result();
        $f1             = $this->m_rkas_new->f1()->result();
        $g1             = $this->m_rkas_new->g1()->result();
        $h1             = $this->m_rkas_new->h1()->result();
        $i1             = $this->m_rkas_new->i1()->result();


        $b1_jumlah              = $this->m_rkas_new->b1_jumlah()->result();
        $b1_jumlah_1                = $this->m_rkas_new->b1_jumlah()->result();
        $c1_jumlah              = $this->m_rkas_new->c1_jumlah()->result();
        $c1_jumlah_1                = $this->m_rkas_new->c1_jumlah()->result();
        $d1_jumlah              = $this->m_rkas_new->d1_jumlah()->result();
        $d1_jumlah_1                = $this->m_rkas_new->d1_jumlah()->result();
        $e1_jumlah              = $this->m_rkas_new->e1_jumlah()->result();
        $e1_jumlah_1                = $this->m_rkas_new->e1_jumlah()->result();
        $f1_jumlah              = $this->m_rkas_new->f1_jumlah()->result();
        $f1_jumlah_1                = $this->m_rkas_new->f1_jumlah()->result();
        $g1_jumlah              = $this->m_rkas_new->g1_jumlah()->result();
        $g1_jumlah_1                = $this->m_rkas_new->g1_jumlah()->result();
        $h1_jumlah              = $this->m_rkas_new->h1_jumlah()->result();
        $h1_jumlah_1                = $this->m_rkas_new->h1_jumlah()->result();
        $i1_jumlah              = $this->m_rkas_new->i1_jumlah()->result();
        $i1_jumlah_1                = $this->m_rkas_new->i1_jumlah()->result();

        $jumlah_penggunaan_dana = $this->m_rkas_new->jumlah_penggunaan_dana()->result();
        $jumlah_penggunaan_dana_rapbs   = $this->m_rkas_new->jumlah_penggunaan_dana_rapbs()->result();
        $jumlah_penerimaan_dana = $this->m_rkas_new->jumlah_penerimaan_dana()->result();
        $jumlah_penerimaan_dana_rapbs   = $this->m_rkas_new->jumlah_penerimaan_dana_rapbs()->result();

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
        $pdf->Cell(275,5,'RENCANA ANGGARAN PENDAPATAN BELANJA SEKOLAH',0,1,'C');
        $pdf->Cell(275,5,'TAHUN PEMBELAJARAN  2017-2018',0,1,'C');

        $pdf->SetFont('Arial','',11);
        $kirim = 38;
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(143,10,'Penerimaan',1,0,'C');
        $pdf->Cell(137,10,'Pengeluaran',1,1,'C');


        $pdf->Cell($kirim-20,10,'No.Urut',1,0,'C');
        $pdf->Cell($kirim-20,10,'No.Kode',1,0,'C');
        $pdf->Cell($kirim+38,10,'Uraian',1,0,'C');
        $pdf->Cell($kirim-7,10,'Jumlah',1,0,'C');
        $pdf->Cell($kirim-20,10,'No.Kode',1,0,'C');
        $pdf->Cell($kirim+50,10,'Uraian',1,0,'C');
        $pdf->Cell($kirim-7,10,'Jumlah',1,1,'C');


        $pdf->Cell($kirim-20,10,'1',1,0,'C');
        $pdf->Cell($kirim-20,10,'2',1,0,'C');
        $pdf->Cell($kirim+38,10,'3',1,0,'C');
        $pdf->Cell($kirim-7,10,'4',1,0,'C');
        $pdf->Cell($kirim-20,10,'5',1,0,'C');
        $pdf->Cell($kirim+50,10,'6',1,0,'C');
        $pdf->Cell($kirim-7,10,'7',1,1,'C');

        $pdf->Cell($kirim-20,10,'I',1,0,'C');
        $pdf->Cell($kirim-20,10,'1',1,0,'C');
        $pdf->Cell($kirim+38,10,'Sisa Tahun Lalu',1,0,'L');
        
        foreach ($sisa_dana as $sisa_dana1) {}
        $pdf->Cell($kirim-7,10,$sisa_dana1->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'Program Sekolah',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'II',1,0,'C');
        $pdf->Cell($kirim-20,10,'2',1,0,'C');
        $pdf->Cell($kirim+38,10,'Pendapatan Rutin',1,0,'L');
        foreach ($pendapatan_rutin as $pendapatan_rutin) {}
        $pdf->Cell($kirim-7,10,$pendapatan_rutin->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        foreach ($b1_jumlah_1 as $b1_jumlah_1) {}
        $pdf->Cell($kirim+50,10,'Pengembangan Kompetensi Kelulusan',1,0,'L');
        $pdf->Cell($kirim-7,10,$b1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'III',1,0,'C');
        $pdf->Cell($kirim-20,10,'3',1,0,'C');
        $pdf->Cell($kirim+38,10,'Bantuan Operasional Sekolah',1,0,'Line');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'Pengembangan Standar Isi',1,0,'L');
        foreach ($c1_jumlah_1 as $c1_jumlah_1) {}
        $pdf->Cell($kirim-7,10,$c1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'3.1',1,0,'C');
        $pdf->Cell($kirim+38,10,'BOS Pusat',1,0,'L');
        foreach ($bos_pusat as $bos_pusat) {}

        $pdf->Cell($kirim-7,10,$bos_pusat->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'Pengembangan Standar Proses',1,0,'L');
        foreach ($d1_jumlah_1 as $d1_jumlah_1) {}
        $pdf->Cell($kirim-7,10,$d1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'3.1',1,0,'C');
        $pdf->Cell($kirim+38,10,'BPMU',1,0,'L');
        foreach ($bos_provinsi as $bos_provinsi) {}
        $pdf->Cell($kirim-7,10,$bos_provinsi->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell($kirim+50,10,'Pengembangan Pendidik dan Tenaga Kependidikan',1,0,'L');
        $pdf->SetFont('Arial','',11);
        foreach ($e1_jumlah_1 as $e1_jumlah_1) {}
        $pdf->Cell($kirim-7,10,$e1_jumlah_1->jum,1,1,'C');
       
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'3.1',1,0,'C');
        $pdf->Cell($kirim+38,10,'BOS Kabupaten/Kota',1,0,'L');
        foreach ($bos_kota as $bos_kota) {}
        $pdf->Cell($kirim-7,10,$bos_kota->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim+50,10,'Pengembangan Sarana dan Prasarana Sekolah',1,0,'L');
        foreach ($f1_jumlah_1 as $f1_jumlah_1) {}
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim-7,10,$f1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'IV',1,0,'C');
        $pdf->Cell($kirim-20,10,'4',1,0,'C');
        $pdf->Cell($kirim+38,10,'Bantuan',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'Pengembangan Standar Pengelolaan',1,0,'L');
        foreach ($g1_jumlah_1 as $g1_jumlah_1) {}
        $pdf->Cell($kirim-7,10,$g1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'4.1',1,0,'C');
        $pdf->Cell($kirim+38,10,'Dana Dekonsentrasi',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->SetFont('Arial','',11);
        foreach ($h1_jumlah_1 as $h1_jumlah_1) {}
        $pdf->Cell($kirim+50,10,'Pengembangan Standar Pembiayaan',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim-7,10,$h1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'4.1',1,0,'C');
        $pdf->Cell($kirim+38,10,'Dana Tugas Pembantuan',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->SetFont('Arial','',10);
        foreach ($i1_jumlah_1 as $i1_jumlah_1) {}
        $pdf->Cell($kirim+50,10,'Pengembangan dan Implementasi Sistem Penilaian',1,0,'L');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell($kirim-7,10,$i1_jumlah_1->jum,1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'4.3',1,0,'C');
        $pdf->Cell($kirim+38,10,'Dana Alokasi Khusus',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'4.4',1,0,'C');
        $pdf->Cell($kirim+38,10,'Bantuan Lain',1,0,'L');
        foreach ($bl as $bl) {}
        $pdf->Cell($kirim-7,10,$bl->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'V',1,0,'C');
        $pdf->Cell($kirim-20,10,'5',1,0,'C');
        $pdf->Cell($kirim+38,10,'Sumber Pendapatan Lainnya',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'5.1',1,0,'C');
        $pdf->Cell($kirim+38,10,'Pendapatan Lainnya',1,0,'L');
        foreach ($pl as $pl) {}
        $pdf->Cell($kirim-7,10,$pl->jumlah,1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'5.2',1,0,'C');
        $pdf->Cell($kirim+38,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim-20,10,'',1,0,'C');
        $pdf->Cell($kirim+38,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,0,'L');
        $pdf->Cell($kirim-20,10,'',1,0,'L');
        $pdf->Cell($kirim+50,10,'',1,0,'L');
        $pdf->Cell($kirim-7,10,'',1,1,'C');

        $pdf->Cell(112,10,'Jumlah Penerimaan',1,0,'C');
        foreach ($jumlah_penerimaan_dana_rapbs as $hasil_penerimaan) {}
        $pdf->Cell($kirim-7,10,$hasil_penerimaan->jum,1,0,'C');
        $pdf->Cell(106,10,'Jumlah Pengeluaran',1,0,'C');
        foreach ($jumlah_penggunaan_dana_rapbs as $hasil_penerimaan_1) {}
        $pdf->Cell($kirim-7,10,$hasil_penerimaan_1->jum,1,1,'C');



        $MarginKiri = 70;
        $pdf->Cell($MarginKiri,10,"",0,1,'C');
        $pdf->Cell($MarginKiri,10,"Mengetahui",0  ,0,'C');
        $pdf->Cell($MarginKiri,10,"Menyetujui",0  ,0,'C');
        $pdf->Cell($MarginKiri,10,"",0,0,'C');
        $pdf->Cell($MarginKiri,10,"Tasikmalaya,     ".date("F")." 2018",0,1,'C');
        $pdf->Cell($MarginKiri,10,"Ketua Komite Sekolah,",0,0,'C');
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