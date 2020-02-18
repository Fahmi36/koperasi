<!doctype html>
<html class="no-js" lang="id">

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
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="<?=base_url('/')?>assets/css/responsive.css">
	<link rel="stylesheet" href="<?=base_url('/')?>assets/css/datapicker/datepicker3.css">
	<script src="<?=base_url('/')?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
	<link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>

<body onload="print();">
	<style type="text/css">
		.heading-h2 h2{
			margin-bottom: 5px !important;
			text-transform: uppercase;
		}
	</style>
	<div class="form-example-wrap">
		<div class="cmp-tb-hd cmp-int-hd text-center heading-h2">
			<h2>Koperasi PKK Melati Jaya</h2>
			<h2>Jl. Kebagusan Raya No. 42 Pasar Minggu</h2>
			<h2>Jakarta Selatan</h2>
		</div>
		<hr> 
		<br>
		<h4 style="text-transform: uppercase;text-decoration: underline;text-align: center;margin-bottom: 40px;">Formulir Simpanan</h4>
		<form method="post" action="javascript:void(0)" id="formsimpan" enctype="multipart/form-data" accept-charset="utf-8">
			<div class="form-example-int form-horizental">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">No tiket:</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="nama" value="<?=$this->uri->segment(2)?>" readonly class="form-control input-sm" placeholder="Masukkan Nama">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Nama Anggota:</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="nama" value="<?=$simpan->nama?>" readonly class="form-control input-sm" placeholder="Masukkan Nama">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Nomor Anggota:</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="nama" value="<?=$simpan->no_anggota?>" readonly class="form-control input-sm" placeholder="Masukkan Nama">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental mg-t-15">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Setoran Tanggal :</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="set-tanggal" readonly value="<?= $simpan->tgl_transaksi ?>" class="form-control input-sm" placeholder="Masukkan Tanggal">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental mg-t-15">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Jenis Simpanan :</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="simpanan" readonly value="<?=$simpan->jenis_setoran?>" class="form-control input-sm" placeholder="Masukkan Simpanan">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental mg-t-15">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Jumlah Simpanan :</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="simpanan" readonly value="<?=number_format($simpan->jumlah_transaksi,2)?>" class="form-control input-sm" placeholder="Masukkan Simpanan">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental mg-t-15">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Jenis Pembayaran :</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="" readonly value="<?php if ($simpan->metode_bayar==1): ?>
								Pembayaran Melalui Petugas
								<?php else: ?>
									Pembayaran Melalui Transfer
									<?php endif ?>" readonly  class="form-control input-sm" placeholder="Masukkan Jenis Pembayaran">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ($simpan->metode_bayar==1): ?>
					<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label><?= $this->mm->getNamaPetugas($simpan->id_petugas)?></label>
								</div>
							</div>
						</div>
					<?php else: ?>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>Transfer</label>
									<img src="<?php echo base_url('assets/images/bukti/').$simpan->bukti_transfer ?>">
								</div>
							</div>
						</div>
					<?php endif ?>
					<div class="form-example-int form-horizental mg-t-15" style="margin-top: 10%;">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<p style="float: right;">Disetujui Oleh <?= $simpan->admin?></p>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<script type="text/javascript">
				jQuery(window).load(function($) {
					window.print();
				});
			</script>