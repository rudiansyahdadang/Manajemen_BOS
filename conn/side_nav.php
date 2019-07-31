 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="<?php echo base_url() ; ?>asset/images/faces/dikmen.png" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?php echo $nama_lengkap ?></p>
                <p class="designation"><?php echo $email ?></p>
                <a class="badge badge-teal mx-auto mt-3" href="<?php echo base_url() ?>masuk/keluar">Keluar</a>
              </div>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> &nbsp;&nbsp;<span class="menu-title">Dashboard</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ; ?>Pengguna"><i class="fa fa-address-book"></i> &nbsp;&nbsp;<span class="menu-title">Manajemen Pengguna</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url() ; ?>data_sekolah"><i class="fa fa-bank"></i> &nbsp;&nbsp;<span class="menu-title">Data Sekolah</span></a></li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#rkas_new" aria-expanded="false" aria-controls="general-pages"><i class="fa fa-address-book"></i> &nbsp;&nbsp;<span class="menu-title">RKAS</span><i class="menu-arrow"></i></a>
            <div class="collapse" id="rkas_new">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>rkas_new/tahun_anggaran">Tahun Anggaran</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>rkas_new/uraian">Uraian</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>buku_kas/tunai">Buku Kas Tunai</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>buku_kas/umum">Buku Kas Umum</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>buku_kas/bank">Buku Bank</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>buku_kas/pajak">Buku Pembantu Pajak</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ; ?>buku_kas/realisasi">Realisasi Anggaran</a></li>
              </ul>
            </div>
          </li>
          
          
        </ul>
      </nav>