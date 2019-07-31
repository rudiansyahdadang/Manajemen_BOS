<?php
Class Laporankasumum extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('m_buku_kas');
    }
    
    function cetak($bulan){
        // Cell(width,heigh,text,border,end line, align)
        //a4 widh 219mm
        //horizontal 189mm
        if ($bulan == '01') 
          { $bulanText = "Januari" ; }
        else if($bulan == '02')
          {$bulanText = "Februari" ; } 
        else if($bulan == '03')
          {$bulanText = "Maret" ; } 
        else if($bulan == '04')
          {$bulanText = "April" ; } 
        else if($bulan == '05')
          {$bulanText = "Mei" ; } 
        else if($bulan == '06')
          {$bulanText = "Juni" ; } 
        else if($bulan == '07')
          {$bulanText = "Juli" ; } 
        else if($bulan == '08')
          {$bulanText = "Agustus" ; } 
        else if($bulan == '09')
          {$bulanText = "September";} 
        else if($bulan == '10')
          {$bulanText = "Oktober" ; }
        else if($bulan == '11')
          {$bulanText = "November" ; } 
        else if($bulan == '12')
          {$bulanText = "Desember" ; }
        else if(empty($bulan))
          {echo ""; }   
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
        $pdf->Cell(275,5,'Buku Kas Umum',0,1,'C');
        $pdf->Cell(275,5,'Bulan : '.$bulanText,0,1,'C');

        $pdf->SetFont('Arial','',11);
        $kirim = 38;
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell($kirim,10,'Tanggal',1,0,'C');
        $pdf->Cell($kirim,10,'No. Kode',1,0,'C');
        $pdf->Cell($kirim,10,'No. Bukti',1,0,'C');
        $pdf->Cell($kirim+10,10,'Uraian',1,0,'C');
        $pdf->Cell($kirim,10,'Penerimaan (Debet)',1,0,'C');
        $pdf->Cell($kirim,10,'Pengeluaran (Kredit)',1,0,'C');
        $pdf->Cell($kirim,10,'Saldo',1,1,'C');

        $q = $this->db->query('SELECT 2_uraian.*,
                                        2_uraian.id_uraian as id_uraian2,
                                        4_buku_kas.*,
                                        1_tahun_anggaran.*
                                        from 4_buku_kas
                                        join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
                                        join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
                                        where 1_tahun_anggaran.status = "1" AND MONTH(tgl) = "'.$bulan.'" order by 4_buku_kas.tgl asc
                                ')->result();
            $saldo = 0;

       foreach ($q as $r) {
            $pdf->Cell($kirim,10,$r->tgl,1,0,'C');
            $pdf->Cell($kirim,10,$r->kode_uraian,1,0,'C');
            $pdf->Cell($kirim,10,$r->no_bukti,1,0,'C');
            $pdf->Cell($kirim+10,10,$r->uraian,1,0,'C');
            $debet = "";
            if ($r->pemasukan_dana != '0') 
                { $debet = "Rp. ".number_format($r->pemasukan_dana) ; 
            }else{
                $debet =  "" ; 
                }

            if ($r->pengeluaran_dana != '0') { 
                $kredit = "Rp.".number_format($r->pengeluaran_dana) ; 
            }else{
                $kredit = ""; 
            }
            $saldo = ($saldo + $r->pemasukan_dana) - $r->pengeluaran_dana ;
            $saldoTampil = "Rp. ".number_format($saldo) ;
            $pdf->Cell($kirim,10,$debet,1,0,'C');
            $pdf->Cell($kirim,10,$kredit,1,0,'C');
            $pdf->Cell($kirim,10,$saldoTampil,1,1,'C');
        }
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