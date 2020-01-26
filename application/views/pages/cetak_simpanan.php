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
		<?php if ($this->session->userdata('username') != null): ?>
			<div class="form-example-int form-horizental">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">Nama :</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="nama" class="form-control input-sm" placeholder="Masukkan Nama">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-example-int form-horizental">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							<label class="hrzn-fm">No. Anggota :</label>
						</div>
						<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
							<div class="nk-int-st">
								<input type="text" name="noanggota" class="form-control input-sm" placeholder="Masukkan No. Anggota">
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>
		<div class="form-example-int form-horizental mg-t-15">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Setoran Tanggal :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="text" name="set-tanggal" value="" class="form-control input-sm" placeholder="Masukkan Tanggal">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Pilih Simpanan :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="text" name="simpanan" value="" class="form-control input-sm" placeholder="Masukkan Simpanan">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" id="simpanpokok" style="display: none;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Simpanan Pokok :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="number" name="jumlah_pokok" class="form-control input-sm" placeholder="Masukkan Jumlah Simpanan Pokok">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" id="simpanwajib" style="display: none;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Simpanan Wajib :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="number" name="jumlah_wajib" class="form-control input-sm" placeholder="Masukkan Jumlah Simpanan Wajib">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" id="simpansuka" style="display: none;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Simpanan Sukarela :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="number" name="jumlah_suka" class="form-control input-sm" placeholder="Masukkan Jumlah Simpanan Sukarela">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" id="simpansuka" style="display: none;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Simpanan Sukarela :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="number" name="jumlah" class="form-control input-sm" placeholder="Masukkan Jumlah Simpanan Sukarela">
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
							<input type="text" name="" value="" class="form-control input-sm" placeholder="Masukkan Jenis Pembayaran">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" id="petugas" style="display: none;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Cari nama Petugas :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<select id="nama_petugas" name="nama_petugas" class="form-control"></select>
							<input type="hidden" id="idpetugas" name="idpetugas">
							<input type="hidden" id="namapetugas" name="namapetugas">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-example-int form-horizental mg-t-15" id="foto" style="display: none;">
			<div class="form-group">
				<div class="row">
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
						<label class="hrzn-fm">Masukan Foto Bukti Transfer :</label>
					</div>
					<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
						<div class="nk-int-st">
							<input type="file" name="filenya" class="form-control">
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