<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <div class="cart-view-area">
                    <div class="cart-view-table">
                        <div class="table-responsive">

                            <table class="table">
                                <?php
                                echo form_open('pelanggan/c_katalog/update');
                                ?>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php
                                    $i = 1;
                                    foreach ($this->cart->contents() as $value) :
                                    ?>
                                        <tr>
                                            <td><a class="remove" href="<?= base_url('Pelanggan/c_katalog/delete/' . $value['rowid']) ?>">
                                                    <fa class="fa fa-close"></fa>
                                                </a></td>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="<?= base_url('asset/gambar/' . $value['picture']) ?>" alt="Image"></a>
                                                    <p><?= $value['name']; ?></p>
                                                </div>
                                            </td>
                                            <td>Rp. <?= number_format($value['price'], 0) ?></td>
                                            <td>
                                                <div class="qty">
                                                    <input id="jml" type="number" name="<?= $i . '[qty]' ?>" class="form-control" min="1" max="<?= $value['qty_produk'] ?>" value="<?= $value['qty'] ?>" <?php if ($value['qty_produk'] <= 1) {
                                                                                                                                                                                                                echo 'disabled';
                                                                                                                                                                                                            } ?>>

                                                </div>
                                            </td>
                                            <td>Rp. <?= $this->cart->format_number($value['subtotal']); ?></td>

                                        </tr>
                                    <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <input type="submit" class="aa-cart-view-btn" value="UPDATE CART">
                        </div>
                        <!-- Cart Total view -->
                        <div class="cart-view-total">
                            <h4>Cart Totals</h4>
                            <table class="aa-totals-table">
                                <tbody>
                                    <tr>
                                        <th>Total</th>
                                        <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            $total = 0;
                            foreach ($this->cart->contents() as $value) :
                                $total = $total + $value['qty'];
                            endforeach;
                            if ($total <= 50) {
                            ?>
                                <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>

                            <?php
                            } else {
                            ?>
                                <a href="<?= base_url('pelanggan/c_katalog/checkout') ?>" class="aa-cart-view-btn">Proced to Checkout</a>

                            <?php
                            }
                            ?>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->
<!-- / Cart view section -->