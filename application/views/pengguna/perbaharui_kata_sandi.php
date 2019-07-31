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
                      <h4 class="card-title">Perbaharui Kata Sandi</h4>
                      <p class="card-description">
                       
                      </p>
                      <br>
                      <?php foreach ($ambildata as $a) { ?>
                      <form class="forms-sample" action="<?php echo base_url() ?>pengguna/aksi_perbaharui_kata_sandi" method="POST">
                        <input type="hidden" name="id" value="<?php echo $a->id ?>">
                        <div class="form-group row">
                          <label for="password" class="col-sm-3 col-form-label">Masukan Kata Sandi Baru </label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi Baru disni"  onkeyup='check();' required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="cekpassword" class="col-sm-3 col-form-label">Masukan Lagi Kata Sandi</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="cekpassword" placeholder="Masukan lagi disini" name="kata_sandi"  onkeyup='check();' required>
                          </div>
                          &nbsp;&nbsp;&nbsp;<span id='message'></span>
                        </div>

                        <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
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
<script>
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