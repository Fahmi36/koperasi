<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area" style="padding: 8px 0;">
                    <a href="#"><img src="<?php echo base_url('assets/img/logo/logo_.png'); ?>" alt="" width="305"/></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">
                        <!-- <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                            <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                <div class="search-input">
                                    <i class="notika-icon notika-left-arrow"></i>
                                    <input type="text" />
                                </div>
                            </div>
                        </li> -->
                        <?php if ($this->session->userdata('id') == null){ ?>

                            <li class="nav-item"><a href="" style="font-size: 16px;font-weight:bold;text-transform: uppercase;">Masuk</a></li>
                            <li class="nav-item"><a href="" style="font-size: 16px;font-weight:bold;color: #FFC107;text-transform: uppercase;">Daftar</a></li>
                        <?php }else{ ?>
                            <li class="nav-item"><a href="<?= site_url('logout') ?>" style="font-size: 16px;font-weight:bold;color: #FFC107;text-transform: uppercase;">Logout</a></li>
                        <?php }?>
<!--                         <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-mail"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd animated zoomIn">
=======
                        <?php if ($this->session->userdata('id') == null): ?>
                            
                        <li class="nav-item"><a href="" style="font-size: 16px;font-weight:bold;text-transform: uppercase;">Masuk</a></li>
                        <li class="nav-item"><a href="" style="font-size: 16px;font-weight:bold;color: #FFC107;text-transform: uppercase;">Daftar</a></li>
                        <?php endif ?>
                        <li class="nav-item nc-al">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
>>>>>>> 10402b5e05924ce07268b2ae8fcce21a9445fb82
                                <div class="hd-mg-tt">
                                    <h2>Notification</h2>
                                </div>
                                <div class="hd-message-info">
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-message-img">
                                                <img src="img/post/1.jpg" alt="" />
                                            </div>
                                            <div class="hd-mg-ctn">
                                                <h3>David Belle</h3>
                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="hd-mg-va">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-settings"></i></span></a>
                            <div role="menu" class="dropdown-menu message-dd animated zoomIn" style="width: 170px;">
                                <div class="hd-message-info">
                                    <a href="<?php echo site_url('profile'); ?>">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <h3>Profile</h3>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <h3>Keluar</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>