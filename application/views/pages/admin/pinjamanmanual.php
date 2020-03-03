<style type="text/css">
	.heading-h2 h2{
		margin-bottom: 5px !important;
		text-transform: uppercase;
	}
</style>
<div class="form-element-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-credit-card"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>Halaman Permohonan Pinjaman</h2>
									<p>Permohonan Pinjaman KOPERASI PKK MELATI JAYA</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form action="javascript:void(0)" method="post" id="formpinjam" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-example-wrap mg-t-30">
						<div class="cmp-tb-hd cmp-int-hd text-center heading-h2">
							<h2>Permohonan Pinjaman</h2>
							<h2>Koperasi PKK Melati Jaya</h2>
							<h2>Jl. Kebagusan Raya No. 42 Pasar Minggu</h2>
							<h2>Jakarta Selatan</h2>
						</div>
						<hr> 
						<br>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Nama :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<input type="text" name="nama" value="<?=$this->session->userdata('nama')?>" class="form-control input-sm" placeholder="Masukkan Nama" required="" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Kelompok :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<select name="kelompok" class="form-control input-sm" required="" autocomplete="off">
												<option selected disabled>Pilih Jenis Kelompok</option>
												<?php foreach ($namakelompok as $key) { ?>
													<option value="<?=$key->kelompok?>"><?=$key->kelompok?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">No. Anggota :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<input type="text" name="noanggota" value="<?=$this->session->userdata('id_anggota');?>" class="form-control input-sm" placeholder="Masukkan No. Anggota" required="" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Besar Pinjaman :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<input type="text" id="besar_pinjam" name="nominal" class="form-control input-sm" placeholder="Masukkan Besar Pinjaman" required="" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental" id="suratPer">
							
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Jumlah Angsuran :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<!-- <select name="jml_angsuran" class="form-control input-sm" required="" autocomplete="off" readonly>
												<option selected disabled>Pilih Jumlah Angsuran</option>
												<option value="3">3 Bulan</option>
												<option value="6">6 Bulan</option>
												<option value="10">10 Bulan</option>
											</select> -->
											<input type="text" id="jml_angsuran" name="jml_angsuran" class="form-control input-sm" placeholder="Masukkan Jumlah Bulan" required="" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">No. Telp :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<input type="number" name="telp" class="form-control input-sm" placeholder="Masukkan No. Telp" required="" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">No. Rekening :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<input type="number" name="norek"  class="form-control input-sm" placeholder="Masukkan No. Rekening" required="" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int form-horizental mg-t-15">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
										<label class="hrzn-fm">Keperluan :</label>
									</div>
									<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
										<div class="nk-int-st">
											<input type="text" name="keperluan" class="form-control input-sm" placeholder="Masukkan Keperluan" autocomplete="off">
										</div>
									</div>
								</div>
							</div>
						</div>
					  	<div class="form-example-int mg-t-15">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
								<input type="checkbox" name="sk" id="s&k" required="">
		  						<label for="s&k">Saya sudah memahami, dan menyetujui Syarat dan Ketentuan </label>
		  					</div>
		  				</div>
  						<div class="form-example-int mg-t-15">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<button type="submit" id="pinjam" disabled="disabled" class="btn btn-success notika-btn-success waves-effect">Pinjam</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			
			<div id="wadahmodal"></div>
		</div>
	</div>
</div>