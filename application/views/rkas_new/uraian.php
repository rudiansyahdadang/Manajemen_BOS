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
                  <h4 class="card-title">Daftar Uraian Anggaran &nbsp;&nbsp; <a href="<?php echo base_url(); ?>rkas_new/tambah_uraian" class="btn btn-primary btn-rounded btn-fw">Tambah Uraian Baru</a> <a href="#" class="btn btn-primary btn-rounded btn-fw" data-izimodal-open="#modal-Large" data-izimodal-transitionin="fadeInDown">Lihat RKAS</a> <a href="#" class="btn btn-primary btn-rounded btn-fw" data-izimodal-open="#modal-rapbs" data-izimodal-transitionin="fadeInDown">Lihat RAPBS</a><a target="_blank" style="margin-left: 5px" href="<?php echo base_url()?>laporanrapbs/cetak" class="btn btn-primary btn-rounded btn-fw" data-izimodal-transitionin="fadeInDown">Cetak RAPBS</a></h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered dataTable" id="book-table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>kode Uraian</th>
                          <th>Uraian</th>
                          <th>Tahun</th>
                          <th width="15%">Jumlah</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = '1';
                        foreach ($uraian as $a) 
                        { 
                          ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $a->kode_uraian; ?></td>
                          <td><?php echo $a->uraian; ?></td>
                          <td><?php echo $a->tahun; ?></td>
                          <td><?php echo "Rp. ".number_format($a->jumlah) ; ?></td>
                          <td><?php if(empty($a->id_uraian_dana)){?>
                            <a href="<?php echo base_url()."rkas_new/tambah_sumber_dana/".$a->id_ur ?>" class="badge badge-primary mx-auto mt-3">Masukan Sumber Dana</a>
                             <a href="<?php echo base_url()."rkas_new/perbaharui_uraian/".$a->id_ur ?>" class="badge badge-warning mx-auto mt-3">Perbaharui Uraian</a></td><?php }else{ ?>
                            <a href="<?php echo base_url()."rkas_new/perbaharui_sumber_dana/".$a->id_uraian_dana ?>" class="badge badge-success mx-auto mt-3">Perbaharui Sumber Dana</a>
                              <a href="<?php echo base_url()."rkas_new/perbaharui_uraian/".$a->id_ur ?>" class="badge badge-warning mx-auto mt-3">Perbaharui Uraian</a></td><?php } ?>
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
                                 <!-- Modal structure -->
                                  <div id="modal-Large" class="trigger-large"> <!-- data-iziModal-fullscreen="true"  data-iziModal-title="Welcome"  data-iziModal-subtitle="Subtitle"  data-iziModal-icon="icon-home" -->
                                      <table align="center" width="100%">
                                        <tr>
                                          <td colspan="12">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td colspan="12"><p align="center">RENCANA KEGIATAN DAN ANGGARAN SEKOLAH ( RKAS ) </p></td>
                                        </tr>
                                        <tr>
                                          <?php foreach ($tampil_data_1_tahun_anggaran_judul as $tampil_data_1_tahun_anggaran_judul) { ?>
                                          <td colspan="12"><p align="center">TAHUN ANGGARAN <?php echo $tampil_data_1_tahun_anggaran_judul->tahun ; ?></p></td>
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
                                          <td width="10%" colspan="3" rowspan="3">Nama Uraian Kegiatan</td>
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
                                        <?php foreach ($penerimaan as $p1) {?>
                                        <tr>
                                          <td align="center"><?php echo $p1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $p1->uraian ?></td>
                                          <td><?php if($p1->jumlah != '0'){echo "Rp. ".number_format($p1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($p1->rutin != '0'){echo "Rp. ".number_format($p1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($p1->pusat != '0'){echo "Rp. ".number_format($p1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($p1->prov != '0'){echo "Rp. ".number_format($p1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($p1->kota != '0'){echo "Rp. ".number_format($p1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($p1->bl != '0'){echo "Rp. ".number_format($p1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($p1->pl != '0'){echo "Rp. ".number_format($p1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right"><b>Jumlah</b></td>
                                          <td><b><?php foreach ($tampil_data_penerimaan_jumlah as $tampil_data_penerimaan_jumlah) {
                                            echo "Rp. ".number_format($tampil_data_penerimaan_jumlah->jum);
                                          } ?></b></td>
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
                                         <?php foreach ($b1 as $b1) {?>
                                        <tr>
                                          <td align="center"><?php echo $b1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $b1->uraian ?></td>
                                          <td><?php if($b1->jumlah != '0'){echo "Rp. ".number_format($b1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($b1->rutin != '0'){echo "Rp. ".number_format($b1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($b1->pusat != '0'){echo "Rp. ".number_format($b1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($b1->prov != '0'){echo "Rp. ".number_format($b1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($b1->kota != '0'){echo "Rp. ".number_format($b1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($b1->bl != '0'){echo "Rp. ".number_format($b1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($b1->pl != '0'){echo "Rp. ".number_format($b1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($b1_jumlah as $b1_jumlah) {
                                            echo "Rp. ".number_format($b1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($c1 as $c1) {?>
                                        <tr>
                                          <td align="center"><?php echo $c1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $c1->uraian ?></td>
                                          <td><?php if($c1->jumlah != '0'){echo "Rp. ".number_format($c1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($c1->rutin != '0'){echo "Rp. ".number_format($c1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($c1->pusat != '0'){echo "Rp. ".number_format($c1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($c1->prov != '0'){echo "Rp. ".number_format($c1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($c1->kota != '0'){echo "Rp. ".number_format($c1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($c1->bl != '0'){echo "Rp. ".number_format($c1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($c1->pl != '0'){echo "Rp. ".number_format($c1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($c1_jumlah as $c1_jumlah) {
                                            echo "Rp. ".number_format($c1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($d1 as $d1) {?>
                                        <tr>
                                          <td align="center"><?php echo $d1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $d1->uraian ?></td>
                                         <td><?php if($d1->jumlah != '0'){echo "Rp. ".number_format($d1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($d1->rutin != '0'){echo "Rp. ".number_format($d1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($d1->pusat != '0'){echo "Rp. ".number_format($d1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($d1->prov != '0'){echo "Rp. ".number_format($d1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($d1->kota != '0'){echo "Rp. ".number_format($d1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($d1->bl != '0'){echo "Rp. ".number_format($d1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($d1->pl != '0'){echo "Rp. ".number_format($d1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($d1_jumlah as $d1_jumlah) {
                                            echo "Rp. ".number_format($d1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($e1 as $e1) {?>
                                        <tr>
                                          <td align="center"><?php echo $e1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $e1->uraian ?></td>
                                          <td><?php if($e1->jumlah != '0'){echo "Rp. ".number_format($e1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($e1->rutin != '0'){echo "Rp. ".number_format($e1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($e1->pusat != '0'){echo "Rp. ".number_format($e1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($e1->prov != '0'){echo "Rp. ".number_format($e1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($e1->kota != '0'){echo "Rp. ".number_format($e1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($e1->bl != '0'){echo "Rp. ".number_format($e1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($e1->pl != '0'){echo "Rp. ".number_format($e1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($e1_jumlah as $e1_jumlah) {
                                            echo "Rp. ".number_format($e1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($f1 as $f1) {?>
                                        <tr>
                                          <td align="center"><?php echo $f1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $f1->uraian ?></td>
                                          <td><?php if($f1->jumlah != '0'){echo "Rp. ".number_format($f1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($f1->rutin != '0'){echo "Rp. ".number_format($f1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($f1->pusat != '0'){echo "Rp. ".number_format($f1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($f1->prov != '0'){echo "Rp. ".number_format($f1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($f1->kota != '0'){echo "Rp. ".number_format($f1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($f1->bl != '0'){echo "Rp. ".number_format($f1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($f1->pl != '0'){echo "Rp. ".number_format($f1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($f1_jumlah as $f1_jumlah) {
                                            echo "Rp. ".number_format($f1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($g1 as $g1) {?>
                                        <tr>
                                          <td align="center"><?php echo $g1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $g1->uraian ?></td>
                                          <td><?php if($g1->jumlah != '0'){echo "Rp. ".number_format($g1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($g1->rutin != '0'){echo "Rp. ".number_format($g1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($g1->pusat != '0'){echo "Rp. ".number_format($g1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($g1->prov != '0'){echo "Rp. ".number_format($g1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($g1->kota != '0'){echo "Rp. ".number_format($g1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($g1->bl != '0'){echo "Rp. ".number_format($g1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($g1->pl != '0'){echo "Rp. ".number_format($g1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($g1_jumlah as $g1_jumlah) {
                                            echo "Rp. ".number_format($g1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($h1 as $h1) {?>
                                        <tr>
                                          <td align="center"><?php echo $h1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $h1->uraian ?></td>
                                          <td><?php if($h1->jumlah != '0'){echo "Rp. ".number_format($h1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($h1->rutin != '0'){echo "Rp. ".number_format($h1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($h1->pusat != '0'){echo "Rp. ".number_format($h1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($h1->prov != '0'){echo "Rp. ".number_format($h1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($h1->kota != '0'){echo "Rp. ".number_format($h1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($h1->bl != '0'){echo "Rp. ".number_format($h1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($h1->pl != '0'){echo "Rp. ".number_format($h1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($h1_jumlah as $h1_jumlah) {
                                            echo "Rp. ".number_format($h1_jumlah->jum);
                                          } ?></b></td>
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
                                        <?php foreach ($i1 as $i1) {?>
                                        <tr>
                                          <td align="center"><?php echo $i1->kode_uraian ?></td>
                                          <td colspan="3"><?php echo $i1->uraian ?></td>
                                          <td><?php if($i1->jumlah != '0'){echo "Rp. ".number_format($i1->jumlah) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($i1->rutin != '0'){echo "Rp. ".number_format($i1->rutin) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($i1->pusat != '0'){echo "Rp. ".number_format($i1->pusat) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($i1->prov != '0'){echo "Rp. ".number_format($i1->prov) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($i1->kota != '0'){echo "Rp. ".number_format($i1->kota) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($i1->bl != '0'){echo "Rp. ".number_format($i1->bl) ; }else{echo " " ; }  ?></td>
                                          <td><?php if($i1->pl != '0'){echo "Rp. ".number_format($i1->pl) ; }else{echo " " ; }  ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                          <td></td>
                                          <td colspan="3" align="right">Jumlah</td>
                                          <td><b><?php foreach ($i1_jumlah as $i1_jumlah) {
                                            echo "Rp. ".number_format($i1_jumlah->jum);
                                          } ?></b></td>
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
                                          <td><b><?php foreach ($jumlah_penggunaan_dana as $jumlah_penggunaan_dana) {
                                            echo "Rp. ".number_format($jumlah_penggunaan_dana->jum);
                                          } ?></b></td>
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
                                          <td><b>
                                            <?php 
                                            foreach ($jumlah_penerimaan_dana as $jumlah_penerimaan_dana) {
                                              $hasil = $jumlah_penerimaan_dana->jum + $jumlah_penggunaan_dana->jum ;
                                              echo "Rp. ".number_format($hasil);               
                                            }

                                            ?>
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

                                   <div id="modal-rapbs" class="trigger-large">
                                    <table align="center" width="100%">
                                      <tr>
                                        <td align="center" colspan="12">RENCANA ANGGARAN PENDAPATAN BELANJA SEKOLAH</td>
                                       </tr>

                                      <tr>
                                          <?php foreach ($tampil_data_1_tahun_anggaran_uraian as $taun ) { ?>
                                          <td align="center" colspan="12">TAHUN PEMBELAJARAN&nbsp; <?php echo $taun->tahun ?> </td>
                                         <?php } ?>
                                       </tr>
                                       <tr>
                                         <td colspan="12">&nbsp;</td>
                                       </tr>

                                       <?php foreach ($data_sekolah as $b) { ?>
                                       <tr>
                                         <td width="10%" colspan="3">
                                           Nama Sekolah
                                         </td>
                                         <td colspan="7">
                                           : <?php echo $b->nama_sekolah ?>
                                         </td>
                                       </tr>
                                       
                                       <tr>
                                        <td width="10%" colspan="3">
                                         Desa/Kecamatan
                                       </td>
                                       <td colspan="7">
                                         : <?php echo $b->kel_des."/".$b->kecamatan ?>
                                       </td>
                                     </tr>

                                     <tr>
                                       <td width="10%" colspan="3">
                                         Kabupaten/Kota
                                       </td>
                                       <td  colspan="7">
                                         : <?php echo $b->kab_kota ?>
                                       </td>
                                     </tr>

                                     <tr width="10%" >
                                       <td colspan="3">
                                         Provinsi
                                       </td>
                                       <td colspan="7">
                                        : <?php echo $b->provinsi ?>
                                       </td>
                                     </tr>

                                     <?php } ?>
                                     <tr>
                                       <td colspan="12">&nbsp;</td>
                                     </tr>
                                        <table border="1">
                                             <tr align="center" border="1">
                                               <td colspan="6" width="50%" align="center">Penerimaan</td>
                                               <td colspan="6" width="50%" align="center">Pengeluaran</td>
                                             </tr>

                                             <tr align="center">
                                             <td width="5%">No.Urut</td>
                                             <td width="5%">No.Kode</td>
                                             <td width="30%" colspan="3">Uraian</td>
                                             <td>Jumlah</td>
                                             <td>No.Kode</td>
                                             <td colspan="2">Uraian</td>
                                             <td>Jumlah</td>
                                             </tr>

                                             <tr align="center">
                                               <td>1</td>
                                               <td>2</td>
                                               <td colspan="3">3</td>
                                               <td>4</td>
                                               <td>5</td>
                                               <td colspan="2">6</td>
                                               <td>7</td>
                                             </tr>

                                             <tr>
                                               <td align="center">I</td>
                                               <td align="center">1</td>
                                               <td colspan="3">SISA TAHUN LALU</td>
                                               <td><?php

                                               foreach ($sisa_dana as $sisa_dana1) {
                                               echo "Rp. ".number_format($sisa_dana1->jumlah,0,'',',') ;
                                                }

                                               ?></td>
                                               <td></td>
                                               <td colspan="2">Program Sekolah</td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td align="center">II</td>
                                               <td align="center">2</td>
                                               <td colspan="3">PENDAPATAN RUTIN</td>
                                               <td><?php

                                               foreach ($pendapatan_rutin as $pendapatan_rutin) {
                                               echo "Rp. ".number_format($pendapatan_rutin->jumlah,0,'',',') ;
                                                }

                                                ?></td>
                                               <td align="center">1</td>
                                               <td colspan="2"> Pengembangan Kompetensi Kelulusan</td>
                                               <td>
                                                 <?php
                                                 foreach ($b1_jumlah_1 as $b1_jumlah_1) {
                                                   echo "Rp. ".number_format($b1_jumlah_1->jum) ;
                                                 }
                                                 ?>
                                               </td>
                                             </tr>

                                             <tr>
                                               <td align="center">III</td>
                                               <td align="center">3</td>
                                               <td colspan="3">BANTUAN OPERASIONAL SEKOLAH</td>
                                               <td></td>
                                               <td align="center">2</td>
                                               <td colspan="2">Pengembangan Standar Isi</td>
                                               <td>
                                                 <?php
                                                 foreach ($c1_jumlah_1 as $c1_jumlah_1) {
                                                   echo "Rp. ".number_format($c1_jumlah_1->jum) ;
                                                 }
                                                 ?>
                                               </td>
                                             </tr>

                                             <tr>
                                               <td align="center"></td>
                                               <td align="center">3,1</td>
                                               <td colspan="3">BOS Pusat</td>
                                               <td><?php

                                               foreach ($bos_pusat as $bos_pusat) {
                                               echo "Rp. ".number_format($bos_pusat->jumlah,0,'',',') ;
                                                }

                                                ?></td>
                                               <td align="center">3</td>
                                               <td colspan="2">Pengembangan Standar Proses</td>
                                               <td>
                                                 <?php
                                                 foreach ($d1_jumlah_1 as $d1_jumlah_1) {
                                                   echo "Rp. ".number_format($d1_jumlah_1->jum) ;
                                                 }
                                                 ?>
                                               </td>
                                             </tr>

                                             <tr>
                                              <td align="center"></td>
                                              <td align="center">3,2</td>
                                              <td colspan="3">BPMU</td>
                                              <td><?php 

                                               foreach ($bos_provinsi as $bos_provinsi) {
                                               echo "Rp. ".number_format($bos_provinsi->jumlah,0,'',',') ;
                                                }
                                                
                                                ?></td>
                                              <td align="center">4</td>
                                              <td colspan="2">Pengembangan Pendidik dan Tenaga Kependidikan</td>
                                              <td><?php
                                                 foreach ($e1_jumlah_1 as $e1_jumlah_1) {
                                                   echo "Rp. ".number_format($e1_jumlah_1->jum) ;
                                                 }
                                                 ?></td>
                                             </tr>

                                             <tr>
                                               <td align="center"></td>
                                               <td align="center">3,3</td>
                                               <td colspan="3">BOS KAbupaten/Kota</td>
                                               <td><?php 

                                               foreach ($bos_kota as $bos_kota) {
                                               echo "Rp. ".number_format($bos_kota->jumlah,0,'',',') ;
                                                }
                                                
                                                 ?></td>
                                               <td align="center">5</td>
                                               <td colspan="2">Pengembangan Sarana dan Prasarana Sekolah</td>
                                               <td><?php
                                                 foreach ($f1_jumlah_1 as $f1_jumlah_1) {
                                                   echo "Rp. ".number_format($f1_jumlah_1->jum) ;
                                                 }
                                                 ?></td>
                                             </tr>

                                             <tr>
                                               <td align="center">IV</td>
                                               <td align="center">4</td>
                                               <td colspan="3">BANTUAN</td>
                                               <td></td>
                                               <td align="center">6</td>
                                               <td colspan="2">Pengembangan Standar Pengelolaan</td>
                                               <td><?php
                                                 foreach ($g1_jumlah_1 as $g1_jumlah_1) {
                                                   echo "Rp. ".number_format($g1_jumlah_1->jum) ;
                                                 }
                                                 ?>
                                               </td>
                                             </tr>

                                             <tr>
                                               <td></td>
                                               <td align="center">4,1</td>
                                               <td colspan="3">Dana Dekonsentrasi</td>
                                               <td></td>
                                               <td align="center">7</td>
                                               <td colspan="2">Pengembangan Standar Pembiayaan</td>
                                               <td>
                                                 <?php
                                                 foreach ($h1_jumlah_1 as $h1_jumlah_1) {
                                                   echo "Rp. ".number_format($h1_jumlah_1->jum) ;
                                                 }
                                                 ?>
                                               </td>
                                             </tr>

                                             <tr>
                                               <td></td>
                                               <td align="center">4,2</td>
                                               <td colspan="3">Dana Tugas Pembantuan</td>
                                               <td><?php echo "" ?></td>
                                               <td align="center">8</td>
                                               <td colspan="2">Pengembangan dan Implementasi Sistem Penilaian</td>
                                               <td>
                                                 <?php
                                                 foreach ($i1_jumlah_1 as $i1_jumlah_1) {
                                                   echo "Rp. ".number_format($i1_jumlah_1->jum) ;
                                                 }
                                                 ?>
                                               </td>
                                             </tr>

                                             <tr>
                                               <td></td>
                                               <td align="center">4,3</td>
                                               <td colspan="3">Dana Alokasi Khusus</td>
                                               <td><?php echo "" ?></td>
                                               <td></td>
                                               <td colspan="2"></td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td></td>
                                               <td align="center">4,4</td>
                                               <td colspan="3">Bantuan lain</td>
                                               <td><?php 

                                               foreach ($bl as $bl) {
                                               echo "Rp. ".number_format($bl->jumlah,0,'',',') ;
                                                }
                                                
                                                 ?></td>
                                               <td></td>
                                               <td colspan="2"></td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td align="center">V</td>
                                               <td align="center">5</td>
                                               <td colspan="3">SUMBER PENDAPATAN LAINYA</td>
                                               <td></td>
                                               <td></td>
                                               <td colspan="2"></td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td></td>
                                               <td align="center">5,1</td>
                                               <td colspan="3">Pendapatan Lainnya </td>
                                               <td><?php 

                                               foreach ($pl as $pl) {
                                               echo "Rp. ".number_format($pl->jumlah,0,'',',') ;
                                                }

                                                 ?></td>
                                               <td></td>
                                               <td colspan="2"></td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td></td>
                                               <td align="center">5,2</td>
                                               <td colspan="3"></td>
                                               <td></td>
                                               <td></td>
                                               <td colspan="2"></td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td>&nbsp;</td>
                                               <td></td>
                                               <td colspan="3"></td>
                                               <td></td>
                                               <td></td>
                                               <td colspan="2"></td>
                                               <td></td>
                                             </tr>

                                             <tr>
                                               <td colspan="5" align="center">JUMLAH PENERIMAAN</td>
                                               <td>
                                              <?php

                                              foreach ($jumlah_penerimaan_dana_rapbs as $hasil_penerimaan) {
                                                        echo "Rp. ".number_format($hasil_penerimaan->jum);               
                                                      }

                                               ?></td>
                                               <td colspan="3" align="center">JUMLAH PENGELUARAN</td>
                                               <td>
                                                 <?php

                                              foreach ($jumlah_penggunaan_dana_rapbs as $hasil_penerimaan_1) {
                                                        echo "Rp. ".number_format($hasil_penerimaan_1->jum);               
                                                      }

                                               ?>
                                               </td>
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
$(document).ready(function() {
    $('#book-table').DataTable();
});
$(document).on('click', '.trigger-largeContent', function (event) {
    event.preventDefault();
    $('#modal-Large').iziModal('open', this); // Do not forget the "this"
}); 
$(document).on('click', '.trigger-largeContent', function (event) {
    event.preventDefault();
    $('#modal-rapbs').iziModal('open', this); // Do not forget the "this"
});
$("#modal-Large").iziModal({
    title: 'A random title',
    subtitle: 'For a random text',
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
$("#modal-rapbs").iziModal({
    title: 'A random title',
    subtitle: 'For a random text',
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
</body>>

</html>