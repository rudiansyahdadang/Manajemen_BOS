<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('conn/head.php') ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('conn/header_nav.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
     <?php include('conn/side_nav.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
<!--           KONTEN UNTAMA -->
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Buku Kas Tunai &nbsp;&nbsp; <a href="<?php echo base_url(); ?>buku_kas/tambah_pemasukan" class="btn btn-success btn-rounded btn-fw">Tambah Pemasukan Dana</a><a href="<?php echo base_url(); ?>buku_kas/tambah_pengeluaran" class="btn btn-danger btn-rounded btn-fw">Tambah Pengeluaran Dana</a><a href="#" class="btn btn-primary btn-rounded btn-fw" data-izimodal-open="#modal-realisasi" data-izimodal-transitionin="fadeInDown">Lihat Realisasi Anggaran</a>
                  <a href="<?php echo base_url()?>laporanrealisasianggaran/cetak" class="btn btn-primary btn-rounded btn-fw">Cetak Realisasi Anggaran</a>
                  </h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>No. Kode</th>
                        <th>No. Bukti</th>
                        <th>Uraian</th>
                        <th width="15%">Penerimaan</th>
                        <th width="15%">Pengeluaran</th>
                        <th width="20%">Saldo</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no = 1;
                    // if (empty($bulan)) {
                    //   $bulan = '0';
                    // }else{
                    //   $bulan = $bulan;
                    // }
                    $saldo = 0;
                    // var_dump($tampil_data_4_buku_kas_laporan);die();
                    foreach ($tampil_data_4_buku_kas as $a) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?> </td>
                        <td><?php echo $a->tgl ?> </td>
                        <td><?php echo $a->kode_uraian ?> </td>
                        <td><?php echo $a->no_bukti ?> </td>
                        <td><?php echo $a->uraian ?> </td>
                        <td><?php if ($a->pemasukan_dana != '0') { echo "Rp. ".number_format($a->pemasukan_dana) ; }else{echo "" ; } ?> </td>
                        <td><?php if ($a->pengeluaran_dana != '0') { echo "Rp. ".number_format($a->pengeluaran_dana) ; }else{echo "" ; } ?> </td>
                        <td>
                          <?php  
                            $saldo = ($saldo + $a->pemasukan_dana) - $a->pengeluaran_dana ;

                            echo "Rp. ".number_format($saldo) ;
                          ?>
                        </td>
                        <td valign="middle"><a href="<?php echo base_url()."buku_kas/hapus_dana/".$a->id_buku_kas ?>" class="badge badge-danger mx-auto mt-3">Hapus</a> 
                          <?php if ($a->pemasukan_dana != '0'){ ?>
                            <a href="<?php echo base_url()."buku_kas/perbaharui_pemasukan_dana/".$a->id_buku_kas ?>" class="badge badge-teal mx-auto mt-3">Perbaharui</a>
                          <?php }else{ ?>
                            <a href="<?php echo base_url()."buku_kas/perbaharui_pengeluaran_dana/".$a->id_buku_kas ?>" class="badge badge-teal mx-auto mt-3">Perbaharui</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

<!--           KONTEN UNTAMA -->
  <div id="modal-realisasi" class="trigger-large"> <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
                                      <table width="100%" align="center">
                                        <tr>
                                          <td colspan="12">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td colspan="12"><p align="center">REALISASI PENGGUNAAN DANA TIAP JENIS KEGIATAN ( RKAS ) </p></td>
                                        </tr>
                                        <tr>
                                          <?php foreach ($tampil_data_1_tahun_anggaran_judul as $tampil_data_1_tahun_anggaran_judul) { ?>
                                          <td colspan="12"><p align="center">TAHUN ANGGARAN <?php echo $tampil_data_1_tahun_anggaran_judul->tahun; ?></p></td>
                                          <?php } ?>
                                        </tr>
                                        <tr>
                                          <td colspan="12">&nbsp;</td>
                                        </tr>
                                        <?php foreach ($data_sekolah as $se) { ?>
                                        <tr>
                                          <td colspan="3" width="10%"> Nama Sekolah </td>
                                          <td colspan="9">:&nbsp;<?php echo $se->nama_sekolah ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="3"> Desa/Kelurahan </td>
                                          <td colspan="9">:&nbsp;<?php echo $se->kel_des ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="3"> Kabupaten/Kota </td>
                                          <td colspan="9">:&nbsp;<?php echo $se->kab_kota ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="3"> Provinsi </td>
                                          <td colspan="9">:&nbsp;<?php echo $se->provinsi ?></td>
                                        </tr>
                                        <tr>
                                          <td colspan="12">:&nbsp;</td>
                                        </tr>
                                        <?php } ?>
                                        <table border="1" align="center" width="100%">
                                        <tr align="center">
                                          <td width="5%" rowspan="3">No. Kode</td>
                                          <td width="15%" colspan="3" rowspan="3">Nama Uraian Kegiatan</td>
                                          <td rowspan="3">Jumlah (Rp)</td>
                                          <td colspan="6">Rencana Anggaran Per Sumber Dana</td>
                                        </tr>
                                        <tr align="center">
                                          <td rowspan="2" size="">Rutin</td>
                                          <td colspan="3">BANTUAN OPERASIONAL SEKOLAH</td>
                                          <td rowspan="2">Bantuan Lain</td>
                                          <td rowspan="2" width="7%">Pendapatan Lainnya</td>
                                        </tr>
                                        <tr align="center">
                                          <td>Pusat</td>
                                          <td>Provinsi</td>
                                          <td>Kab/Kota</td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>A</b></td>
                                          <td colspan="3"><b>Penerimaan</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_a1 as $realisasi_a1 ) { ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_a1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_a1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <?php if($realisasi_a1->keterangan_sumber_dana == "rutin") { ?>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <?php } if($realisasi_a1->keterangan_sumber_dana == "pusat") { ?>
                                          <td></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <?php } if($realisasi_a1->keterangan_sumber_dana == "prov") { ?>
                                          <td></td>
                                          <td></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <?php } if($realisasi_a1->keterangan_sumber_dana == "kota") { ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <?php } if($realisasi_a1->keterangan_sumber_dana == "bl") { ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <td></td>
                                          <?php } if($realisasi_a1->keterangan_sumber_dana == "pl") { ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1->pemasukan_dana) ; ?></td>
                                          <?php } ?>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right"><b>Jumlah&nbsp;</b></td>
                                          <?php foreach ($realisasi_a1_jumlah as $realisasi_a1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_a1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>B</b></td>
                                          <td colspan="3"><b>Penggunaan Dana</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>1</b></td>
                                          <td colspan="3"><b>Pengembangan Kompetensi Lulusan</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_b1 as $realisasi_b1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_b1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_b1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_b1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <?php foreach ($realisasi_b1_jumlah as $realisasi_b1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_b1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>2</b></td>
                                          <td colspan="3"><b>Pengembangan Standar Isi</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_c1 as $realisasi_c1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_c1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_c1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_c1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <?php foreach ($realisasi_c1_jumlah as $realisasi_c1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_c1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>3</b></td>
                                          <td colspan="3"><b>Pengembangan Standar Proses</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_d1 as $realisasi_d1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_d1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_d1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_d1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <?php foreach ($realisasi_d1_jumlah as $realisasi_d1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_d1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>4</b></td>
                                          <td colspan="3"><b>Pengembangan Pendidik dan Tenaga Kependidikan</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_e1 as $realisasi_e1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_e1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_e1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_e1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                         <?php foreach ($realisasi_e1_jumlah as $realisasi_e1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_e1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>5</b></td>
                                          <td colspan="3"><b>Pengembangan Sarana dan Prasarana</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_f1 as $realisasi_f1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_f1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_f1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_f1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <?php foreach ($realisasi_f1_jumlah as $realisasi_f1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_f1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>6</b></td>
                                          <td colspan="3"><b>Pengembangan Standar Pengelolaan</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_g1 as $realisasi_g1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_g1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_g1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_g1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <?php foreach ($realisasi_g1_jumlah as $realisasi_g1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_g1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>7</b></td>
                                          <td colspan="3"><b>Pengembangan Standar Pembiayaan</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_h1 as $realisasi_h1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_h1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_h1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_h1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                         <?php foreach ($realisasi_h1_jumlah as $realisasi_h1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_h1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>8</b></td>
                                          <td colspan="3"><b>Pengembangan Standar Penilaian</b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php foreach ($realisasi_i1 as $realisasi_i1 ){ ?>
                                        <tr>
                                          <td align="center">&nbsp;<?php echo $realisasi_i1->kode_uraian ; ?></td>
                                          <td colspan="3">&nbsp;<?php echo $realisasi_i1->uraian2 ; ?></td>
                                          <td>&nbsp;<?php echo "Rp. ".number_format($realisasi_i1->pengeluaran_dana) ; ?></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <?php foreach ($realisasi_i1_jumlah as $realisasi_i1_jumlah ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_i1_jumlah->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="3">&nbsp;</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>B.</b></td>
                                          <td colspan="3" align="left"><b>Total Penggunaan Dana</b></td>
                                          <?php foreach ($realisasi_penggunaan as $realisasi_penggunaan ){ ?>
                                          <td><b>&nbsp;<?php echo "Rp. ".number_format($realisasi_penggunaan->jum) ?></b></td>
                                          <?php } ?>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="3">&nbsp;</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><b>C.</b></td>
                                          <td colspan="3" align="left"><b>Sisa Dana</b></td>
                                          <td><b><?php 
                                            foreach ($realisasi_penerimaan as $realisasi_penerimaan) {
                                              $hasil = $realisasi_penerimaan->jum - $realisasi_penggunaan->jum ;
                                              echo "Rp. ".number_format($hasil);               
                                            } ?>    
                                          </b></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="3">&nbsp;</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                        </tr>
                                      </table>
                                      </table>
                                      <table align="center" >
                                        <tr>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width="20%">Mengetahui:</td>
                                          <td>&nbsp;</td>
                                          <td width="20%">Menyetujui:</td>
                                          <td>&nbsp;</td>
                                          <td width="20%">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td width="20%">Tasikmalaya, Juli 2018</td>
                                        </tr>
                                        <tr>
                                          <td>Ketua Komite Sekolah,</td>
                                          <td>&nbsp;</td>
                                          <td>Kepala Sekolah,</td>
                                          <td>&nbsp;</td>
                                          <td>Ketua Pengelola,</td>
                                          <td>&nbsp;</td>
                                          <td>Bendahara,</td>
                                        </tr>
                                        <tr>
                                          <td height="70">&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>H. Iis Iswara</td>
                                          <td>&nbsp;</td>
                                          <td>Dr. Hj. Eti Tismayati, Dra, M. Ag </td>
                                          <td>&nbsp;</td>
                                          <td>Dessy Syam FE, M. Pd </td>
                                          <td>&nbsp;</td>
                                          <td>Hj. Lasmanah Aidah</td>
                                        </tr>
                                      </table>
                                  </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
       <?php include('conn/footer.php') ?> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 <?php include('conn/js_link.php') ?>
 <script type="text/javascript">
   $(document).on('click', '.trigger-largeContent', function (event) {
    event.preventDefault();
    $('#modal-realisasi').iziModal('open', this); // Do not forget the "this"
    }); 
    $("#modal-realisasi").iziModal({
        title: 'Buku Kas Tunai',
        subtitle: 'Laporan Keluar Masuk Dana',
        theme: '',
        headerColor: '#2c59f9',
        overlayColor: 'rgba(0, 0, 0, 0.4)',
        iconColor: '',
        iconClass: null,
        width: 1366,
        padding: 0,
        overlayClose: true,
        closeOnEscape: true,
        bodyOverflow: false,
    }); 

 </script>
</body>

</html>