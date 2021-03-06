<div class="form-element-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-credit-card"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>Halaman Bayar Pinjaman</h2>
                                    <p>Data Pinjaman KOPERASI PKK MELATI JAYA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="invoice-wrap">
                    <div class="invoice-img" style="padding: 30px 0;background-color: #faf7f2;">
                        <h3 style="text-transform: uppercase;color: #555;margin-bottom: 0;">Data Pinjaman</h3>
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
                                                    <th>Jumlah Pengajuan</th>
                                                    <th>Jumlah Persetujuan</th>
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
                                                        <td><?=number_format($key->besar_pengajuan_pinjaman,0,',','.')?></td>
                                                        <td><?=number_format($key->besar_persetujuan_pinjaman,0,',','.')?></td>

                                                        <?php if ($key->status_pinjaman == 0){ ?> 
                                                            <td>Di Tolak</td>
                                                        <?php }else if ($key->status_pinjaman == 1){ ?>
                                                            <td>Menunggu Persetujuan</td>
                                                        <?php }else if ($key->status_pinjaman == 2){ ?>
                                                            <td>Sudah di Setujui</td>
                                                        <?php }else if ($key->status_pinjaman == 5){ ?>
                                                            <td>Sudah Di Transfer</td>
                                                        <?php }else if ($key->status_pinjaman == 6){ ?>
                                                            <td>Data Di Kembalikan</td>
                                                        <?php }else if ($key->status_pinjaman == 7){ ?>
                                                            <td>Sudah Di Verifikasi</td>
                                                        <?php }else{ ?>
                                                            <td>Sudah Lunas</td>
                                                        <?php } ?>

                                                        <?php if($this->session->userdata('username') == null){ ?>
                                                            <td>

                                                             <?php if ($key->status_pinjaman == 5){ ?> 
                                                                <a href="<?=site_url('bayar/pinjaman/'.$key->id)?>" target="_blank" data-toggle="tooltip" data-title="Bayar Pinjaman" class="btn btn-primary notika-btn-blue"><i class="notika-icon notika-next"></i></a>
                                                            <?php }else if($key->status_pinjaman == 6){?>
                                                                <a href="<?=site_url('kirim/ulangpinjaman/'.$key->id)?>" target="_blank" data-toggle="tooltip" data-title="Kirim Ulang Pinjaman" class="btn btn-primary notika-btn-blue"><i class="notika-icon notika-right-arrow"></i></a>
                                                            <?php } ?>
                                                                <button data-toggle="tooltip" data-title="Informasi Pinjaman" onclick="infopinjaman(<?=$key->id?>)" class="btn notika-btn-white"><i class="notika-icon notika-menus"></i></button>
                                                            </td>
                                                        <?php }else{ ?>
                                                            <td>
                                                                <?php if ($key->status_pinjaman == 1){ ?> 
                                                                     
                                                                    <?php if ($key->besar_pengajuan_pinjaman > 20000000){ ?>
                                                                        <?php if ($this->session->userdata('level') == '2'): ?>
                                                                            <?php if ($key->status_pinjaman == 7){ ?>
                                                                                <button data-toggle="tooltip" data-title="Setujui Pinjaman" onclick="terimapinjaman(<?=$key->id?>)" class="btn btn-success"><i class="notika-icon notika-checked"></i></button>
                                                                                <button data-toggle="tooltip" data-title="Tolak Pinjaman" onclick="tolakpinjaman(<?=$key->id?>)" class="btn btn-danger"><i class="notika-icon notika-close"></i></button>
                                                                                <button data-toggle="tooltip" data-title="Informasi Pinjaman" onclick="infopinjaman(<?=$key->id?>)" class="btn btn-info"><i class="notika-icon notika-menus"></i></button>
                                                                            <?php }else{ ?>
                                                                                <button data-toggle="tooltip" data-title="Verifikasi Pinjaman" onclick="verifpinjaman(<?=$key->id?>)" class="btn btn-success"><i class="notika-icon notika-checked"></i></button>
                                                                                <button data-toggle="tooltip" data-title="Tolak Pinjaman" onclick="tolakpinjaman(<?=$key->id?>)" class="btn btn-danger"><i class="notika-icon notika-close"></i></button>
                                                                                <button data-toggle="tooltip" data-title="Informasi Pinjaman" onclick="infopinjaman(<?=$key->id?>)" class="btn btn-info"><i class="notika-icon notika-menus"></i></button>
                                                                            <?php } ?>
                                                                        <?php endif ?>
                                                                    <?php }else{ ?>
                                                                        
                                                                         <button data-toggle="tooltip" data-title="Setujui Pinjaman" onclick="terimapinjaman(<?=$key->id?>)" class="btn btn-success"><i class="notika-icon notika-checked"></i></button>
                                                                         <button data-toggle="tooltip" data-title="Tolak Pinjaman" onclick="tolakpinjaman(<?=$key->id?>)" class="btn btn-danger"><i class="notika-icon notika-close"></i></button>
                                                                         <button data-toggle="tooltip" data-title="Informasi Pinjaman" onclick="infopinjaman(<?=$key->id?>)" class="btn btn-info"><i class="notika-icon notika-menus"></i></button>
                                                                   <?php } ?>
                                                            <?php }else if ($key->status_pinjaman == 2){ ?> 
                                                                <button onclick="uploadpinjaman(<?=$key->id?>)" class="btn btn-success" data-toggle="tooltip" data-title="Upload Bukti Transfer"><i class="notika-icon notika-up-arrow"></i></button>
                                                                <button data-toggle="tooltip" data-title="Ulang Pinjaman" onclick="ulangpinjaman(<?=$key->id?>)" class="btn btn-danger"><i class="notika-icon notika-left-arrow"></i></button>
                                                                <button onclick="infopinjaman(<?=$key->id?>)" class="btn btn-info" data-toggle="tooltip" data-title="Informasi Pinjaman"><i class="notika-icon notika-menus"></i></button>
                                                            <?php }else{ ?>
                                                                <button onclick="infopinjaman(<?=$key->id?>)" class="btn btn-info" data-toggle="tooltip" data-title="Informasi Pinjaman"><i class="notika-icon notika-menus"></i></button>
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
 <!--                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="invoice-ds-int">
                                <h2>Remarks</h2>
                                <p>Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. </p>
                            </div>
                            <div class="invoice-ds-int invoice-last">
                                <h2>Notika For Your Business</h2>
                                <p class="tab-mg-b-0">Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="modalpinjam"></div>
    </div>
</div>