<!-- Cart view section -->
<section id="checkout">
    <div class="container">
        <div class="checkout-area">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout-left">
                        <div class="panel-group" id="accordion">
                            <!-- Shipping Address -->
                            <form action="<?= base_url() ?>pelanggan/c_katalog/order" method="post">
                                <?php
                                $no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
                                ?>
                                <!-- simpan detail pembelian -->
                                <?php
                                $i = 1;
                                foreach ($this->cart->contents() as $items) {
                                    echo form_hidden('qty' . $i++, $items['qty']);
                                }
                                ?>
                                <input type="hidden" name="no_order" value="<?= $no_order ?>">
                                <div class="panel panel-default aa-checkout-billaddress">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                Shippping Address
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" name="nama_penerima" placeholder="Nama Penerima*" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" name="telepon" placeholder="No Telepon*" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <textarea name="alamat" cols="8" rows="3" placeholder="Alamat" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkout-right">
                        <div class="aa-payment-method">
                            <h4>Order Summary</h4>
                            <div class="aa-order-summary-area">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($this->cart->contents() as $value) {
                                        ?>

                                            <tr>
                                                <td><?= $value['name'] ?><strong> x <?= $value['qty'] ?></strong></td>
                                                <td>Rp. <?= $this->cart->format_number($value['subtotal']) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" name="total_bayar" value="<?= $this->cart->total() ?>" ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <td><strong>Rp. <?= $this->cart->format_number($this->cart->total()) ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <?php
                            if ($point->point != 0) {
                            ?>
                                <label>Tukarkan Point Anda, Anda Memiliki Point Sebesar</label>
                                <input type="checkbox" class="aa-browse-btn" value="<?= $point->point ?>" name="point"> <?= $point->point ?> point
                            <?php }
                            ?>
                            <input type="submit" value="Order" class="aa-browse-btn">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</section>
<!-- / Cart view section -->