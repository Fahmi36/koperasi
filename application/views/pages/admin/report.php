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
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>Rp. <span>12. 0000</span></h2>
                        <p>Data Hari Ini</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2>Rp. <span>12. 0000</h2>
                            <p>Data Minggu Ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span>12. 0000</span></h2>
                            <p>Data Bulan Ini</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2>Rp. <span>12. 0000</span></h2>
                            <p>Data Tahun Ini</p>
                        </div>
                    </div>
                </div>
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
                                                <?php foreach ($report as $key): ?>
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

    </div>
    <div id="modalsimpan"></div>
</div>
</div>