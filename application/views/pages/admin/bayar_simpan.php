<div class="form-element-area">
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="invoice-wrap">
                    <div class="invoice-img" style="padding: 30px 0;background-color: #3a53c4;">
                        <h3 style="text-transform: uppercase;color: #fff;margin-bottom: 0;">Selamat Datang</h3>
                    </div>
                    <div class="row">
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
                                                            <button onclick="terimasimpan(<?=$key->id?>)" class="btn btn-success notika-btn-success waves-effect"><i class="notika-icon notika-checked"></i></button>
                                                            <button onclick="tolaksimpan(<?=$key->id?>)" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg waves-effect"><i class="notika-icon notika-close"></i></button>
                                                            <button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="notika-icon notika-menus"></i></button>
                                                        <?php }else{ ?>
                                                            <button onclick="infosimpan(<?=$key->id?>)" class="btn btn-info notika-btn-info waves-effect"><i class="notika-icon notika-menus"></i></button>
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