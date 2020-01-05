    <!-- Main css -->
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
            <form method="POST" id="signup-form" class="signup-form">
                <h3>
                    <span class="icon"><i class="ti-user"></i></span>
                    <span class="title_text">Personal</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Personal Informaltion: </span>
                        <span class="step-number">Step 1 / 3</span>
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
                        <div class="chiller_cb">
                            <input id="peng_rptra" name="pekerjaan" type="checkbox">
                            <label for="peng_rptra">Pengelola RPTRA, Kelurahan</label>
                            <span></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="pengelola" id="isi_peke1" disabled/>
                        </div>

                        <div class="chiller_cb">
                            <input id="peng_pkk" name="pekerjaan" type="checkbox">
                            <label for="peng_pkk">Tim Penggerak/Pengelola PKK, Kelurahan</label>
                            <span></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="tim_penggerak" id="isi_peke2" disabled/>
                        </div>

                        <div class="chiller_cb">
                            <input id="lainnya" name="pekerjaan" type="checkbox">
                            <label for="lainnya">Lainnya</label>
                            <span></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lainnya" id="isi_peke3" disabled/>
                        </div>
                    </fieldset>

                    <h3>
                        <span class="icon"><i class="ti-email"></i></span>
                        <span class="title_text">Contact</span>
                    </h3>
                    <fieldset>
                        <legend>
                            <span class="step-heading">Contact Informaltion: </span>
                            <span class="step-number">Step 2 / 3</span>
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
                    </fieldset>

                    <h3>
                        <span class="icon"><i class="ti-star"></i></span>
                        <span class="title_text">Offical</span>
                    </h3>
                    <fieldset>
                        <legend>
                            <span class="step-heading">Offical Informaltion: </span>
                            <span class="step-number">Step 3 / 3</span>
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
                            <label for="sim_sukarela" class="form-label required">Penyetoran pertama anggota baru yang terdiri dari :</label>
                            <label for="department" class="form-label">- Simpanan Pokok : Rp 1.000.000 (dibayar 1x selama menjadi anggota)</label>
                            <label for="department" class="form-label">- Simpanan Wajib : Rp 25.000 (dibayar perbulan)</label>
                            <label for="department" class="form-label">- Simpanan Sukarela : Rp 25.000 (dibayar perbulan minimal Rp 10.000)</label>
                            <input type="number" name="sim_sukarela" id="sim_sukarela" placeholder="Simpanan Sukarela" />
                        </div>
                        <div class="form-group">
                            <label for="pembayaran" class="form-label required">Yang sudah dibayarkan secara :</label>
                            <div class="funkyradio">
                                <div class="funkyradio-danger">
                                    <input type="radio" name="pembayaran" id="lunas"/>
                                    <label for="lunas">Lunas</label>
                                </div>
                                <div class="funkyradio-danger">
                                    <input type="radio" name="pembayaran" id="cicil" />
                                    <label for="cicil">Cicil</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metode_pem" class="form-label required">Metode pembayaran melalui :</label>
                            <div class="funkyradio">
                                <div class="funkyradio-danger">
                                    <input type="radio" name="metode_pem" id="petugas"/>
                                    <label for="petugas">Petugas unit simpan pinjam</label>
                                </div>
                                <div class="funkyradio-danger">
                                    <input type="radio" name="metode_pem" id="transfer" />
                                    <label for="transfer">Transfer ke <b>Bank DKI dengan No Rekening 108-13-17099-8</b></label>
                                </div>
                            </div>
                            <input type="number" name="sebesar" id="sebesar" placeholder="Sebesar" />
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
        <div class="footer">

        </div>

        <!-- JS -->
        