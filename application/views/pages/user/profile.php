<style type="text/css">
	.heading-h2 h2{
		margin-bottom: 5px !important;
		text-transform: uppercase;
	}
	.tab_container {
		margin: 0 auto;
		position: relative;
	}

	input, section {
		clear: both;
		padding-top: 10px;
		display: none;
	}

	.tab_container .lab-tabs {
		font-weight: 700;
		font-size: 18px;
		display: block;
		float: left;
		width: 20%;
		padding: 1em;
		color: #757575;
		cursor: pointer;
		text-decoration: none;
		text-align: center;
		background: #f0f0f0;
	}

	#tab1:checked ~ #content1,
	#tab2:checked ~ #content2,
	#tab3:checked ~ #content3,
	#tab4:checked ~ #content4,
	#tab5:checked ~ #content5 {
		display: block;
		padding: 20px;
		background: #fff;
		color: #999;
		border-bottom: 2px solid #f0f0f0;
	}

	.tab_container .tab-content label,
	.tab_container .tab-content input,
	.tab_container .tab-content h3 {
		-webkit-animation: fadeInScale 0.7s ease-in-out;
		-moz-animation: fadeInScale 0.7s ease-in-out;
		animation: fadeInScale 0.7s ease-in-out;
	}
	.tab_container .tab-content h3  {
		text-align: center;
	}

	.tab_container [id^="tab"]:checked + label {
		background: linear-gradient(0deg, #2c3e50 0%, #34495e 100%);
		box-shadow: inset 0 5px #3a53c4;
		color: #fff;
	}

	.tab_container [id^="tab"]:checked + label .fa {
		color: #fff;
	}

	label .fa {
		font-size: 1.3em;
		margin: 0 0.4em 0 0;
	}

	/*Media query*/
	@media only screen and (max-width: 930px) {
		label span {
			font-size: 14px;
		}
		label .fa {
			font-size: 14px;
		}
	}

	@media only screen and (max-width: 768px) {
		label span {
			display: none;
		}

		label .fa {
			font-size: 16px;
		}

		.tab_container {
			width: 98%;
		}
	}

	/*Content Animation*/
	@keyframes fadeInScale {
		0% {
			transform: scale(0.9);
			opacity: 0;
		}

		100% {
			transform: scale(1);
			opacity: 1;
		}
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
				<div class="tab_container">
					<input id="tab1" type="radio" name="tabs" checked>
					<label for="tab1" class="lab-tabs"><i class="fa fa-user"></i><span>Data Diri</span></label>

					<input id="tab2" type="radio" name="tabs">
					<label for="tab2" class="lab-tabs"><i class="fa fa-lock"></i><span>Password</span></label>

					<section id="content1" class="tab-content">
						<form action="javascript:void(0);" method="post" id="ubahprofile">
							<div class="form-example-wrap">
								<center>
									<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="width: 200px;height: 200px;">
		        					<h6 style="margin-top: 20px;">Ubah foto profile</h6>
		        					<div class="form-example-int">
										<div class="form-group">
											<div class="nk-int-st">
				        					<input type="file" name="avatar" class="text-center center-block file-upload">
				        				</div>
				        				</div>
				        			</div>
	        					</center>
								<div class="form-example-int">
									<div class="form-group">
										<label>Nama Lengkap</label>
										<div class="nk-int-st">
											<input type="text" name="nama" value="<?=$profile->nama?>" class="form-control input-sm">
										</div>
									</div>
								</div>
								<div class="form-example-int mg-t-15">
									<div class="form-group">
										<label>Tempat Lahir</label>
										<div class="nk-int-st">
											<input type="text" name="tempat_lahir" value="<?=$profile->tempat_lahir?>" class="form-control input-sm">
										</div>
									</div>
								</div>
								<div class="form-example-int mg-t-15">
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<div class="nk-int-st">
											<input type="text" name="tgl_lahir" value="<?=$profile->tgl_lahir?>" class="form-control input-sm" data-mask="9999/99/99" placeholder="dd/mm/yyyy">
										</div>
									</div>
								</div>
								<!-- <div class="form-example-int mg-t-15">
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
								</div> -->
								<div class="form-example-int">
									<div class="form-group">
										<label>Alamat Lengkap</label>
										<div class="nk-int-st">
											<textarea name="alamat" class="form-control auto-size" rows="3"></textarea>
										</div>
									</div>
								</div>
								<!-- <div class="form-example-int mg-t-15">
									<div class="form-group">
										<label>Nomor Identitas (KTP/SIM)</label>
										<div class="nk-int-st">
											<input type="text" name="ktp" class="form-control input-sm">
										</div>
									</div>
								</div> -->
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
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label style="font-weight: normal;">No Rekening</label>
											<div class="nk-int-st">
												<input type="text" name="no_rumah" class="form-control input-sm" readonly="">
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label style="font-weight: normal;">Nama Bank</label>
											<div class="nk-int-st">
												<input type="text" name="no_hp" class="form-control input-sm" readonly="">
											</div>
										</div>
									</div>
								</div>
								<div class="form-example-int mg-t-15">
									<button  type="submit" class="btn btn-primary notika-btn-primary waves-effect">Simpan</button>
								</div>
							</div>
						</form>
					</section>

					<section id="content2" class="tab-content">
						<div class="form-example-wrap">
							<div class="form-group">
								<label style="float: left;">Kata Sandi Lama</label>
								<div class="nk-int-st">
									<input type="password" id="katasandi" class="form-control input-sm step-form__input" placeholder="Masukkan Kata Sandi">
								</div>
							</div>
							<br>
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

							<div class="form-example-int mg-t-15">
								<button type="submit" id="next" class="btn btn-primary notika-btn-primary waves-effect">Simpan</button>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>