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
                      <h4 class="card-title">Tambah Pengguna Baru</h4>
                      <p class="card-description">
                       
                      </p>
                      <br>
                      <?php foreach ($ambildata as $a ) { ?>
                      <form class="forms-sample" action="<?php echo base_url() ?>data_sekolah/aksi_data_sekolah" method="POST">
                        <input type="hidden" name="id" value="<?php echo $a->id ?>">
                        <div class="form-group row">
                          <label for="nama_sekolah" class="col-sm-3 col-form-label">Nama Sekolah</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_sekolah" placeholder="Masukan Nama Sekolah" name="nama_sekolah" value="<?php echo $a->nama_sekolah ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat_lengkap" placeholder="Masukan Alamat Lengkap" name="alamat_lengkap" value="<?php echo $a->alamat_lengkap ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="kel_des" class="col-sm-3 col-form-label">Kelurahan/Desa</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="kel_des" placeholder="Masukan Nama Kelurahan/Desa" name="kel_des" value="<?php echo $a->kel_des ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="kecamatan" placeholder="Masukan Nama Kecamatan" name="kecamatan" value="<?php echo $a->kecamatan ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="provinsi" placeholder="Masukan Nama Provinsi" name="provinsi" value="<?php echo $a->provinsi ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nama_ketua_yayasan" class="col-sm-3 col-form-label">Nama Ketua Yayasan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ketua_yayasan" placeholder="Masukan Nama Ketua Yayasan" name="nama_ketua_yayasan" value="<?php echo $a->nama_ketua_yayasan ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nama_komite_sekolah" class="col-sm-3 col-form-label">Nama Komite Sekolah</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_komite_sekolah" placeholder="Masukan Nama Komite Sekolah" name="nama_komite_sekolah" value="<?php echo $a->nama_komite_sekolah ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nama_kepala_sekolah" class="col-sm-3 col-form-label">Nama Kepala Sekolah</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_kepala_sekolah" placeholder="Masukan Nama Kepala Sekolah" name="nama_kepala_sekolah" value="<?php echo $a->nama_kepala_sekolah ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="nama_kepala_tu" class="col-sm-3 col-form-label">Nama Kepala TU</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_kepala_tu" placeholder="Masukan Nama Kepala TU" name="nama_kepala_tu" value="<?php echo $a->nama_kepala_tu ?>" required>
                          </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                        <a href="<?php echo base_url() ?>/pengguna" class="btn btn-light">Cancel</a>
                      </form>
                      <?php } ?>
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
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('cekpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Kata Sandi Sama';
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Kata Sandi Berbeda';
    document.getElementById("submit").disabled = true;
  }
}
</script>
</html>