<!-- start contact section -->
<section id="aa-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-contact-area">
                    <div class="aa-contact-top">
                        <h2>Profil Anda</h2>
                        <p>Tukarkan point anda untuk mendapatkan potongan harga...</p>
                    </div>
                    <div class="aa-contact-address">
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4">
                                <div class="aa-contact-address-right">
                                    <address>
                                        <?php
                                        foreach ($profil as $key => $value) {
                                        ?>

                                            <h4><strong><?= $value->nama_pelanggan ?></strong></h4>
                                            <hr>
                                            <p><span class="fa fa-home"></span><?= $value->alamat ?></p>
                                            <p><span class="fa fa-phone"></span><?= $value->no_telp ?></p>
                                            <p><span>Point</span><?= $value->point ?></p>
                                        <?php
                                        }
                                        ?>
                                    </address>
                                    <a href="<?= base_url('pelanggan/c_katalog') ?>" class="aa-secondary-btn">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>