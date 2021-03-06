<style type="text/css">
    .detail-spj .form-group{
        margin-bottom: 0;
        font-size: 14px;
        line-height: 16px;
    }
    .modal-dialog{
        transform: none !important;
    }
</style>
<div class="modal fade" id="showmodalsimpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modals-defaul">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Simpanan Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="detail-spj">
                    <?php foreach($simpan as $data): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Jenis Simpanan</label>
                                </div>
                                <div class="col-md-1" style="max-width: 3.33333%;">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7">
                                    <label><?= $data->jenis_setoran?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Tanggal Simpan</label>
                                </div>
                                <div class="col-md-1" style="max-width: 3.33333%;">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7">
                                    <label><?= date('d F, Y',strtotime($data->tgl_transaksi))?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Status Simpan</label>
                                </div>
                                <div class="col-md-1" style="max-width: 3.33333%;">
                                    <label>:</label>
                                </div>
                                <div class="col-md-7">
                                    <?php if ($data->status == 0){ ?>
                                        <label>Menunggu Persetujuan</label>
                                    <?php }else if ($data->status == 1){?>
                                        <label>Data Telah di Setujui</label>
                                    <?php }else{ ?>
                                        <label>Di tolak oleh petugas</label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if ($data->metode_bayar == 1): ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Metode Bayar</label>
                                    </div>
                                    <div class="col-md-1" style="max-width: 3.33333%;">
                                        <label>:</label>
                                    </div>
                                    <div class="col-md-7">
                                        <label>Melalui Petugas</label>
                                    </div>
                                </div>
                            </div>
                            <?php elseif ($data->metode_bayar == 2): ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Metode Bayar</label>
                                        </div>
                                        <div class="col-md-1" style="max-width: 3.33333%;">
                                            <label>:</label>
                                        </div>
                                        <div class="col-md-7">
                                        <label>Transfer</label>
                                        <img src="<?php echo base_url('assets/images/bukti/').$data->bukti_transfer ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Metode Bayar</label>
                                        </div>
                                        <div class="col-md-1" style="max-width: 3.33333%;">
                                            <label>:</label>
                                        </div>
                                        <div class="col-md-7">
                                        <label>Langsung Dengan Petugas</label>
                                        <img src="<?php echo base_url('assets/images/bukti/').$data->bukti_transfer ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-overlay"></div>