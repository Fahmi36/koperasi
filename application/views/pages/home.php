<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalpengeluaranpinjam->pinjam+$totalpengeluaran->simpan)),3)))?></span></h2>
                        <p>Total Pengeluaran</p>
                    </div>
                    <div class="sparkline-bar-stats1"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalprofit->profit)),3)))?></span></h2>
                        <p>Profit</p>
                    </div>
                    <div class="sparkline-bar-stats2"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
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
                    <div class="sparkline-bar-stats3"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>Rp. <span><?=strrev(implode('.',str_split(strrev(strval($totalsimpan->simpan)),3)))?></span></h2>
                        <p>Total Simpanan</p>
                    </div>
                    <div class="sparkline-bar-stats4"><canvas width="58" height="36" style="display: inline-block; width: 58px; height: 36px; vertical-align: top;"></canvas></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 mg-tb-30">
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
                                                        <?php }else{ ?>
                                                            <td>
                                                             <?php if ($key->status == 0){ ?> 
                                                                <button onclick="terimasimpan(<?=$key->id?>)" class="btn btn-info notika-btn-success waves-effect"><i class="fa fa-check-square"></i></button>
                                                                <button onclick="tolaksimpan(<?=$key->id?>)" class="btn btn-info notika-btn-danger waves-effect"><i class="fa fa-window-close"></i></button>
                                                                <button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="fa fa-info-circle"></i></button>
                                                            <?php }else{ ?>
                                                                <button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="fa fa-info-circle"></i></button>
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
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                    <div class="past-day-statis">
                        <h2>Data dalam 1 tahun</h2>
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">320,000</span></h3>
                            <p>Perhari</p>
                        </div>
<!--                         <div class="past-statistic-graph">
                            <div class="stats-bar"><canvas width="68" height="35"></canvas></div>
                        </div> -->
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">103,000</span></h3>
                            <p>Perminggu</p>
                        </div>
<!--                         <div class="past-statistic-graph">
                            <div class="stats-line"><canvas width="68" height="35"></canvas></div>
                        </div> -->
                    </div>
                    <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">700,000</span></h3>
                            <p>Perbulan</p>
                        </div>
                       <!--  <div class="past-statistic-graph">
                            <div class="stats-bar-2"><canvas width="68" height="35"></canvas></div>
                        </div> -->
                    </div>
                     <div class="past-statistic-an">
                        <div class="past-statistic-ctn">
                            <h3><span class="counter">1,400,000</span></h3>
                            <p>Pertahun</p>
                        </div>
<!--                         <div class="past-statistic-graph">
                            <div class="stats-line"><canvas width="68" height="35"></canvas></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="modalsimpan"></div>
    </div>
</div>