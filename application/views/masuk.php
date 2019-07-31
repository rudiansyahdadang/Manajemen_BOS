<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap-4 Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url() ; ?>asset/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ; ?>asset/node_modules/simple-line-icons/css/simple-line-icons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url() ; ?>asset/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url() ; ?>asset/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth login-full-bg">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-dark text-left p-5">
              <h2>Masuk</h2>
              <h4 class="font-weight-light">Selamat Datang di <b>Aplikasi Pelaporan Dana BOS</b></h4>
              <form class="pt-5" action="<?php echo base_url() ; ?>masuk/aksi_masuk/" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pengguna</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Pengguna disini" name="nama_pengguna">
                    <i class="mdi mdi-account"></i>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kata Sandi</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Kata Sandi disini" name="kata_sandi">
                    <i class="mdi mdi-eye"></i>
                  </div>
                  <div class="mt-5">
                    <button class="btn btn-block btn-warning btn-lg font-weight-medium" type="submit">Masuk</button>
                  </div>
                  <div class="mt-3 text-center">
                    <a href="#" class="auth-link text-white">Lupa Kata Sandi?</a>
                  </div>                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url() ; ?>asset/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url() ; ?>asset/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url() ; ?>asset/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url() ; ?>asset/js/off-canvas.js"></script>
  <script src="<?php echo base_url() ; ?>asset/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
