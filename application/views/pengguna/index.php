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
                  <h4 class="card-title">Daftar Pengguna &nbsp;&nbsp; <a href="<?php echo base_url(); ?>pengguna/tambah_pengguna" class="btn btn-primary btn-rounded btn-fw">Tambah Pengguna</a></h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Kata Sandi</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Alamat</th>                        
                        <th>Keterangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no = 1;
                    foreach ($baca_db as $a) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?> </td>
                        <td><?php echo $a->nama_pengguna ?></td>
                        <td><a href="<?php echo base_url()."pengguna/perbaharui_kata_sandi/".$a->id ?>" class="badge badge-teal mx-auto mt-3">Perbaharui Kata Sandi</a></td>
                        <td><?php echo $a->nama_lengkap ?></td>
                        <td><?php echo $a->email ?></td>
                        <td><?php echo $a->alamat ?></td>
                        <td><?php echo $a->keterangan ?></td>
                        <td valign="middle"><a href="<?php echo base_url()."pengguna/hapus_pengguna/".$a->id ?>" class="badge badge-danger mx-auto mt-3">Hapus</a> <a href="<?php echo base_url()."pengguna/perbaharui_pengguna/".$a->id ?>" class="badge badge-teal mx-auto mt-3">Perbaharui</a></td>
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