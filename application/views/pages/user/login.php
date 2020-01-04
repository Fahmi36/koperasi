<style type="text/css">
    .hero {
      background-color: #0040C1;
      position: relative;
      height: 100vh;
      overflow: hidden;
      font-family: 'Montserrat', sans-serif;
  }
  .cube {
      position: absolute;
      top: 80vh;
      left: 45vw;
      width: 10px;
      height: 10px;
      border: solid 1px #003298;
      -webkit-transform-origin: top left;
      transform-origin: top left;
      -webkit-transform: scale(0) rotate(0deg) translate(-50%, -50%);
      transform: scale(0) rotate(0deg) translate(-50%, -50%);
      -webkit-animation: cube 12s ease-in forwards infinite;
      animation: cube 12s ease-in forwards infinite;
  }
  .cube:nth-child(2n) {
      border-color: #0051f4;
  }
  .cube:nth-child(2) {
      -webkit-animation-delay: 2s;
      animation-delay: 2s;
      left: 25vw;
      top: 40vh;
  }
  .cube:nth-child(3) {
      -webkit-animation-delay: 4s;
      animation-delay: 4s;
      left: 75vw;
      top: 50vh;
  }
  .cube:nth-child(4) {
      -webkit-animation-delay: 6s;
      animation-delay: 6s;
      left: 90vw;
      top: 10vh;
  }
  .cube:nth-child(5) {
      -webkit-animation-delay: 8s;
      animation-delay: 8s;
      left: 10vw;
      top: 85vh;
  }
  .cube:nth-child(6) {
      -webkit-animation-delay: 10s;
      animation-delay: 10s;
      left: 50vw;
      top: 10vh;
  }

  @-webkit-keyframes cube {
      from {
        -webkit-transform: scale(0) rotate(0deg) translate(-50%, -50%);
        transform: scale(0) rotate(0deg) translate(-50%, -50%);
        opacity: 1;
    }
    to {
        -webkit-transform: scale(20) rotate(960deg) translate(-50%, -50%);
        transform: scale(20) rotate(960deg) translate(-50%, -50%);
        opacity: 0;
    }
}

@keyframes cube {
  from {
    -webkit-transform: scale(0) rotate(0deg) translate(-50%, -50%);
    transform: scale(0) rotate(0deg) translate(-50%, -50%);
    opacity: 1;
}
to {
    -webkit-transform: scale(20) rotate(960deg) translate(-50%, -50%);
    transform: scale(20) rotate(960deg) translate(-50%, -50%);
    opacity: 0;
}
}

</style>
<div class="hero"> 
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
                <a href="<?php echo site_url(''); ?>"><img src="<?php echo base_url('assets/img/logo/logo_.png'); ?>" alt="" width="370" style="margin-bottom: 40px;"/></a>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="Masukkan Id Koperasi">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Masukkan Kata Sandi">
                    </div>
                </div>
                <button class="btn btn-warning notika-btn-warning btn-lg waves-effect" style="margin-top: 30px;">Masuk</button>
            </div>

            <div class="nk-navigation nk-lg-ic">
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Daftar</span></a>
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Lupa Kata Sandi</span></a>
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
