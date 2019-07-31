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

              <div class="col-6 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Perbaharui Pengguna</h4>
                      <p class="card-description">
                       
                      </p>
                      <br>
                      <?php foreach ($ambildata as $a) { ?>
                      <form class="forms-sample" action="<?php echo base_url() ?>pengguna/aksi_perbaharui" method="POST">
                        <input type="hidden" name="id" value="<?php echo $a->id ?>">
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Masukan Nama Lengkap" name="nama_lengkap" value="<?php echo $a->nama_lengkap ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Pengguna</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Masukan Nama Pengguna" name="nama_pengguna" value="<?php echo $a->nama_pengguna ?>"  required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Masukan Alamat Email" name="email" value="<?php echo $a->email ?>"  required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Masukan Alamat Lengkap" name="alamat" value="<?php echo $a->alamat ?>"  required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Masukan Ketrangan Pengguna" name="keterangan" value="<?php echo $a->keterangan ?>"  required>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <a href="<?php echo base_url() ?>pengguna" class="btn btn-light">Cancel</a>
                      </form>
                      <?php } ?>
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

</html>