<div class="form-element-area">
	<div class="container">
		<div class="row">            
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
				<div class="breadcomb-list">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="breadcomb-wp">
								<div class="breadcomb-icon">
									<i class="notika-icon notika-bar-chart"></i>
								</div>
								<div class="breadcomb-ctn">
									<h2>Halaman Report</h2>
									<p>Report KOPERASI PKK MELATI JAYA</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="invoice-wrap">
					<div class="invoice-img" style="padding: 30px 0;background-color: #3a53c4;margin-bottom: 20px;">
						<h3 style="text-transform: uppercase;color: #fff;margin-bottom: 0;">Halaman Report</h3>
					</div>
					<form id="frmCustom" action="javascript:;">
						<div class="row">
							<div class="col-lg-4">
								<label>Mulai tanggal</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
									<input type="text" id="awal" value="<?php echo date('Y-m-d') ?>" class="form-control dateAwal" name="awal" placeholder="Dari Tanggal">
								</div>
							</div>
							<div class="col-lg-4">
								<label>Sampai tanggal</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
									<input type="text" id="akhir" value="<?php echo date('Y-m-d') ?>" class="form-control dateAkhir" name="akhir" placeholder="Ke Tanggal">
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-warning notika-btn-warning waves-effect" style="margin-top: 26px;">Cari</button>
							</div>
						</div>
					</form>
					<div class="data-table-list" style="padding-left: 0;padding-right: 0;">
						<div class="table-responsive">
							<table id="datapinjaman" class="table table-striped">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jumlah Simpanan</th>
										<th>Jumlah Hutang</th>
										<th>Jumlah Cicilan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rekap as $key): ?>
										<tr>
											<td><?=$key->nama?></td>
											<td><?=$key->jml_hutang?></td>
											<td><?=$key->jml_cicil?></td>
											<td><?=$key->jml_cicil?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="modalcicil"></div>
	</div>
</div>