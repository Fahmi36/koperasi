
<div class="modal fade" id="modalreview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modals-defaul">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Angsuran Pinjaman</h5>
            </div>
            <div class="modal-body" id="accordion-style-1">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Angsuran</th>
                            <th>Jasa</th>
                            <th>Jumlah Bayar</th>
                            <th>Jatuh Tempo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($angsuran as $key): ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=number_format($key->jasa,0,',','.')?></td>
                                <td><?=number_format($key->jumlah_bayar,0,',','.')?></td>
                                <td><?=date('d F, Y',strtotime($key->tgl_tempo))?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a onclick="batalPinjam(<?=$key->id_angsuran?>)" class="btn btn-secondary">Batal</a>
                <a onclick="lanjutPinjam(<?=$key->id_angsuran?>)"  class="btn btn-primary">Lanjutkan Pinjam</a>
            </div>
        </div>
    </div>
</div>