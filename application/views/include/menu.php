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
                                    <li><a href="<?php echo site_url('pinjaman'); ?>">Permohonan Pinjaman</a></li>
                                    <li><a href="<?php echo site_url('bayar/pinjaman'); ?>">Bayar Pinjaman</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->

<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="<?php if($this->uri->segment(1)==""){echo "active";}?>"><a href="<?php echo site_url(''); ?>"><i class="notika-icon notika-house"></i> Beranda</a></li>
                    <li class="<?php if($this->uri->segment(1)=="simpanan"){echo "active";}?>"><a href="<?php echo site_url('simpanan'); ?>"><i class="notika-icon notika-dollar"></i> Simpanan</a></li>
                    <li class="<?php if($this->uri->segment(1)=="pinjaman"){echo "active";}else if($this->uri->segment(1)=="bayar"){echo "active";} ?>"><a data-toggle="tab" href="#pinjaman"><i class="notika-icon notika-credit-card"></i> Pinjaman</a></li>
                    <!-- <li><a href="<?php echo site_url('setoran'); ?>"><i class="notika-icon notika-credit-card"></i> Setoran</a></li> -->
                    <!-- <li><a data-toggle="tab" href="#Page" ><i class="notika-icon notika-support"></i> Pages</a></li> -->
                </ul>
                <div class="tab-content custom-menu-content">
<!--                     <div id="simpanan" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?=site_url('sim_pokok')?>">Pokok</a></li>
                            <li><a href="<?=site_url('sim_wajib')?>">Wajib</a></li>
                            <li><a href="<?=site_url('sim_suka')?>">Sukarela</a></li>
                        </ul>
                    </div> -->
                     <div id="pinjaman" class="tab-pane notika-tab-menu-bg animated flipInX <?php if($this->uri->segment(1)=="pinjaman"){echo "active";}else if($this->uri->segment(1)=="bayar"){echo "active";} ?>">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo site_url('pinjaman'); ?>">Permohonan Pinjaman</a></li>
                            <li><a href="<?php echo site_url('bayar/pinjaman'); ?>">Bayar Pinjaman</a></li>
                        </ul>
                    </div>
 <!--                    <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="contact.html">Contact</a>
                            </li>
                            <li><a href="invoice.html">Invoice</a>
                            </li>
                            <li><a href="typography.html">Typography</a>
                            </li>
                            <li><a href="color.html">Color</a>
                            </li>
                            <li><a href="login-register.html">Login Register</a>
                            </li>
                            <li><a href="404.html">404 Page</a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End -->