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
                      <h4 class="card-title">Tambah Sumber Dana</h4>
                      <p class="card-description">

                      </p>
                      <br>
                      <form class="forms-sample" action="<?php echo base_url() ?>rkas_new/aksi_perbaharui_sumber_dana" method="POST" name="sumber">
                        <?php foreach ($id_uraian as $a ) { ?>
                        <input type="hidden" name="id_uraian" value="<?php echo $a->id_uraian ?>">
                        <!-- <input type="hidden" name="id_tahun" value="<?php echo $a->id_tahun ?>"> -->
                        
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Rutin</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="rutin" placeholder="Sumber Dana Rutin" name="rutin" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $a->rutin ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Pusat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="pusat" placeholder="Sumber Dana BOS Pusat" name="pusat" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $a->pusat ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Provinsi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="prov" placeholder="Sumber Dana BOS Provinsi" name="prov"  onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $a->prov ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Kab/Kota</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="kota" placeholder="Sumber Dana BOS Kab/Kota" name="kota" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $a->kota ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Bantuan Lain</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="bl" placeholder="Sumber Dana Bantuan Lainnya" name="bl" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $a->bl ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Pendapatan Lainnya</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="pl" placeholder="Sumber Dana Pendapatan Lainnya" name="pl" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $a->pl ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Jumlah</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="jumlah" placeholder="Hasil" name="jumlah" readonly>
                          </div>
                        </div>
                                                
                        <button type="submit" id="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                        <a href="<?php echo base_url() ?>rkas_new/uraian" class="btn btn-light">Cancel</a>
                        <?php } ?>
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

function startCalc(){
  interval = setInterval("calc()",1);
}

function calc(){
    var rutin = parseInt(document.sumber.rutin.value);
    var pusat = parseInt(document.sumber.pusat.value);
    var prov  = parseInt(document.sumber.prov.value);
    var kota  = parseInt(document.sumber.kota.value);
    var bl    = parseInt(document.sumber.bl.value);
    var pl    = parseInt(document.sumber.pl.value);

  document.sumber.jumlah.value = rutin + pusat + prov + kota + bl + pl;
}

function stopCalc(){
  clearInterval(interval);
}

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
