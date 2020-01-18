<div class="hero"> 
  <div class="login-content">
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">
      <form action="javascript:void(0);" method="post" id="fromlogin">
        <div class="nk-form">
          <a href="<?php echo site_url(''); ?>"><img src="<?php echo base_url('assets/img/logo/logo_.png'); ?>" alt="" width="370" style="margin-bottom: 40px;"/></a>
          <div class="input-group">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
            <div class="nk-int-st">
              <input type="text" name="noanggota" class="form-control" placeholder="Masukkan nomor anggota / username">
            </div>
          </div>
          <div class="input-group mg-t-15">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
            <div class="nk-int-st">
              <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi">
            </div>
          </div>
          <button type="submit" class="btn btn-warning notika-btn-warning btn-lg waves-effect" data-toggle="modal" data-target="#myModalone" style="margin-top: 30px;">Masuk</button>
        </div>
      </form>
      <div class="nk-navigation nk-lg-ic">
        <a href="<?= site_url('register') ?>" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Daftar</span></a>
        <!-- <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Lupa Kata Sandi</span></a> -->
      </div>
    </div>
  </div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
  <div class="cube"></div>
</div>