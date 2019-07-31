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
                  <h4 class="card-title">Buku Pajak &nbsp;&nbsp; <a href="<?php echo base_url(); ?>buku_kas/tambah_pemasukan" class="btn btn-success btn-rounded btn-fw">Tambah Pemasukan Dana</a><a href="<?php echo base_url(); ?>buku_kas/tambah_pengeluaran" class="btn btn-danger btn-rounded btn-fw">Tambah Pengeluaran Dana</a></h4>
                   <form action="<?php echo base_url() ?>/buku_kas/laporan_pajak" method="POST">
                      <select data-placeholder="Pilih bulan" class="chosen-select" tabindex="2" name="bulan">
                              <option value="01">Januari</option>
                                  <option value="02">Februari</option>
                                  <option value="03">Maret</option>
                                  <option value="04">April</option>
                                  <option value="05">Mei</option>
                                  <option value="06">Juni</option>
                                  <option value="07">Juli</option>
                                  <option value="08">Agustus</option>
                                  <option value="09">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="12">November</option>
                                  <option value="12">Desember</option>
                            </select>
                      <button type="submit" class="btn btn-primary btn-rounded btn-fw" >Pilih bulan</button> 
                    </form>
                    <a href="#" class="btn btn-success btn-rounded btn-fw" data-izimodal-open="#modal-Large" data-izimodal-transitionin="fadeInDown">Lihat Buku Kas Tunai</a>
                    <a target="_blank" href="<?php echo base_url().'laporankaspajak_all/cetak/'?>" class="btn btn-success btn-rounded btn-fw">Cetak Buku Pajak (All)</a>
                  <!-- <p class="card-description">
                    Add class <code>.table-hover</code>
                  </p> -->
                  <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>No. Kode</th>
                        <th>No. Bukti</th>
                        <th>Uraian</th>
                        <th width="15%">Penerimaan</th>
                        <th width="15%">Pengeluaran</th>
                        <th width="20%">Saldo</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no = 1;
                    $saldo = 0;
                    foreach ($tampil_data_4_buku_kas as $a) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?> </td>
                        <td><?php echo $a->tgl ?> </td>
                        <td><?php echo $a->kode_uraian ?> </td>
                        <td><?php echo $a->no_bukti ?> </td>
                        <td><?php echo $a->uraian ?> </td>
                        <td><?php if ($a->pemasukan_dana != '0') { echo "Rp. ".number_format($a->pemasukan_dana) ; }else{echo "" ; } ?> </td>
                        <td><?php if ($a->pengeluaran_dana != '0') { echo "Rp. ".number_format($a->pengeluaran_dana) ; }else{echo "" ; } ?> </td>
                        <td>
                          <?php  
                            $saldo = ($saldo + $a->pemasukan_dana) - $a->pengeluaran_dana ;

                            echo "Rp. ".number_format($saldo) ;
                          ?>
                        </td>
                        <td valign="middle"><a href="<?php echo base_url()."buku_kas/hapus_dana/".$a->id_buku_kas ?>" class="badge badge-danger mx-auto mt-3">Hapus</a> 
                          <?php if ($a->pemasukan_dana != '0'){ ?>
                            <a href="<?php echo base_url()."buku_kas/perbaharui_pemasukan_dana/".$a->id_buku_kas ?>" class="badge badge-teal mx-auto mt-3">Perbaharui</a>
                          <?php }else{ ?>
                            <a href="<?php echo base_url()."buku_kas/perbaharui_pengeluaran_dana/".$a->id_buku_kas ?>" class="badge badge-teal mx-auto mt-3">Perbaharui</a>
                          <?php }?>
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