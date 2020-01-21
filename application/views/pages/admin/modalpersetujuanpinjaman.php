<div class="modal fade" id="showmodalpinjam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modals-defaul">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Persetujuan Pinjaman</h5>
			</div>
			<form method="post" action="javascript:void(0)" id="formkembalikanpinjaman" enctype="multipart/form-data" accept-charset="utf-8">
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

										<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label>Masukan Jumlah Pinjaman Yang Di Setujui :</label>
							</div>
							<div class="col-md-1" style="max-width: 3.33333%;">
								<label>:</label>
							</div>
							<div class="col-md-7">
								<textarea class="form-control" cols="5" name="jumlah" required=""></textarea>
										<input type="hidden" name="id" value="<?=$id?>" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-secondary">Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#formkembalikanpinjaman").submit(function (event) {
			var data = new FormData($(this)[0]);
			Swal.fire({
				title: 'Apakah Jumlah Nominal Sudah benar ?',
				text: "Klik Ya",
				type: 'success',
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonClass: 'btn btn-info',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'Ya',
				preConfirm: () => { 
					$.ajax({
						url: BASE_URL + 'PinjamController/TerimaPinjaman',
						type: "POST",
						dataType:'json',
						data: data,
						contentType: false,
						cache: false,
						processData: false,
						beforeSend:function(argument) {
							$(".loader-overlay").removeAttr('style');
						},
						success: function (response) {
							if (response.success == false) {
								Swal.fire(
									''+response.msg+'',
									);
							}else{
								Swal.fire(
									'Berhasil Kembalikan Pinjaman',
									);
								location.reload();
							}

						},
						error: function () {
							Swal.fire(
								'"'+response.msg+'"',
								'Hubungi Tim Terkait',
								);
						}
					});
				}
			});
		});
</script>