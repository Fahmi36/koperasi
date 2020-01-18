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
          <button class="btn btn-primary notika-btn-primary btn-lg waves-effect" data-toggle="modal" data-target="#resetPass" style="margin-top: 30px;">Coba Modal</button>

      <div class="nk-navigation nk-lg-ic">
        <a href="<?= site_url('register') ?>" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Daftar</span></a>
        <!-- <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Lupa Kata Sandi</span></a> -->
      </div>
    </div>

    <div class="modal fade" id="resetPass" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: auto;">
      <div class="modal-dialog modals-default">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">
            <div class="step-form">
              <form>
                <div class="step-form__progress">
                  <span class="step-form__progress-step" role="presentation"></span>
                  <span class="step-form__progress-step" role="presentation"></span>
                  <span class="step-form__progress-step" role="presentation"></span>
                </div>
                <div class="step-form__step">
                  <h2 style="text-align: left;font-weight: 300;margin-bottom: 30px;">Anda harus merubah <b>kata sandi</b> default dengan <b>kata sandi</b> yang anda inginkan</h2>
                  <div class="form-group">
                    <label style="float: left;">Kata Sandi</label>
                    <div class="nk-int-st">
                      <input type="password" id="katasandi" class="form-control input-sm step-form__input" placeholder="Masukkan Kata Sandi">
                    </div>
                  </div>
                  <div class="form-group">
                    <label style="float: left;">Konfirmasi Kata Sandi</label>
                    <div class="nk-int-st">
                      <input type="password" id="ulangsandi" oninput="cekPass()" class="form-control input-sm step-form__input" placeholder="Masukkan Konfirmasi Kata Sandi">
                    </div>
                  </div>
                  <label class="pesan"></label> 
                </div>
                <div class="step-form__step">
                  <div id="sudahPunya">
                    <h4 style="margin-bottom: 30px;">Masukan Nomor Rekening Bank DKI</h4>
                    <div class="form-group" id="formNorek">
                      <label style="float: left;">Nomor Rekening</label>
                      <div class="nk-int-st">
                        <input type="number" id="norek" class="form-control input-sm step-form__input" placeholder="Masukkan Nomor Rekening">
                      </div>
                    </div>
                    <p id="belum" style="text-align: left;">Belum memiliki nomor rekening bank dki? <a href="#" style="font-weight: 600!important;text-decoration: none;color: #395599;" id="daftarRek">Klik Disini</a></p>
                  </div>
                  <div id="belumPunya" style="display: none;">
                    <h4 style="margin-bottom: 30px;">Silahkan ke PKK Melati Jaya untuk pembuatan nomor rekening Bank DKI</h4>
                    <img class="img-thumbnail" src="<?php echo base_url('assets/img/bank/bank1.jpeg'); ?>" style="margin-bottom: 20px;">
                    <img class="img-thumbnail" src="<?php echo base_url('assets/img/bank/bank2.jpeg'); ?>">
                    <p style="text-align: left;margin-top: 25px;">Sudah memiliki nomor rekening bank dki? <a href="#" style="font-weight: 600!important;text-decoration: none;color: #395599;" id="inputNorek">Klik Disini</a></p>
                  </div>
                </div>
                <div class="step-form__step">
                  <h1>Terima Kasih <i class="notika-icon notika-checked"></i></h1>
                  <input class="step-form__input" style="display: none;">
                </div>
                <div class="step-form__action">
                  <button type="button" class="step-form__button waves-effect" data-action="prev"><i class="notika-icon notika-back"></i> Previous</button>
                  <button type="button" id="next" class="step-form__button step-form__button--active" data-action="next">Next <i class="notika-icon notika-next-pro"></i></button>
                  <button class="step-form__button" type="submit" data-action="submit">Submit</i></button>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
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