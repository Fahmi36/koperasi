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
					<!-- <form id="frmCustom" method="post" action="javascript:;">
						<div class="row">
							<div class="col-lg-4">
								<label>Mulai tanggal</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
									<input autocomplete="off" type="text" id="awal" value="<?php echo date('Y-m-d') ?>" class="form-control dateAwal" name="awal" placeholder="Dari Tanggal">
								</div>
							</div>
							<div class="col-lg-4">
								<label>Sampai tanggal</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
									<input autocomplete="off" type="text" id="akhir" value="<?php echo date('Y-m-d') ?>" class="form-control dateAkhir" name="akhir" placeholder="Ke Tanggal">
								</div>
							</div>
							<div class="col-md-4">
								<button type="submit" class="btn btn-warning notika-btn-warning waves-effect" style="margin-top: 26px;">Cari</button>
							</div>
						</div>
					</form> -->
					<div class="data-table-list" style="padding-left: 0;padding-right: 0;">
						<div class="table-responsive">
							<table id="datareport" class="table table-striped">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jumlah Total Simpanan Wajib</th>
										<th>Jumlah Total Simpanan Sukarela</th>
										<th>Jumlah Total Pinjaman (Sudah Selesai)</th>
										<th>Total Jasa</th>
										<th>Jumlah Total Cicilan</th>
										<th>Jumlah Total Simpanan (Wajib dan Sukarela)</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($anggota as $key): ?>
										<tr>
											<td><?=$key->nama?></td>
											<?php if ($this->mm->getSimpananWajib($key->id_anggota)==null){ ?>
												<td>Rp. 0</td>
											<?php }else{ ?>
											<td>Rp. <?=strrev(implode('.',str_split(strrev(strval($this->mm->getSimpananWajib($key->id_anggota))),3)))?></td>
											<?php } ?>

											<?php if ($this->mm->getSimpananSukarela($key->id_anggota)==null){ ?>
												<td>Rp. 0</td>
											<?php }else{ ?>
											<td>Rp. <?=strrev(implode('.',str_split(strrev(strval($this->mm->getSimpananSukarela($key->id_anggota))),3)))?></td>
											<?php } ?>

											<?php if ($this->mm->getReportPinjaman($key->id_anggota)!=null){ ?>
											<td>Rp. <?= strrev(implode('.',str_split(strrev(strval($this->mm->getReportPinjaman($key->id_anggota))),3)))?>
												</td>
											<?php }else{ ?>
												<td>Rp. 0</td>
											<?php } ?>

											<?php if ($this->mm->getReportjasa($key->id_anggota)!=null){ ?>
											<td>Rp. <?= strrev(implode('.',str_split(strrev(strval($this->mm->getReportjasa($key->id_anggota))),3)))?>
												</td>
											<?php }else{ ?>
												<td>Rp. 0</td>
											<?php } ?>

											<?php if ($this->mm->getReportHutang($key->id_anggota)!=null){ ?>
											<td>Rp. <?= strrev(implode('.',str_split(strrev(strval($this->mm->getReportHutang($key->id_anggota))),3)))?>
												</td>
											<?php }else{ ?>
												<td>Rp. 0</td>
											<?php } ?>

											<?php if ($this->mm->getSimpananSukarela($key->id_anggota)!=null AND $this->mm->getSimpananWajib($key->id_anggota)!=null){ ?>
											<td>Rp. <?= strrev(implode('.',str_split(strrev(strval($this->mm->getSimpananWajib($key->id_anggota) + $this->mm->getSimpananSukarela($key->id_anggota))),3)))?>
												</td>
											<?php }else{ ?>
												<td>Rp. 0</td>
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
			<div id="modalcicil"></div>
		</div>
	</div>