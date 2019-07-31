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
                  <h4 class="card-title">Daftar Tahun Anggaran &nbsp;&nbsp; <a href="<?php echo base_url(); ?>rkas_new/tambah_tahun" class="btn btn-primary btn-rounded btn-fw">Tambah Tahun Anggaran</a></h4>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun Anggaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($tahun_anggaran as $a) 
                      { 
                        ?>
                      <tr>
                        <td><?php echo $a->id_tahun ?></td>
                        <td><?php echo $a->tahun ?></td>
                        <td><?php if($a->status != '0'){ echo "Aktif";}else{echo "Tidak Aktif"; } ?></td>
                        <td>
                          <?php if ($a->status == '0' ) { ?>
                            <a href="<?php echo base_url()."rkas_new/aktifkan_tahun/".$a->id_tahun ?>" class="badge badge-success mx-auto mt-3">Aktifkan </a>
                          <?php }else{ echo ""; } ?>
                        </td>
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