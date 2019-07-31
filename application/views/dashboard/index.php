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
          
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Total Penerimaan Dana</p>
                      <div class="fluid-container">
                        <?php foreach ($total_penerimaan_dana as $a) { ?>
                        <h3 class="card-title font-weight-bold text-right mb-0"><?php echo "Rp. ".number_format($a->jum) ; ?></h3>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">Jumlah Dana diterima Secara Keseluruhan
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Dana Terrealisasi</p>
                      <div class="fluid-container">
                        <?php foreach ($total_dana_terealisasi as $b) { ?>
                        <h3 class="card-title font-weight-bold text-right mb-0"><?php echo "Rp. ".number_format($b->jum) ; ?></h3>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Dana yang sudah dibelanjakan
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Sisa Dana</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0"><?php echo "Rp. ".number_format($a->jum - $b->jum) ; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Dana yang tersisa
                    
                  </p>
                </div>
              </div>
            </div>
           <!--  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-right">Employees</p>
                      <div class="fluid-container">
                        <h3 class="card-title font-weight-bold text-right mb-0">246</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                  </p>
                </div>
              </div>
            </div> -->
          </div>

          
          <div class="row">
           
          </div>
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