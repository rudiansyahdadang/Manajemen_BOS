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
                      <form class="forms-sample" action="<?php echo base_url() ?>pengguna/aksi_tambah_pengguna" method="POST">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Masukan Nama Lengkap" name="nama_lengkap" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Pengguna</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Masukan Nama Pengguna" name="nama_pengguna" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label">Masukan Kata Sandi </label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi" name="kata_sandi" onkeyup='check();'  required>
                          </div>
                          <label for="cekpassword" class="col-sm-3 col-form-label">Ulangi Kata Sandi</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="cekpassword" placeholder="Ulangi Kata Sandi" name="kata_sandi" onkeyup='check();'  required>
                          </div>
                          &nbsp;&nbsp;&nbsp;<span id='message'></span>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Masukan Alamat Email" name="email" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Masukan Alamat Lengkap" name="alamat" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Masukan Ketrangan Pengguna" name="keterangan" required>
                          </div>
                        </div>
                        <button type="submit" id="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-danger mr-2">Bersihkan</button>
                        <a href="<?php echo base_url() ?>/pengguna" class="btn btn-light">Cancel</a>
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