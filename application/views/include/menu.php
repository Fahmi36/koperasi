<?php if ($this->uri->segment(1) != 'cetak_simpanan') { ?>
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li>
                                <a href="<?php echo site_url(''); ?>">Home</a>
                            </li>
                            <li class="<?php if($this->uri->segment(1)=="simpanan"){echo "active";}?>">
                                <a href="<?php echo site_url('simpanan'); ?>">Simpanan</a>
                            </li>
                            <li class="<?php if($this->uri->segment(1)=="pinjaman"){echo "active";}else if($this->uri->segment(1)=="bayar"){echo "active";} ?>">
                                <a data-toggle="collapse" data-target="#demoevent" href="#">Pinjaman</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <?php if ($this->session->userdata('username') == null): ?>
                                        <li><a href="<?php echo site_url('pinjaman'); ?>">Permohonan Pinjaman</a></li>
                                    <?php endif ?>
                                    <li><a href="<?php echo site_url('bayar/pinjaman'); ?>">Data Pinjaman</a></li>
                                </ul>
                            </li>
                            <?php if ($this->session->userdata('username') != null): ?>
                                <li class="<?php if($this->uri->segment(1)=="new_user"){echo "active";}?>">
                                    <a href="<?php echo site_url('new_user'); ?>">Data Pendaftar Baru</a>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="data_pinjam"){echo "active";}?>">
                                    <a data-toggle="collapse" data-target="#databayar" href="#">Data Pembayaran</a>
                                    <ul id="databayar" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo site_url('data_simpan'); ?>">Pembayaran Simpanan</a></li>
                                        <li><a href="<?php echo site_url('data_pinjam'); ?>">Pembayaran Pinjaman</a></li>
                                    </ul>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="report"){echo "active";}?>">
                                    <a data-toggle="collapse" data-target="#datareporthp" href="#">Data Pembayaran</a>
                                    <ul id="datareporthp" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo site_url('report'); ?>">Total Simpanan Anggota</a></li>
                                        <li><a href="<?php echo site_url('report/simpan'); ?>">Rekap Simpanan Perbulan</a></li>
                                        <li><a href="<?php echo site_url('report/user'); ?>">Rekap Daftar Anggota Baru Perbulan</a></li>
                                    </ul>
                                </li>

                            <?php endif ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!--         <?php if ($this->session->userdata('no_rek') == null){ ?>
            <div class="alert-list" style="margin-bottom: 20px;">
                <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert" style="background: linear-gradient(to bottom left, #ee5253 40%, #ff7675 100%);">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Silahkan masukan nomor Rekening Bank DKI Anda <a href="" class="alert-link">Disini!</a>
                </div>
            </div>
        <?php } ?> -->
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="<?php if($this->uri->segment(1)==""){echo "active";}?>"><a href="<?php echo site_url(''); ?>"><i class="notika-icon notika-house"></i> Beranda</a></li>
                    <li class="<?php if($this->uri->segment(1)=="simpanan"){echo "active";}?>"><a href="<?php echo site_url('simpanan'); ?>"><i class="notika-icon notika-dollar"></i> Simpanan</a></li>
                    <li class="<?php if($this->uri->segment(1)=="pinjaman"){echo "active";}else if($this->uri->segment(1)=="bayar"){echo "active";} ?>"><a data-toggle="tab" href="#pinjaman"><i class="notika-icon notika-credit-card"></i> Pinjaman</a></li>
                    <?php if ($this->session->userdata('username') != null): ?>
                        <li class="<?php if($this->uri->segment(1)=="new_user"){echo "active";}?>"><a href="<?php echo site_url('new_user'); ?>"><i class="notika-icon notika-finance"></i> Data Pendaftar Baru</a></li>
                        <li class="<?php if($this->uri->segment(1)=="data_pinjam"){echo "active";}?>"><a data-toggle="tab" href="#databayarweb"><i class="notika-icon notika-form"></i> Data Pembayaran</a></li>
                        <li class="<?php if($this->uri->segment(1)=="report"){echo "active";}?>">
                            <a class="<?php if($this->uri->segment(1)=="report"){echo "active";}?>" data-toggle="tab" href="#datareportweb"><i class="notika-icon notika-bar-chart"></i>Report</a>
                        </li>
                    <?php endif ?>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="pinjaman" class="tab-pane notika-tab-menu-bg animated flipInX <?php if($this->uri->segment(1)=="pinjaman"){echo "active";}else if($this->uri->segment(1)=="bayar"){echo "active";} ?>">
                        <ul class="notika-main-menu-dropdown">
                            <?php if ($this->session->userdata('id')==null): ?>
                            <li><a href="<?php echo site_url('pinjaman'); ?>">Permohonan Pinjaman</a></li>
                            <?php endif ?>
                            <li><a href="<?php echo site_url('bayar/pinjaman'); ?>">Data Pinjaman</a></li>
                        </ul>
                    </div>
                    <div id="databayarweb" class="tab-pane notika-tab-menu-bg animated flipInX <?php if($this->uri->segment(1)=="data_pinjam"){echo "active";}else if($this->uri->segment(1)=="data_simpan"){echo "active";} ?>">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo site_url('data_simpan'); ?>">Pembayaran Simpanan</a></li>
                            <li><a href="<?php echo site_url('data_pinjam'); ?>">Pembayaran Pinjaman</a></li>
                        </ul>
                    </div>
                    <div id="datareportweb" class="tab-pane notika-tab-menu-bg animated flipInX <?php if($this->uri->segment(1)=="report"){echo "active";} ?>">
                        <ul class="notika-main-menu-dropdown">
                           <li><a href="<?php echo site_url('report'); ?>">Total Simpanan Anggota</a></li>
                           <li><a href="<?php echo site_url('report/simpan'); ?>">Rekap Simpanan Perbulan</a></li>
                           <li><a href="<?php echo site_url('report/user'); ?>">Rekap Daftar Anggota Baru Perbulan</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
<?php } ?>
<!-- Main Menu area End -->