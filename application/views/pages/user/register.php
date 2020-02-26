<link rel="stylesheet" href="https://colorlib.com/etc/bwiz/colorlib-wizard-11/css/style.css">
<link rel="stylesheet" href="https://colorlib.com/etc/bwiz/colorlib-wizard-11/fonts/themify-icons/themify-icons.css">
<style type="text/css">
    body{
        background-color: #faf7f2;
        font-family: 'Roboto', sans-serif;
    }
    .current .title {
        background-color: #3a53c4;
    }
    .actions ul li a {
        background-color: #3a53c4;
    }
</style>
<center><a href="<?php echo site_url(''); ?>"><img class="img-logo" src="<?php echo base_url('assets/img/logo/logo_.png'); ?>" alt="" width="370" style="margin-top: 20px;"/></a></center>
<div class="main">
    <div class="container">
        <h2>Form Pendaftaran Menjadi Anggota <br>Koperasi PKK Melati Jaya</h2>
        <form action="javascript:void(0)" method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data" accept-charset="utf-8">
            <h3>
                <span class="icon"><i class="ti-user"></i></span>
                <span class="title_text text-center">Informasi <br>Pribadi</span>
            </h3>
            <fieldset>
                <legend>
                    <span class="step-heading">Informasi Pribadi: </span>
                    <span class="step-number">Langkah 1 / 3</span>
                </legend>
                <div class="form-group">
                    <label for="nama_lengkap" class="form-label required">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" />
                </div>

                <div class="form-group">
                    <label for="tempat_lahir" class="form-label required">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" />
                </div>

                <div class="form-row">
                    <div class="form-date">
                        <label for="tanggal_lahir" class="form-label required">Tanggal Lahir</label>
                        <div class="form-date-group">
                            <div class="form-date-item">
                                <select id="birth_date" name="birth_date"></select>
                                <span class="select-icon"><i class="ti-angle-down"></i></span>
                            </div>
                            <div class="form-date-item">
                                <select id="birth_month" name="birth_month"></select>
                                <span class="select-icon"><i class="ti-angle-down"></i></span>
                            </div>
                            <div class="form-date-item">
                                <select id="birth_year" name="birth_year"></select>
                                <span class="select-icon"><i class="ti-angle-down"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pekerjaan" class="form-label required">Pekerjaan</label>
                    <div class="form-date-group">
                        <div class="form-date-item" style="width: 100%;">
                            <select id="pekerjaan" name="pekerjaan" style="width: 100%;">
                                <option value="PKK">PKK (Pemberdayaan & Kesejahteraan Keluarga)</option>
                                <option value="Pengelola RPTRA">Pengelola RPTRA</option>
                                <option value="PLJP">PJLP (Penyedia Jasa Lainnya Orang Perorangan)</option>
                                <option value="ASN">ASN (Aparatur Sipil Negara)</option>
                                <option value="PKT">PKT (Pengembangan Kawasan Terpadu)</option>
                                <option value="lainnya">Lainnya (Pengembangan Kawasan Terpadu)</option>
                            </select>
                            <span class="select-icon"><i class="ti-angle-down"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pekerjaan" class="form-label required">Kota / Kabupaten</label>
                    <div class="form-date-group">
                        <div class="form-date-item" style="width: 100%;">
                            <select id="kota" name="kota" onchange="getKota()" style="width: 100%;">
                                <option value="" >-- SILAHKAN PILIH KOTA / KABUPATEN --</option>
                                <option value="" disabled></option>
                                <?php foreach ($wal as $key): ?>
                                    <option value="<?= $key->id; ?>"><?= $key->name; ?></option>
                                <?php endforeach ?>
                            </select>
                            <span class="select-icon"><i class="ti-angle-down"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pekerjaan" class="form-label required">Kecamatan</label>
                    <div class="form-date-group">
                        <div class="form-date-item" style="width: 100%;">
                            <select id="kec" name="kecamatan" onchange="getKec()" style="width: 100%;">
                                <option value="" >-- SILAHKAN PILIH KECAMATAN TERLEBIH DAHULU --</option>
                                <option value="" disabled></option>
                                
                            </select>
                            <input type="hidden" id="namaKec" name="kecamatan">
                            <span class="select-icon"><i class="ti-angle-down"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pekerjaan" class="form-label required">Kelurahan</label>
                    <div class="form-date-group">
                        <div class="form-date-item" style="width: 100%;">
                            <select id="kel" name="kelurahan" style="width: 100%;">
                                <option value="" >-- SILAHKAN PILIH KELURAHAN TERLEBIH DAHULU --</option>
                                <option value="" disabled></option>
                            </select>
                            <span class="select-icon"><i class="ti-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="chiller_cb">
                    <input id="peng_rptra" name="radiopengrptra" value="Pengelola RPTRA" type="chec">
                    <label for="peng_rptra">Pengelola RPTRA, Kelurahan</label>
                    <span></span>
                </div>
                <div class="form-group">
                    <input type="text" name="pengelola" id="isi_peke1" disabled/>
                </div>

                <div class="chiller_cb">
                    <input id="peng_pkk" name="radiotpngpkk" value="Tim Penggerak/Pengelola PKK" type="radio">
                    <label for="peng_pkk">Tim Penggerak/Pengelola PKK, Kelurahan</label>
                    <span></span>
                </div>
                <div class="form-group">
                    <input type="text" name="tim_penggerak" id="isi_peke2" disabled/>
                </div>

                <div class="chiller_cb">
                    <input id="lainnya" name="radiolainnya" value="lainnya" type="radio">
                    <label for="lainnya">Lainnya</label>
                    <span></span>
                </div> -->
                <div class="form-group" id="input-lainnya">
                    <input type="text" name="lainnya" id="" placeholder="Masukkan Pekerjaan Lainnya" />
                </div>
            </fieldset>

            <h3>
                <span class="icon"><i class="ti-email"></i></span>
                <span class="title_text">Kontak</span>
            </h3>
            <fieldset>
                <legend>
                    <span class="step-heading">Informasi Kontak: </span>
                    <span class="step-number">Langkah 2 / 3</span>
                </legend>
                <div class="form-group">
                    <label for="alamat" class="form-label required">Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat"/>
                </div>

                <div class="form-group">
                    <label for="no_ktp" class="form-label required">Nomor Identitas (KTP/SIM)</label>
                    <input type="number" name="no_ktp" id="no_ktp" />
                </div>


                <div class="form-row">
                    <div class="form-group">
                        <label for="no_rumah" class="form-label">No Telpon (Rumah)</label>
                        <input type="number" name="no_rumah" id="no_rumah" />
                    </div>

                    <div class="form-group">
                        <label for="no_hp" class="form-label required">No Telpon (Handphone)</label>
                        <input type="number" name="no_hp" id="no_hp" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="rek_dki" class="form-label required">Sudah Memiliki Nomor Rekening (DKI) ?</label>
                    <div class="form-date-group">
                        <div class="form-date-item" style="width: 100%;">
                            <select id="rek_dki" name="rek_dki" onchange="rekdki(this)" style="width: 100%;">
                                <option option value='-' readonly='' selected>Pilih Salah Satu</option>
                                <option value="Sudah Punya">Sudah Punya</option>
                                <option value="Belum Punya">Belum Punya</option>
                            </select>
                            <span class="select-icon"><i class="ti-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div style="display: none;" id="punya_rek">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="no_rek" class="form-label">Nomor Rekening (DKI)</label>
                            <input type="number" name="no_rek" id="no_rek" />
                        </div>
                        <div class="form-group">
                            <label for="no_kartu" class="form-label">Nomor Kartu (DKI)</label>
                            <input type="number" name="no_kartu" id="no_kartu" onKeyPress="if(this.value.length==16) return false;" />
                        </div>
                        <!-- <div class="form-group">
                            <label for="cvv" class="form-label">Nama Bank</label>
                            <input type="text" name="nama_bank" />
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="cvv" class="form-label required">CVV</label>
                            <input type="number" name="cvv" id="cvv" onKeyPress="if(this.value.length==3) return false;" />
                        </div> -->
                    </div>
                </div>
            </fieldset>

            <h3>
                <span class="icon"><i class="ti-star"></i></span>
                <span class="title_text">Syarat</span>
            </h3>
            <fieldset>
                <legend>
                    <span class="step-heading">Informasi Syarat: </span>
                    <span class="step-number">Langkah 3 / 3</span>
                </legend>
                <p>Dengan ini mengajukan permohonan unutuk menjadi anggota Koperasi PKK MELATI JAYA. Saya bersedia mentaati Anggaran Dasar, Anggaran Rumah Tangga, Kebijakan Pengurus serta peraturan lainnya yang belaku pada koperasi PKK MELATI JAYA dengan penuh tanggung jawab.</p>
                <h5>Bersama Formulir permohonan ini, saya sertakan :</h5>

                <div class="form-group">
                    <label for="file_fotocopy" class="form-label required">Fotocopy KTP/SIM</label>
                    <input type="file" name="file_fotocopy" id="file_fotocopy" />
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="foto_1" class="form-label required">Foto Berwarna 3x4</label>
                        <input type="file" name="foto_1" id="foto_1" />
                    </div>

                    <div class="form-group">
                        <label for="foto_2" class="form-label required">Foto Berwarna 2x3</label>
                        <input type="file" name="foto_2" id="foto_2" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="sim_sukarela" class="form-label">Penyetoran pertama anggota baru yang terdiri dari :</label>
                    <label for="department" class="form-label">- Simpanan Pokok : Rp 1.000.000 (dibayar 1x selama menjadi anggota)</label>
                    <label for="department" class="form-label">- Simpanan Wajib : Rp 25.000 (dibayar perbulan)</label>
                    <label for="department" class="form-label">- Simpanan Sukarela : ...... (dibayar perbulan minimal Rp 10.000)</label>
                    <input type="text" name="sim_sukarela" id="sim_sukarela" class="rupiah" placeholder="Jumlah Simpanan Sukarela yang ingin dibayarkan" data-a-sign="Rp. " data-a-dec="," data-a-sep="."/>
                </div>
                <div class="form-group">
                    <label for="pembayaran" class="form-label required">Yang sudah dibayarkan secara :</label>
                    <div class="funkyradio">
                        <div class="funkyradio-danger">
                            <input type="radio" name="pembayaran" value="1" id="lunas"/>
                            <label for="lunas">Lunas</label>
                        </div>
                        <div class="funkyradio-danger">
                            <input type="radio" name="pembayaran" value="0" id="cicil" />
                            <label for="cicil">Cicil</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="metode_pem" class="form-label required">Metode pembayaran melalui :</label>
                    <div class="funkyradio">
                        <div class="funkyradio-danger">
                            <input type="radio" name="metode_pem" value="1" id="petugas"/>
                            <label for="petugas">Petugas unit simpan pinjam</label>
                        </div>
                        <div class="funkyradio-danger">
                            <input type="radio" name="metode_pem" value="2" id="transfer" />
                            <label for="transfer">Transfer ke <b>Bank DKI dengan No Rekening 108-13-17099-8</b></label>
                        </div>
                        <div class="form-group" id="buktitf" style="display: none;">
                            <label for="foto_tf" class="form-label required" style="border:none;">Foto Bukti Transfer</label>
                            <input type="file" name="foto_tf" id="foto_tf" />
                        </div>
                    </div>
                    <input type="text" name="sebesar" id="sebesar" class="rupiah" placeholder="Sebesar" data-a-sign="Rp. " data-a-dec="," data-a-sep="."/>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<div class="modal fade in" role="dialog" id="rekening" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modals-default">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div>
                    <h4 style="margin-bottom: 30px;">Silahkan ke PKK Melati Jaya untuk pembuatan nomor rekening Bank DKI</h4>
                    <img class="img-thumbnail" src="<?php echo base_url('assets/img/bank/bank1.jpeg'); ?>" style="margin-bottom: 20px;">
                    <img class="img-thumbnail" src="<?php echo base_url('assets/img/bank/bank2.jpeg'); ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default waves-effect btn-block" data-dismiss="modal" style="margin-top: 20px;">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<div class="footer">

</div>