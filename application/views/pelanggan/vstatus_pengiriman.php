<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="<?= base_url('asset/gambar/roti_mm.png') ?>" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Status Pemesanan</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Status Pemesanan</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->
<!-- Cart view section -->
<!-- Cart view section -->
<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout-left">
                                <div class="panel-group" id="accordion">
                                    <!-- Coupon section -->
                                    <h2>Status Pemesanan</h2>
                                    <div class="panel panel-default aa-checkout-coupon">

                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Order Menunggu Konfirmasi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <?php
                                                $tot = 0;
                                                foreach ($menunggu as $key => $value) {
                                                    $tot = $tot + $value->total_bayar;
                                                }
                                                if ($tot == 0) {

                                                ?>
                                                    <img style="width: 300px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('asset/gambar/null.png') ?>">
                                                    <?php
                                                } else {
                                                    foreach ($menunggu as $key => $value) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p class="text-default">
                                                                    <i class="fa fa-barcode" aria-hidden="true"></i> No Order: <strong><?= $value->id_transaksi ?></strong><br>
                                                                    <i class="fa fa-user-o" aria-hidden="true"></i> Atas Nama: <?= $value->nama_penerima ?><br>
                                                                    Alamat Tujuan: <?= $value->alamat ?><br>

                                                                    <span class="label label-warning">Menunggu Dikonfirmasi <?= $value->time ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 ml-auto text-right">
                                                                Date/Time: <br><strong><?= $value->tgl_order ?></strong><br>
                                                                <i class="fa fa-tags" aria-hidden="true"></i> Total Bayar: <br><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-danger"><a href="<?= base_url('Pelanggan/c_katalog/detail_pemesanan/' . $value->id_transaksi) ?>">Detail</a></button>
                                                        <button class="btn btn-danger"><a href="<?= base_url('Pelanggan/c_katalog/batal_pemesanan/' . $value->id_transaksi) ?>">Batalkan Pemesanan</a></button>
                                                        <hr>

                                                <?php
                                                    }
                                                }
                                                ?>



                                            </div>
                                        </div>
                                    </div>
                                    <!-- Login section -->
                                    <div class="panel panel-default aa-checkout-login">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <i class="fa fa-sticky-note" aria-hidden="true"></i> Order Diproses
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php
                                                $tot2 = 0;
                                                foreach ($proses as $key => $value) {
                                                    $tot2 = $tot2 + $value->total_bayar;
                                                }
                                                if ($tot2 == 0) {
                                                ?>
                                                    <img style="width: 300px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('asset/gambar/null.png') ?>">
                                                <?php
                                                } else {
                                                ?>
                                                    <?php
                                                    foreach ($proses as $key => $value) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p class="text-default">
                                                                    <i class="fa fa-barcode" aria-hidden="true"></i> No Order: <strong><?= $value->id_transaksi ?></strong><br>
                                                                    <i class="fa fa-user" aria-hidden="true"></i> Atas Nama: <?= $value->nama_penerima ?><br>
                                                                    <i class="fa fa-truck" aria-hidden="true"></i> Alamat Tujuan: <?= $value->alamat ?><br>
                                                                    <span class="label label-info">Sedang Dikemas <?= $value->time ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 ml-auto text-right">
                                                                Date/Time: <br><strong><?= $value->tgl_order ?></strong><br>
                                                                <i class="fa fa-tags" aria-hidden="true"></i> Total Bayar: <br><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('Pelanggan/c_katalog/detail_pemesanan/' . $value->id_transaksi) ?>" class="aa-secondary-btn">VIEW</a>
                                                        <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Billing Details -->
                                    <div class="panel panel-default aa-checkout-billaddress">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    <i class="fa fa-truck" aria-hidden="true"></i> Order Sedang Dikirim
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php
                                                $tot3 = 0;
                                                foreach ($dikirim as $key => $value) {
                                                    $tot3 = $tot3 + $value->total_bayar;
                                                }
                                                if ($tot3 == 0) {
                                                ?>
                                                    <img style="width: 300px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('asset/gambar/null.png') ?>">
                                                    <?php
                                                } else {
                                                    foreach ($dikirim as $key => $value) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p class="text-default">
                                                                    <i class="fa fa-barcode" aria-hidden="true"></i> No Order: <strong><?= $value->id_transaksi ?></strong><br>
                                                                    <i class="fa fa-user" aria-hidden="true"></i> Atas Nama: <?= $value->nama_penerima ?><br>
                                                                    <i class="fa fa-map-pin" aria-hidden="true"></i> Alamat Tujuan: <?= $value->alamat ?><br>

                                                                    <span class="label label-success">Sedang Dikirim <?= $value->time ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 ml-auto text-right">
                                                                Date/Time: <br><strong><?= $value->tgl_order ?></strong><br>
                                                                <i class="fa fa-tags" aria-hidden="true"></i> Total Bayar: <br><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('Pelanggan/c_katalog/detail_pemesanan/' . $value->id_transaksi) ?>" class="aa-secondary-btn">VIEW</a>
                                                        <hr>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Shipping Address -->
                                    <div class="panel panel-default aa-checkout-billaddress">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i> Order Selesai
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php
                                                $tot4 = 0;
                                                foreach ($selesai as $key => $value) {
                                                    $tot4 = $tot4 + $value->total_bayar;
                                                }
                                                if ($tot4 == 0) {
                                                ?>
                                                    <img style="width: 300px; display: block; margin-left: auto; margin-right: auto;" src="<?= base_url('asset/gambar/null.png') ?>">
                                                <?php
                                                } else {
                                                ?>
                                                    <?php
                                                    foreach ($selesai as $key => $value) {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <p class="text-default">
                                                                    <i class="fa fa-barcode" aria-hidden="true"></i> No Order: <strong><?= $value->id_transaksi ?></strong><br>
                                                                    <i class="fa fa-user" aria-hidden="true"></i> Atas Nama: <?= $value->nama_penerima ?><br>
                                                                    <i class="fa fa-map-pin" aria-hidden="true"></i> Alamat Tujuan: <?= $value->alamat ?><br>

                                                                    <span class="label label-default">Order Selesai <i class="fa fa-check" aria-hidden="true"></i> <?= $value->time ?></span>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 ml-auto text-right">
                                                                Date/Time: <br><strong><?= $value->tgl_order ?></strong><br>
                                                                <i class="fa fa-tags" aria-hidden="true"></i> Total Bayar: <br><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('Pelanggan/c_katalog/detail_pemesanan/' . $value->id_transaksi) ?>" class="aa-secondary-btn">VIEW</a>
                                                        <hr>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-right">
                                <div class="aa-contact-area">
                                    <div class="aa-contact-top">
                                        <h2>Profil Anda</h2>
                                        <p>Tukarkan point anda untuk mendapatkan potongan harga...</p>
                                    </div>
                                    <div class="aa-contact-address">
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="aa-contact-address-right">
                                                    <address>
                                                        <h4><strong><?= $profil->nama_pelanggan ?></strong></h4>
                                                        <hr>
                                                        <p><span class="fa fa-home"></span> <?= $profil->alamat ?></p>
                                                        <p><span class="fa fa-phone"></span> <?= $profil->no_telp ?></p>
                                                        <p><span>Point: </span><?= $profil->point ?></p>

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
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->