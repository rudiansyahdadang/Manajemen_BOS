<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('conn/head.php') ?>
<!-- select -->

  <link rel="stylesheet" href="<?php echo base_url() ; ?>asset/select/docsupport/prism.css">
  <link rel="stylesheet" href="<?php echo base_url() ; ?>asset/select/chosen.css">
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
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
             <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Perbaharui Pemasukan</h4>
                      <p class="card-description">

                      </p>
                      <br>
                      <form class="forms-sample" action="<?php echo base_url() ?>buku_kas/aksi_perbaharui" method="POST" name="sumber">
                         <?php
                         $id_buku_kas = json_decode(json_encode($perbaharui), True);
                             foreach ($id_buku_kas as $id_buku_kas) { ?>
                               <input type="hidden" name="id_buku_kas" value="<?php echo $id_buku_kas['id_buku_kas'] ?>">
                            <?php } ?>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Kode Uraian</label>
                          <div class="col-sm-9">
                            
                            <select data-placeholder="Pilih Kategori Dana" class="chosen-select" tabindex="2" name="id_uraian">
                              <?php 
                              $array_id_uraian = json_decode(json_encode($perbaharui), True);
                              // var_dump($perbaharui);die();
                                foreach ($array_id_uraian as $id_uraian) { ?>
                                <option value="<?php echo $id_uraian['id_uraian'] ?>"><?php echo $id_uraian['uraian'] ?></option>

                                <?php } 
                              foreach ($tampil_data_uraian_pemasukan as $a1) { ?>
                              <option value="<?php echo $a1->id_uraian ?>"><?php echo $a1->uraian ?></option>
                              
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tahun Anggaran</label>
                          <div class="col-sm-9">
                            <select data-placeholder="Pilih Tahun Anggaran" class="chosen-select" tabindex="2" name="id_tahun">
                              <?php 
                              $array_id_tahun = json_decode(json_encode($perbaharui), True);
                                foreach ($array_id_tahun as $id_tahun) { ?>
                                  <option value="<?php echo $id_tahun['id_tahun'] ?>"><?php echo $id_tahun['tahun'] ?></option>
                                <?php }
                               foreach ($tampil_data_tahun_anggaran as $a ) { ?>
                              <option value="<?php echo $a->id_tahun ?>"><?php echo $a->tahun ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal</label>
                          <div class="col-sm-9">
                            <?php $array_tgl = json_decode(json_encode($perbaharui), True);
                                foreach ($array_tgl as $tgl) { ?>
                            <input type="date" class="form-control" name="tgl" value="<?php echo $tgl['tgl'] ?>">
                            <?php } ?>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Kode</label>
                          <div class="col-sm-9">
                            <select data-placeholder="Pilih Kode Uraian" class="chosen-select" tabindex="2" name="no_kode">
                              <?php 
                              $array_no_kode = json_decode(json_encode($perbaharui), True);
                                foreach ($array_no_kode as $no_kode) { ?>
                                  <option value="<?php echo $no_kode['id_uraian'] ?>"><?php echo $no_kode['kode_uraian']." ".$no_kode['uraian'] ?></option>
                                 <?php } ?>
                              <?php foreach ($tampil_data_uraian_pengeluaran as $b ) { ?>
                              <option value="<?php echo $b->id_uraian ?>"><?php echo $b->kode_uraian." ".$b->uraian ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Bukti</label>
                          <div class="col-sm-9">
                            <?php 
                              $array_no_bukti = json_decode(json_encode($perbaharui), True);
                                foreach ($array_no_bukti as $no_bukti) { ?>
                            <input type="text" class="form-control" placeholder="Masukan Nomor Kode" name="no_bukti" value="<?php echo $no_bukti['no_bukti'] ?>">
                            <?php } ?>
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Uraian</label>
                          <div class="col-sm-9">
                            <?php 
                              $array_4_uraian = json_decode(json_encode($perbaharui), True);
                                foreach ($array_4_uraian as $uraian4) { ?>
                                   <input type="text" class="form-control" id="uraian" placeholder="Masukan Uraian Secara Lengkap" name="uraian" value="<?php echo $uraian4['4_uraian'] ?>">
                                <?php } ?>
                          </div>
                        </div>
                        <input type="hidden" name="pengeluaran_dana" value="0">
                         <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Dana yang masuk</label>
                          <div class="col-sm-9">
                            <?php 
                              $array_pemasukan = json_decode(json_encode($perbaharui), True);
                                foreach ($array_pemasukan as $pemasukan) { ?>
                                    <input type="number" class="form-control" id="uraian" placeholder="Masukan Dana yang masuk" name="pemasukan_dana" value="<?php echo $pemasukan['pemasukan_dana'] ?>">
                                <?php } ?>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sumber Dana</label>
                          <div class="col-sm-9">
                            <?php 
                              $array_sumber_tujuan= json_decode(json_encode($perbaharui), True);
                                foreach ($array_sumber_tujuan as $sumber_tujuan) { ?>
                                  <input type="text" class="form-control" id="uraian" placeholder="Masukan Nama Uraian Secara Lengkap" name="sumber_tujuan" value="<?php echo $sumber_tujuan['sumber_tujuan'] ?>">
                                <?php } ?>
                          </div>
                        </div>

                        
                                                
                        <button type="submit" id="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                        <a href="<?php echo base_url() ?>buku_kas/tunai" class="btn btn-light">Cancel</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>

<!--           KONTEN UNTAMA -->

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
</body>
  <script src="<?php echo base_url() ; ?>asset/select/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ; ?>asset/select/chosen.jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ; ?>asset/select/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php echo base_url() ; ?>asset/select/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$( function() {
    $( "#datepicker" ).datepicker();
  } );
// function startCalc(){
//   interval = setInterval("calc()",1);
// }

// function calc(){
//     var rutin = parseInt(document.sumber.rutin.value);
//     var pusat = parseInt(document.sumber.pusat.value);
//     var prov  = parseInt(document.sumber.prov.value);
//     var kota  = parseInt(document.sumber.kota.value);
//     var bl    = parseInt(document.sumber.bl.value);
//     var pl    = parseInt(document.sumber.pl.value);

//   document.sumber.jumlah.value = rutin + pusat + prov + kota + bl + pl;
// }

// function stopCalc(){
//   clearInterval(interval);
// }

// function check() {
//     var rutin = parseInt(document.getElementById('rutin').value);
//     var pusat = parseInt(document.getElementById('pusat').value);
//     var prov = parseInt(document.getElementById('prov').value) ;
//     var kota = parseInt(document.getElementById('kota').value) ;
//     var bl = parseInt(document.getElementById('bl').value) ;
//     var pl = parseInt(document.getElementById('pl').value) ;
//       jumlah  = pusat + prov + kota + bl + pl;
//   if(document.getElementById('jumlah').value != jumlah)
//   {
//     document.getElementById("submit").disabled = true;
//      document.getElementById('message').innerHTML = 'Sumber Dana Belum Sesuai';
//      document.getElementById('message2').innerHTML = document.getElementById('jumlah').value - (pusat + prov + kota + bl + pl) ;

//   }else{
//     document.getElementById('message').innerHTML = 'Sumber Dana Sudah Sesuai';
//     document.getElementById("submit").disabled = false;
//   }
//}
</script>
</html>
