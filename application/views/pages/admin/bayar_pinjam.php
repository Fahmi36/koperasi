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
                                        <table id="datapinjaman" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Nomor Telpon</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Keperluan</th>
                                                    <th>Angsuran</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($cicilan as $key): ?>
                                                    <tr>
                                                        <td><?=$key->nama?></td>
                                                        <td><?=$key->no_hp?></td>
                                                        <td><?=$key->tgl_pengajuan_pinjaman?></td>
                                                        <td><?=$key->keperluan?></td>
                                                        <td><?=$key->angsuran+1?></td>
                                                        <td>Rp. <?=number_format($key->jumlah_bayar + $key->jasa,0,',','.')?></td>
                                                        <?php if ($key->keterangan != null AND $key->status == 3){ ?>
                                                            <td>Sudah Pernah Di Tolak</td>
                                                        <?php }else if ($key->status == 3){ ?>
                                                            <td>Menunggu Persetujuan</td>
                                                        <?php }else if ($key->status == 8){ ?>
                                                            <td>Sudah Lunas</td>
                                                        <?php } ?>
                                                        <?php if($this->session->userdata('username') != null){ ?>
                                                        <td>
                                                           <?php if ($key->status == 3){ ?> 
                                                            <button data-toggle="tooltip" data-title="Setujui Cicilan" onclick="terimacicilan(<?=$key->id?>)" class="btn btn-success"><i class="notika-icon notika-checked"></i></button>
                                                            <button data-toggle="tooltip" data-title="Tolak Cicilan" onclick="tolakcicilan(<?=$key->id?>)" class="btn btn-danger"><i class="notika-icon notika-close"></i></button>
                                                            <button data-toggle="tooltip" data-title="Informasi Cicilan" onclick="infocicilan(<?=$key->id?>)" class="btn btn-info"><i class="notika-icon notika-menus"></i></button>
                                                       <?php }else{ ?>
                                                            <button onclick="infocicilan(<?=$key->id?>)" class="btn btn-info" data-toggle="tooltip" data-title="Informasi Cicilan"><i class="notika-icon notika-menus"></i></button>
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
<div id="modalcicil"></div>
</div>
</div>