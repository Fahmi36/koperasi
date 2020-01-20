<div class="modal fade" id="showmodalcicil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modals-defaul">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail User</h5>
			</div>
			<div class="modal-body" id="accordion-style-1">
				<?php foreach($cicil as $data): ?>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Jumlah</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label>Rp. <?=number_format($data->jumlah_bayar + $data->jasa,0,',','.')?></label>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Bukti Transfer</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<?php if ($data->bukti_tf != NULL) { ?>
									<img src="<?php echo base_url('assets/img/bukti/').$data->bukti_tf ?>">
								<?php } else { ?>
									<label class="text-danger">Foto Bukti Transfer Tidak Ada</label>
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