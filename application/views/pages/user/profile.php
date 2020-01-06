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
									<i class="notika-icon notika-settings"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2 style="margin: 14px 0;">Halaman Profile</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form action="">
					<div class="form-example-wrap">
						<div class="form-example-int">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<div class="nk-int-st">
									<input type="text" name="nama" value="<?=$this->session->userdata('nama');?>" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="form-example-int mg-t-15">
							<div class="form-group">
								<label>Tempat Lahir</label>
								<div class="nk-int-st">
									<input type="text" name="tempat_lahir" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="form-example-int mg-t-15">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<div class="nk-int-st">
									<input type="text" name="tgl_lahir" class="form-control input-sm" data-mask="99/99/9999" placeholder="dd/mm/yyyy">
								</div>
							</div>
						</div>
						<div class="form-example-int mg-t-15">
							<div class="form-group">
								<label>Pekerjaan</label>
								<div class="chiller_cb">
									<input id="peng_rptra" name="pekerjaan" type="checkbox">
									<label for="peng_rptra">Pengelola RPTRA, Kelurahan</label>
									<span></span>
								</div>
								<div class="form-group">
									<div class="nk-int-st">
										<input type="text" class="form-control input-sm" name="pengelola" id="isi_peke1" disabled/>
									</div>
								</div>

								<div class="chiller_cb">
									<input id="peng_pkk" name="pekerjaan" type="checkbox">
									<label for="peng_pkk">Tim Penggerak/Pengelola PKK, Kelurahan</label>
									<span></span>
								</div>
								<div class="form-group">
									<div class="nk-int-st">
										<input type="text" class="form-control input-sm" name="tim_penggerak" id="isi_peke2" disabled/>
									</div>	
								</div>

								<div class="chiller_cb">
									<input id="lainnya" name="pekerjaan" type="checkbox">
									<label for="lainnya">Lainnya</label>
									<span></span>
								</div>
								<div class="form-group">
									<div class="nk-int-st">
										<input type="text" class="form-control input-sm" name="lainnya" id="isi_peke3" disabled/>
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int">
							<div class="form-group">
								<label>Alamat Lengkap</label>
								<div class="nk-int-st">
									<textarea name="alamat" class="form-control auto-size" rows="3"></textarea>
								</div>
							</div>
						</div>
						<div class="form-example-int mg-t-15">
							<div class="form-group">
								<label>Nomor Identitas (KTP/SIM)</label>
								<div class="nk-int-st">
									<input type="text" name="ktp" class="form-control input-sm">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label style="font-weight: normal;">No Telpon (Rumah)</label>
									<div class="nk-int-st">
										<input type="text" name="no_rumah" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label style="font-weight: normal;">No Telpon (Handphone)</label>
									<div class="nk-int-st">
										<input type="text" name="no_hp" class="form-control input-sm">
									</div>
								</div>
							</div>
						</div>
						<div class="form-example-int mg-t-15">
							<button  type="submit" class="btn btn-success notika-btn-success waves-effect">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>