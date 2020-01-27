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
						<label class="hrzn-fm">Nama Petugas:</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="text" name="nama" value="<?= $this->session->userdata('nama'); ?>" readonly class="form-control input-sm" placeholder="Masukkan Nama">
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
							<input type="text" name="set-tanggal" readonly value="" class="form-control input-sm" placeholder="Masukkan Tanggal">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Simpanan :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="text" name="simpanan" value="" readonly class="form-control input-sm" placeholder="Masukkan Simpanan">
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
							<input type="text" name="" value="" readonly class="form-control input-sm" placeholder="Masukkan Jenis Pembayaran">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" style="margin-top: 10%;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<p style="float: right;">Tanda Tangan Petugas</p>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>