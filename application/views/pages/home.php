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
                                    <h2>Halaman Beranda</h2>
                                    <p>Beranda KOPERASI PKK MELATI JAYA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->session->userdata('username') == null){ ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalsimpan->simpan)),3)))?></span></h2>
                            <p>Total Simpanan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($simpananwajib->simpan)),3)))?></span></h2>
                            <p>Simpanan Wajib</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php if ($belumbayar->nunggak == null){
                                $nunggak = 0;
                            }else{
                                $nunggak = $belumbayar->nunggak;
                            } ?>
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($nunggak)),3)))?></span></h2>
                            <p>Total Sisa Hutang</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php if (@$tgltempo->tgl_tempo != null){ ?>
                                <h2><span><?=date('d F Y',strtotime($tgltempo->tgl_tempo))?></span></h2>
                            <?php }else{ ?>
                                <h2><span>Tidak ada pinjaman</span></h2>
                            <?php } ?>
                            <p>Jatuh Tempo Pembayaran</p>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalpengeluaranpinjam->pinjam+$totalpengeluaran->simpan)),3)))?></span></h2>
                            <p>Total Pengeluaran</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalprofit->profit)),3)))?></span></h2>
                            <p>Profit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php if ($belumbayar->nunggak == null){
                                $nunggak = 0;
                            }else{
                                $nunggak = $belumbayar->nunggak;
                            } ?>
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($nunggak)),3)))?></span></h2>
                            <p>Total Uang Mengendap</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalsimpan->simpan)),3)))?></span></h2>
                            <p>Total Simpanan</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mg-tb-30">
                <div class="invoice-wrap">
                    <div class="invoice-img" style="padding: 30px 0;background-color: #faf7f2;">
                        <h3 style="text-transform: uppercase;color: #555;margin-bottom: 0;">Data Keseluruhan</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="datatransaksi" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No Tiket</th>
                                                <th>Nama Anggota</th>
                                                <th>Jenis Simpan</th>
                                                <th>Jenis Transaksi</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($simpanan as $key): ?>
                                                <tr>
                                                    <td><?=$key->id?></td>
                                                    <td><?=$key->nama?></td>
                                                    <td><?=$key->jenis_setoran?></td>
                                                    <?php if ($key->tipe_transaksi == 0){ ?> 
                                                        <td>Penarikan</td>
                                                    <?php }else{ ?>
                                                        <td>Simpanan</td>
                                                    <?php }?>
                                                    <?php if ($key->status == 0){ ?> 
                                                        <td>Belum Di ACC Pembayaran</td>
                                                    <?php }else if ($key->status == 1){ ?>
                                                        <td>Sudah Masuk</td>
                                                    <?php }else if ($key->status == 2){  ?>
                                                        <td>Di Tolak</td>
                                                    <?php }?>
                                                    <td>Rp. <?=number_format($key->saldo_akhir,0,',','.')?></td>
                                                    <td><?=$key->tgl_transaksi?></td>
                                                    <?php if($this->session->userdata('username') == null){ ?>
                                                        <td><button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="fa fa-info-circle"></i></button></td>
                                                        <?php if ($key->status == 1): ?>
                                                            <td><a href="<?=site_url('cetak_simpanan/'.$key->id)?>" class="btn btn-default notika-btn-default waves-effect"><i class="fa fa-print"></i></a></td>
                                                        <?php endif ?>
                                                    <?php }else{ ?>
                                                        <td>
                                                         <?php if ($key->status == 0){ ?> 
                                                            <button onclick="terimasimpan(<?=$key->id?>)" class="btn btn-success notika-btn-success waves-effect"><i class="fa fa-check-square"></i></button>
                                                            <button onclick="tolaksimpan(<?=$key->id?>)" class="btn btn-danger notika-btn-danger waves-effect"><i class="fa fa-window-close"></i></button>
                                                            <button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="fa fa-info-circle"></i></button>
                                                        <?php }else{ ?>
                                                            <button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="fa fa-info-circle"></i></button>
                                                            <a href="<?=site_url('cetak_simpanan/'.$key->id)?>" class="btn btn-default notika-btn-default waves-effect"><i class="fa fa-print"></i></a>
                                                        <?php } ?>
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
<!--             <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="past-day-statis">
                        <h2>Data dalam 1 tahun</h2>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">320,000</span></h3>
                            <p>Perhari</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-bar"><canvas width="68" height="35"></canvas></div>
                        </div>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">103,000</span></h3>
                            <p>Perminggu</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-line"><canvas width="68" height="35"></canvas></div>
                        </div>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">700,000</span></h3>
                            <p>Perbulan</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-bar-2"><canvas width="68" height="35"></canvas></div>
                        </div>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">1,400,000</span></h3>
                            <p>Pertahun</p>
                        </div>
                        <div class="past-statistic-graph">
                            <div class="stats-line"><canvas width="68" height="35"></canvas></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div id="modalsimpan"></div>
    </div>
</div>
<?php if($this->session->userdata('username') == null): ?>
    <?php if ($user->no_rek == null): ?>
        <div class="modal fade" id="resetPass" role="dialog" data-backdrop="static" data-keyboard="false" style="overflow: auto;">
          <div class="modal-dialog modals-default">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="step-form">
                  <form method="post" action="javascript:void(0)" id="ubahrekening">
                    <div class="step-form__progress">
                      <span class="step-form__progress-step" role="presentation"></span>
                      <span class="step-form__progress-step" role="presentation"></span>
                      <span class="step-form__progress-step" role="presentation"></span>
                  </div>
                  <div class="step-form__step">
                      <h2 style="text-align: left;font-weight: 300;margin-bottom: 30px;">Anda harus merubah <b>kata sandi</b> default dengan <b>kata sandi</b> yang anda inginkan</h2>
                      <div class="form-group">
                        <label style="float: left;">Kata Sandi</label>
                        <div class="nk-int-st">
                          <input type="password" id="katasandi" name="sandi" class="form-control input-sm step-form__input" placeholder="Masukkan Kata Sandi">
                      </div>
                  </div>
                  <div class="form-group">
                    <label style="float: left;">Konfirmasi Kata Sandi</label>
                    <div class="nk-int-st">
                      <input type="password" id="ulangsandi" name="ulang_sandi" oninput="cekPass()" class="form-control input-sm step-form__input" placeholder="Masukkan Konfirmasi Kata Sandi">
                  </div>
              </div>
              <label class="pesan"></label> 
          </div>
          <div class="step-form__step">
              <div id="sudahPunya">
                <h4 style="margin-bottom: 30px;">Masukan Nomor Rekening Bank DKI</h4>
                <div class="form-group" id="formNorek">
                  <label style="float: left;">Nomor Rekening</label>
                  <div class="nk-int-st">
                    <input type="number" id="norek" name="norek" class="form-control input-sm step-form__input" placeholder="Masukkan Nomor Rekening">
                </div>
            </div>
            <p id="belum" style="text-align: left;">Belum memiliki nomor rekening bank dki? <a href="#" style="font-weight: 600!important;text-decoration: none;color: #395599;" id="daftarRek">Klik Disini</a></p>
        </div>
        <div id="belumPunya" style="display: none;">
            <h4 style="margin-bottom: 30px;">Silahkan ke PKK Melati Jaya untuk pembuatan nomor rekening Bank DKI</h4>
            <img class="img-thumbnail" src="<?php echo base_url('assets/img/bank/bank1.jpeg'); ?>" style="margin-bottom: 20px;">
            <img class="img-thumbnail" src="<?php echo base_url('assets/img/bank/bank2.jpeg'); ?>">
            <p style="text-align: left;margin-top: 25px;">Sudah memiliki nomor rekening bank dki? <a href="#" style="font-weight: 600!important;text-decoration: none;color: #395599;" id="inputNorek">Klik Disini</a></p>
        </div>
    </div>
    <div class="step-form__step">
      <h1>Terima Kasih <i class="notika-icon notika-checked"></i></h1>
      <input class="step-form__input" style="display: none;">
  </div>
  <div class="step-form__action">
      <button type="button" class="step-form__button waves-effect" data-action="prev"><i class="notika-icon notika-back"></i> Previous</button>
      <button type="button" id="next" class="step-form__button step-form__button--active" data-action="next">Next <i class="notika-icon notika-next-pro"></i></button>
      <button class="step-form__button" type="submit" data-action="submit">Submit</i></button>
  </div>
</form>
</div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<?php endif ?>
<?php endif ?>