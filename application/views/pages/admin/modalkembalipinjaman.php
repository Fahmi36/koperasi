<div class="modal fade" id="modalkembalipinjam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modals-defaul">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Di Kembalikan</h5>
			</div>
			<form method="post" action="javascript:void(0)" id="formkembalikanpinjaman" enctype="multipart/form-data" accept-charset="utf-8">
				<div class="modal-body" id="accordion-style-1">
					<div class="form-example-int form-horizental mg-t-15" id="foto">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
									<label class="hrzn-fm">Masukan Alasan Di Kembalikan :</label>
								</div>
								<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
									<div class="nk-int-st">
										<textarea class="form-control" name="keterangan"></textarea>
										<input type="hidden" name="id" value="<?=$id?>" class="form-control">
									</div>
								</div>
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
				title: 'Apakah Keterangan Sudah benar ?',
				text: "Klik Ya",
				type: 'success',
				buttonsStyling: false,
				showCancelButton: true,
				confirmButtonClass: 'btn btn-info',
				cancelButtonClass: 'btn btn-danger',
				confirmButtonText: 'Ya',
				preConfirm: () => { 
					$.ajax({
						url: BASE_URL + 'PinjamController/KembalikanPinjaman',
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