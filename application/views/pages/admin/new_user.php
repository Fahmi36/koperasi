<div class="form-element-area">
	<div class="container">
		<div class="row" style="margin-top: 30px;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="invoice-wrap">
					<div class="invoice-img" style="padding: 30px 0;background-color: #3a53c4;">
						<h3 style="text-transform: uppercase;color: #fff;margin-bottom: 0;">Selamat Datang</h3>
					</div>
					<div class="row">
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

														<?php if($this->session->userdata('username') != null){ ?>
															<td>
																<button data-toggle="tooltip" data-title="Setujui Pendaftar Baru" onclick="terimaUser(<?=$key->id_anggota?>)" class="btn btn-success"><i class="notika-icon notika-checked"></i></button>
																<button data-toggle="tooltip" data-title="Tolak Pendaftar Baru" onclick="tolakUser(<?=$key->id_anggota?>)" class="btn btn-danger"><i class="notika-icon notika-close"></i></button>
																<button data-toggle="tooltip" data-title="Informasi Pendaftar Baru" onclick="infoUser(<?=$key->id_anggota?>)" class="btn btn-info"><i class="notika-icon notika-menus"></i></button>
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
		</div>
		<div id="modaluser"></div>
	</div>
</div>