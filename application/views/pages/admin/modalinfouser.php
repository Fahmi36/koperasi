<div class="modal fade" id="showmodaluser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modals-defaul">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail User</h5>
			</div>
			<div class="modal-body" id="accordion-style-1">
				<?php foreach($user as $data): ?>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Nama Anggota</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?= $data->nama?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Tempat Lahir</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?= $data->tempat_lahir?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>NIK</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?=$data->nik?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Alamat</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?=$data->alamat?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>No Handphone</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?=$data->no_hp?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Kelompok</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?=$data->kelompok?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Pekerjaan</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?=$data->pekerjaan?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Foto KTP</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<?php if ($data->f_ktp != NULL) { ?>
									<img src="<?php echo base_url('assets/images/bukti/').$data->f_ktp ?>">
								<?php } else { ?>
									<label class="text-danger">Foto KTP Tidak Ada</label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Foto Berwarna 3x4</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<?php if ($data->f_foto != NULL) { ?>
									<img src="<?php echo base_url('assets/images/bukti/').$data->f_foto ?>">
								<?php } else { ?>
									<label class="text-danger">Foto 3x4 Tidak Ada</label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Foto Berwarna 2x3</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<?php if ($data->f_foto2 != NULL) { ?>
									<img src="<?php echo base_url('assets/images/bukti/').$data->f_foto2 ?>">
								<?php } else { ?>
									<label class="text-danger">Foto 2x3 Tidak Ada</label>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>