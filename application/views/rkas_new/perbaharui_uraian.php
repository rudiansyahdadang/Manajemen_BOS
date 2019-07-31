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
            <div class="col-md-6 d-flex align-items-stretch grid-margin">
             <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Rencana Anggaran Pengembagan Standar Isi</h4>
                      <p class="card-description">
                        <?php foreach ($perbaharui_uraian as $a ) {?>
                      </p>
                      <br>
                      <form class="forms-sample" action="<?php echo base_url() ?>rkas_new/aksi_tambah_uraian" method="POST" name="sumber">
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Kode Uraian</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="rutin" placeholder="Masukan Kode Uraian" name="kode_uraian" value="<?php echo $a->kode_uraian ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Uraian</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="uraian" placeholder="Masukan Nama Uraian Secara Lengkap" name="uraian" value="<?php echo $a->uraian ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tahun Anggaran</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="id_tahun" >
                              <?php foreach ($tahun_anggaran as $b ) { ?>
                              <option value="<?php echo $a->id_tahun ?>"><?php echo $b->tahun ?></option>
                              <option value="<?php echo $b->id_tahun ?>"><?php echo $b->tahun ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <?php } ?>
                                                
                        <button type="submit" id="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                        <a href="<?php echo base_url() ?>rkas_new/uraian" class="btn btn-light">Cancel</a>
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
<script type="text/javascript">

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
