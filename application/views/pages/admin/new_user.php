<div class="form-element-area">
	<div class="container">
		<div class="row" style="margin-top: 30px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-finance"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>Data Pendaftar Baru Report</h2>
									<p>Pendaftar Baru KOPERASI PKK MELATI JAYA</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="invoice-wrap">
					<div class="invoice-img" style="padding: 30px 0;background-color: #faf7f2;">
						<h3 style="text-transform: uppercase;color: #555;margin-bottom: 0;">Data Pengguna Baru</h3>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="data-table-list">
								<div class="table-responsive">
									<table id="datapinjaman" class="table table-striped">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Nomor Telpon</th>
												<th>Pekerjaan</th>
												<th>No Rekening Bank DKI</th>
												<th>Jenis Pembayaran</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($anggota as $key): ?>

												<tr>
													<td><?=$key->nama?></td>
													<td><?=$key->no_hp?></td>
													<td><?=$key->pekerjaan?></td>
													<td><?=$key->no_rek?></td>
													<?php if ($key->status == '2'): ?>
														<td>Lunas</td>
														<?php elseif($key->status == '3'): ?>
															<td>Cicil 10 Bulan</td>
														<?php elseif($key->status == '4'): ?>
															<td>Sedang tahap Pencicilan</td>
														<?php endif ?>
													<?php if($this->session->userdata('username') != null){ ?>
														<td>
															<button data-toggle="tooltip" data-title="Setujui Pendaftar Baru" onclick="terimaUser(<?=$key->id_anggota?>)" class="btn btn-success notika-btn-success waves-effect"><i class="notika-icon notika-checked"></i></button>
															<button data-toggle="tooltip" data-title="Tolak Pendaftar Baru" onclick="tolakUser(<?=$key->id_anggota?>)" class="btn btn-danger notika-btn-danger waves-effect"><i class="notika-icon notika-close"></i></button>
															<button data-toggle="tooltip" data-title="Informasi Pendaftar Baru" onclick="infoUser(<?=$key->id_anggota?>)" class="btn btn-info notika-btn-info waves-effect"><i class="notika-icon notika-menus"></i></button>
														</td>
													<?php } ?>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="modaluser"></div>
	</div>
</div>