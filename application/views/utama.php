<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/owl.transitions.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/meanmenu/meanmenu.min.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/animate.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/wave/button.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/notika-custom-icon.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/main.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url('/')?>assets/css/responsive.css">
    <script src="<?=base_url('/')?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <?php if ($this->uri->segment(1) != 'login' AND $this->uri->segment(1) != 'register'){ ?>
        <?php $this->load->view('include/top_nav');?>
        <?php $this->load->view('include/menu');?>
    <?php } ?>
    <?php $this->load->view($link_view) ?>

    <?php if ($this->uri->segment(1) != 'login' AND $this->uri->segment(1)!= 'register'){ ?>
        <!-- Start Footer area-->
        <div class="footer-copyright-area" style="background-color: #3a53c4;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 
                            . All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer area-->
    <?php } ?>

        <script type="text/javascript">
            var BASE_URL = '<?=site_url('/')?>';
        </script>
    <script src="<?=base_url('/')?>assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/wow.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/jquery-price-slider.js"></script>
    <script src="<?=base_url('/')?>assets/js/owl.carousel.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/meanmenu/jquery.meanmenu.js"></script>
    <script src="<?=base_url('/')?>assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/counterup/waypoints.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/counterup/counterup-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/sparkline/sparkline-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/flot/jquery.flot.js"></script>
    <script src="<?=base_url('/')?>assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url('/')?>assets/js/flot/flot-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/knob/jquery.knob.js"></script>
    <script src="<?=base_url('/')?>assets/js/knob/jquery.appear.js"></script>
    <script src="<?=base_url('/')?>assets/js/knob/knob-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/icheck/icheck.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/icheck/icheck-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/chat/jquery.chat.js"></script>
    <script src="<?=base_url('/')?>assets/js/todo/jquery.todo.js"></script>
    <script src="<?=base_url('/')?>assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/sweetalert2.js"></script>
    <script src="<?=base_url('/')?>assets/js/wave/waves.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/wave/wave-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/autosize.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/plugins.js"></script>
    <script src="<?=base_url('/')?>assets/js/main.js"></script>
    <script src="<?=base_url('/')?>assets/js/jasny-bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" ></script>
    <script src="https://colorlib.com/etc/bwiz/colorlib-wizard-11/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="https://colorlib.com/etc/bwiz/colorlib-wizard-11/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="https://colorlib.com/etc/bwiz/colorlib-wizard-11/vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="https://colorlib.com/etc/bwiz/colorlib-wizard-11/vendor/minimalist-picker/dobpicker.js"></script>
    <script src="<?=base_url('/')?>assets/js/wizard/main.js"></script>
    <script type="text/javascript">
        document.getElementById("next").disabled = true;
        function cekPass() {
            var katasandi = document.getElementById("katasandi").value;
            var confirmPassword = document.getElementById("ulangsandi").value;
            if (katasandi != confirmPassword) {
                document.getElementById("next").disabled = true;
                $('.pesan').html('<h5 class="text-danger"> Password tidak sesuai ! </h5>');
                return false;
            }else{
                document.getElementById("next").disabled = false;
                $('.pesan').html('<h5 class="text-success"> Password sesuai ! </h5>');
                return true;
            }
        }
    </script>
    <script type="text/javascript">
        const form = document.querySelector('.step-form')
        const steps = form.querySelectorAll('.step-form__step')
        const progress = form.querySelectorAll('.step-form__progress-step')

        const next = form.querySelector('[data-action="next"]')
        const prev = form.querySelector('[data-action="prev"]')
        const submit = form.querySelector('[data-action="submit"]')

        let currentStep = 0, totalSteps = steps.length

        function showStep (index) {
          steps[index].classList.add('step-form__step--active')

          if (index !== 0){ 
            prev.classList.add('step-form__button--active')
            prev.setAttribute('aria-hidden', 'false')
          } else {
            prev.classList.remove('step-form__button--active')
            prev.setAttribute('aria-hidden', 'true')
          }

          if (index === totalSteps - 1) {
            next.classList.remove('step-form__button--active')
            next.setAttribute('aria-hidden', 'true')
            submit.classList.add('step-form__button--active')
            submit.setAttribute('aria-hidden', 'false')
            submit.addEventListener('click', stepInputValidation)
          } else {
            next.classList.add('step-form__button--active')
            next.setAttribute('aria-hidden', 'false')
            submit.classList.remove('step-form__button--active')
            submit.setAttribute('aria-hidden', 'true')
            submit.removeEventListener('click', stepInputValidation)
          }

          stepSetProgress(index)
        }

        function stepActionHandler (index) {
          if (index === 1 && ! stepInputValidation()) return false

          steps[currentStep].classList.remove('step-form__step--active')

          currentStep = currentStep + index

          showStep(currentStep)
        }

        function stepInputHandler (element) {
          const input = element.querySelector('.step-form__input')

          const focusHandler = event => {
            if (event.type === 'blur') {
              if (input.value === '')
              element.classList.remove('step-form__step--focused')
            }

            if (event.type === 'focus') {
              if (input.value === '')
              element.classList.add('step-form__step--focused')
            }
          }

          input.addEventListener('blur', focusHandler)
          input.addEventListener('focus', focusHandler)
        }

        function stepInputValidation () {
          const inputs = steps[currentStep].querySelectorAll('.step-form__input')
          const norek = steps[currentStep].querySelectorAll('#norek')

          let i, valid = true

          for (i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
              steps[currentStep].classList.add('step-form__step--invalid')
              valid = false
            } else if (
              norek.value !== '' &&
              steps[currentStep].classList.remove('step-form__step--invalid')
            ) {
              steps[currentStep].classList.remove('step-form__step--invalid')
            }
          }

          if (valid)
            progress[currentStep].classList.add('step-form__progress-step--complete')

          return valid
        }

        function stepSetProgress (index) {
          for (let i = 0; i < progress.length; i++)
            progress[i].classList.remove('step-form__progress-step--active')

          progress[index].classList.add('step-form__progress-step--active')
        }

        showStep(currentStep)

        steps.forEach(step => stepInputHandler(step))
        next.addEventListener('click', () => stepActionHandler(1))
        prev.addEventListener('click', () => stepActionHandler(-1))

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#daftarRek").click(function(){
                $("#sudahPunya").hide();
                $("#belumPunya").show();
                $("#formNorek").html("");
            });
            $("#inputNorek").click(function(){
                $("#sudahPunya").show();
                $("#belumPunya").hide();
                $("#formNorek").html("<div class='form-group' id='formNorek'><label style='float: left;'>Nomor Rekening</label><div class='nk-int-st'><input type='number' id='norek' class='form-control input-sm step-form__input' placeholder='Masukkan Nomor Rekening'></div></div>");
            });
        });
        /*modal*/
        $(document).on('ready', function(){
            $modal = $('.modal-frame');
            $overlay = $('.modal-overlay');
            $sidenav = $('.js-side-nav-container');

            $modal.bind('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e){
              if($modal.hasClass('state-leave')) {
                $modal.removeClass('state-leave');
            }
        });

            $('.close').on('click', function(){
              $overlay.removeClass('state-show');
              $modal.removeClass('state-appear').addClass('state-leave');
          });

            $('.open').on('click', function(){
              $overlay.addClass('state-show');
              $modal.removeClass('state-leave').addClass('state-appear');
              $sidenav.removeClass('side-nav-visible');
          });
        });
        /*end modal*/
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#besar_pinjam").keyup(function() {
                var x = document.getElementById('suratPer');
                if($(this).val() >= 20000000) {
                    $("#suratPer").html("<div class='form-group'><div class='row'><div class='col-lg-2 col-md-3 col-sm-3 col-xs-12'><label class='hrzn-fm'>Surat Pernyataan :</label></div><div class='col-lg-8 col-md-7 col-sm-7 col-xs-12'><div class='nk-int-st'><input type='file' name='surat_pernyataan' required></div></div></div></div>");
                } else {
                    $("#suratPer").html("");
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datatransaksi").dataTable();
            $("#datapinjaman").dataTable();

        });
        function pilihsimpan() {
            if ($('#pilihsimpanan').val() == 1) {
                $("#simpanpokok").removeAttr('style');
                $("#angsuranpokok").removeAttr('style');
                $("#jasapokok").removeAttr('style');
                $("#simpanwajib").attr('style', 'display:none;');
                $("#simpansuka").attr('style', 'display:none;');
            }else if($('#pilihsimpanan').val() == 2){
                $("#simpanwajib").removeAttr('style');                
                $("#simpanpokok").attr('style', 'display:none;');
                $("#angsuranpokok").attr('style', 'display:none;');
                $("#jasapokok").attr('style', 'display:none;');
                $("#simpansuka").attr('style', 'display:none;');
            }else if($('#pilihsimpanan').val() == 3){
                $("#simpansuka").removeAttr('style');      
                $("#simpanwajib").attr('style', 'display:none;');    
                $("#simpanpokok").attr('style', 'display:none;');
                $("#angsuranpokok").attr('style', 'display:none;');
                $("#jasapokok").attr('style', 'display:none;');
            }
        }
        function pilihbayar() {
            if ($('#sistem_bayar').val() == 1) {
                $("#petugas").removeAttr('style');
                $("#foto").attr('style', 'display:none;');
            }else if($('#sistem_bayar').val() == 2){
                $("#foto").removeAttr('style');                
                $("#petugas").attr('style', 'display:none;');
            }
        }
        $('#nama_petugas').select2({
            placeholder: "Pilih Petugas...",
            minimumInputLength: 0,
            ajax: {
              url: '<?= site_url('action/getPetugas')?>',
              dataType: 'json',
              data: function (params) {
                  var query = {
                    search: params.term,
                }
                return query;
            },
            processResults: function (data) {
                return {
                  results: data
              };
          },
          cache: false,
      },
  });
        $('#nama_petugas').on('select2:select', function(event) {
            $("#idpetugas").val(event.params.data.id);
            $("#namapetugas").val(event.params.data.text);
        });
        $('#nama_petugas').on('change.select2', function(event) {
            $("#idpetugas").val("");
            $("#namapetugas").val("");
        });
    </script>
    <script type="text/javascript">

        $('#peng_rptra').on('click',function () {
        if ($('#peng_rptra').is(':checked')) {
            $('#isi_peke1').removeAttr('disabled');
            $('#isi_peke2').attr('disabled', 'disabled');
            $('#isi_peke3').attr('disabled', 'disabled');
        }

    });
        $('#peng_pkk').on('click',function () {
        if ($('#peng_pkk').is(':checked')) {
            $('#isi_peke2').removeAttr('disabled');
            $('#isi_peke1').attr('disabled', 'disabled');
            $('#isi_peke3').attr('disabled', 'disabled');
        }

    });
        $('#lainnya').on('click',function () {
        if ($('#lainnya').is(':checked')) {
            $('#isi_peke3').removeAttr('disabled');
            $('#isi_peke1').attr('disabled', 'disabled');
            $('#isi_peke2').attr('disabled', 'disabled');
        }

    });
        $('#transfer').on('click',function () {
        if ($('#transfer').is(':checked')) {
            $('#buktitf').removeAttr('style');
        }else{
            $('#buktitf').attr('style', 'display:none;');
        }

    });
        $('#petugas').on('click',function () {
        if ($('#petugas').is(':checked')) {
            $('#buktitf').attr('style', 'display:none;');
        }

    });

        
    </script>
    
</body>
</html>