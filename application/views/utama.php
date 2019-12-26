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
</head>

<body>
    <!-- Start Header Top Area -->
    <?php $this->load->view('include/top_nav');?>
    <!-- End Header Top Area -->
    
    <!-- Main Menu area start-->
    <?php $this->load->view('include/menu');?>
    <!-- Main Menu area End-->

    <!-- Form Element area Start-->
    <?php $this->load->view($link_view) ?>
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
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
    <script src="<?=base_url('/')?>assets/js/icheck/icheck-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/chat/jquery.chat.js"></script>
    <script src="<?=base_url('/')?>assets/js/todo/jquery.todo.js"></script>
    <script src="<?=base_url('/')?>assets/js/data-table/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/wave/waves.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/wave/wave-active.js"></script>
    <script src="<?=base_url('/')?>assets/js/autosize.min.js"></script>
    <script src="<?=base_url('/')?>assets/js/plugins.js"></script>
    <script src="<?=base_url('/')?>assets/js/main.js"></script>
    <script src="<?=base_url('/')?>assets/js/tawk-chat.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#data-table-basic").dataTables();
        });
    </script>
</body>
</html>