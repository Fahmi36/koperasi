<div class="modal fade" id="modalverifpinjam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modals-defaul">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Detail Pinjaman</h5>
			</div>
			<div class="modal-body" id="accordion-style-1">
				<?php foreach($pinjam as $data): ?>
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
								<label>Jumlah Pinjaman yang di Ajukan</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label>Rp. <?=number_format($data->besar_pengajuan_pinjaman,0,',','.')?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Surat Pernyataan</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<?php if ($data->surat_pt != NULL) { ?>
									<img src="<?php echo base_url('assets/images/bukti/').$data->surat_pt ?>">
								<?php } else { ?>
									<label class="text-danger">Foto Tidak Ada</label>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Keperluan</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<label><?=$data->keperluan?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Status</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<?php if ($data->status_pinjaman == 0){ ?> 
									<label>Di Tolak</label>
								<?php }else if ($data->status_pinjaman == 1){ ?>
									<label>Menunggu Persetujuan</label>
								<?php }else if ($data->status_pinjaman == 2){ ?>
									<label>Sudah di Setujui</label>
								<?php }else if ($data->status_pinjaman == 5){ ?>
									<label>Sudah Di Transfer</label>
								<?php }else if ($data->status_pinjaman == 6){ ?>
									<label>Sudah Di Kembalikan</label>
								<?php }else if ($data->status_pinjaman == 7){ ?>
									<label>Sudah Di Verifikasi</label>
								<?php }else{ ?>
									<label>Sudah Lunas</label>
								<?php } ?>
							</div>
						</div>
					</div>
						
					<?php endforeach ?>
				</div>
				<div class="modal-footer">
                <a onclick="KembalikanPinjam(<?=$data->id?>)" class="btn btn-danger">Kembalikan</a>
                <a onclick="VerifData(<?=$data->id?>)"  class="btn btn-primary">Verifikasi Pinjam</a>
				</div>
			</div>
		</div>
	</div>