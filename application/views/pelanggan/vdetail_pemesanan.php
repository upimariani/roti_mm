<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="<?= base_url('asset/MarkUps-dailyShop/dailyShop/') ?>img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>T-Shirt</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Product</a></li>
                    <li class="active">T-shirt</li>
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
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-right">
                                <div class="aa-contact-area">
                                    <div class="aa-contact-top">

                                    </div>
                                    <h2>Detail Pesanan Anda</h2>
                                    <p>Tukarkan point anda untuk mendapatkan potongan harga...</p>
                                    <div class="aa-contact-address">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="aa-order-summary-area">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>Produk</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($detail as $key => $value) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $value->nama_produk ?><strong> x <?= $value->qty ?></strong></td>
                                                                    <td>Rp. <?= number_format($value->harga_produk * $value->qty, 0)  ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>
                                                                    <hr>Total
                                                                </th>
                                                                <td>
                                                                    <hr><i class="fa fa-tags" aria-hidden="true"></i>Rp. <?= number_format($value->total_bayar, 0)  ?>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <form action="<?= base_url('pelanggan/c_katalog/status_pengiriman') ?>" method="POST">
                                                        <input type="submit" value="Kembali" class="aa-browse-btn">
                                                    </form>
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