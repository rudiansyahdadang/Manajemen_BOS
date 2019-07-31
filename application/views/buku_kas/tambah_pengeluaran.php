<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('conn/head.php') ?>
<!-- select -->
  <link rel="stylesheet" href="<?php echo base_url() ; ?>asset/select/docsupport/style.css">
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
                      <h4 class="card-title">Tambah Pengeluaran</h4>
                      <p class="card-description">

                      </p>
                      <br>
                      <form class="forms-sample" action="<?php echo base_url() ?>buku_kas/aksi_tambah_pengeluaran" method="POST" name="sumber">
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Kode Uraian</label>
                          <div class="col-sm-9">
                            <select data-placeholder="Pilih Kategori Dana" class="chosen-select" tabindex="2" name="id_uraian">
                              <option value=""></option>
                              <?php foreach ($tampil_data_uraian_pengeluaran as $a1) { ?>
                              <option value="<?php echo $a1->id_uraian ?>"><?php echo $a1->uraian ?></option>
                              
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tahun Anggaran</label>
                          <div class="col-sm-9">
                            <select data-placeholder="Pilih Tahun Anggaran" class="chosen-select" tabindex="2" name="id_tahun">
                              <option value=""></option>
                              <?php foreach ($tampil_data_tahun_anggaran as $a ) { ?>
                              <option value="<?php echo $a->id_tahun ?>"><?php echo $a->tahun ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgl" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Kode</label>
                          <div class="col-sm-9">
                            <select data-placeholder="Pilih Kode Uraian" class="chosen-select" tabindex="2" name="no_kode">
                              <option value=""></option>
                              <?php foreach ($tampil_data_uraian_pengeluaran as $b ) { ?>
                              <option value="<?php echo $b->id_uraian ?>"><?php echo $b->kode_uraian." ".$b->uraian ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">No. Bukti</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Masukan Nomor Kode" name="no_bukti">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Uraian</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="uraian" placeholder="Masukan Nama Uraian Secara Lengkap" name="uraian">
                          </div>
                        </div>
                        <input type="hidden" name="pemasukan_dana" value="0">
                         <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Dana yang Dikeluarkan</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" id="uraian" placeholder="Masukan Nama Uraian Secara Lengkap" name="pengeluaran_dana">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tujuan Dana</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="uraian" placeholder="Masukan Nama Uraian Secara Lengkap" name="sumber_tujuan">
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
