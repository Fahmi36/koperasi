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
				<div class="form-example-wrap mg-t-30">
					<div class="cmp-tb-hd cmp-int-hd text-center heading-h2">
						<h2>Koperasi PKK Melati Jaya</h2>
						<h2>Jl. Kebagusan Raya No. 42 Pasar Minggu</h2>
						<h2>Jakarta Selatan</h2>
					</div>
					<hr> 
					<br>
					<h4 style="text-transform: uppercase;text-decoration: underline;text-align: center;margin-bottom: 40px;">Formulir Bayar Pinjaman</h4>
					<form method="post" action="javascript:void(0)" id="formbayarpinjam" enctype="multipart/form-data" accept-charset="utf-8">
<!-- 					<div class="form-example-int form-horizental mg-t-15">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Bayar Tanggal :</label>
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<div class="nk-int-st">
										<input type="date" name="set-tanggal" class="form-control input-sm" placeholder="Masukkan Tanggal">
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="form-example-int form-horizental mg-t-15" id="simpanpokok">
						<div class="form-group">
							<div class="row">
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Angsuran Ke :</label>
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<div class="nk-int-st">
										<input type="text" readonly value="<?=($cicil->angsuran+1)?>" name="angsuran" class="form-control input-sm">
										<input type="hidden" readonly value="<?=$cicil->id?>" name="id" class="form-control input-sm">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-example-int form-horizental mg-t-15" id="simpanwajib">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Jasa Yang Harus di Bayar :</label>
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<div class="nk-int-st">
										<input type="number" value="<?= number_format($cicil->jasa,0,',','.')?>" readonly class="form-control input-sm" placeholder="Masukkan Jumlah Simpanan Wajib">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-example-int form-horizental mg-t-15" id="simpansuka">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Bulanan Yang Harus di Bayar:</label>
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<div class="nk-int-st">
										<input type="text" value="<?= number_format($cicil->jumlah_bayar,0,',','.')?>" readonly class="form-control input-sm">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-example-int form-horizental mg-t-15" id="simpansuka" >
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Tanggal Jatuh Tempo :</label>
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<div class="nk-int-st">
										<input type="text" value="<?=date('d F, Y',strtotime($cicil->tgl_tempo))?>" readonly class="form-control input-sm">
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
										<select class="form-control" name="jenis" id="sistem_bayar" onchange="pilihbayar()">
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
										<select id="nama_petugas" name="nama_petugas" class="form-control input-lg"></select>
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
								<button class="btn btn-success notika-btn-success waves-effect">Kirim</button>
							</div>
						</div>
					</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>