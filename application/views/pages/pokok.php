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
                                    <i class="notika-icon notika-dollar"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Halaman Simpanan</h2>
                                    <p>Simpanan KOPERASI PKK MELATI JAYA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-example-wrap mg-t-30">
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
									<label class="hrzn-fm">Nama Anggota:</label>
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
										<label class="hrzn-fm">Nama Anggota:</label>
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
										<input type="date" name="set-tanggal" class="form-control input-sm" placeholder="Masukkan Tanggal">
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
										<select class="form-control" name="jenis_setoran" id="pilihsimpanan" onchange="pilihsimpan()">
											<option selected disabled>Pilih Jenis Simpanan</option>
											<?php foreach ($jenis_setor as $key): ?>	
												<option value="<?=$key->id?>"><?=$key->jenis_setoran?></option>
											<?php endforeach ?>
										</select>
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
										<input type="text" name="jumlah_pokok" class="form-control input-sm rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Masukkan Jumlah Simpanan Pokok">
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
										<input type="text" name="jumlah_wajib" class="form-control input-sm rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Masukkan Jumlah Simpanan Wajib">
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
										<input type="text" name="jumlah_suka" class="form-control input-sm rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Masukkan Jumlah Simpanan Sukarela">
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
										<input type="text" name="jumlah" class="form-control input-sm rupiah" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Masukkan Jumlah Simpanan Sukarela">
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
										<select class="form-control" name="sistem_bayar" id="sistem_bayar" onchange="pilihbayar()">
											<option selected disabled>Pilih Jenis Pembayaran</option>
											<option value="1">Melalui Petugas</option>
											<option value="2">Melalui Bank / Transfer</option>
										</select>
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
										<select id="nama_petugas" name="nama_petugas" class="form-control" style="width: 100%;"></select>
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
					<div class="form-example-int mg-t-15">
						<div class="row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
							</div>
							<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
								<button class="btn btn-success notika-btn-success waves-effect">Submit</button>
							</div>
						</div>
					</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>