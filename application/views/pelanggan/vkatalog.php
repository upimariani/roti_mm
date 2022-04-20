<!-- menu -->
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    </div>
</section>
<!-- / menu -->

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="<?= base_url('asset/gambar/roti_mm.png') ?>" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <div class="aa-product-catg-head">
                        <div class="aa-product-catg-head-left">
                            <form action="" class="aa-show-form">
                                <label for="">Show</label>
                                <select name="">
                                    <option value="1" selected="12">12</option>
                                    <option value="2">24</option>
                                    <option value="3">36</option>
                                </select>
                            </form>
                        </div>
                        <div class="aa-product-catg-head-right">
                            <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                            <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                        </div>
                    </div>
                    <div class="aa-product-catg-body">
                        <ul class="aa-product-catg">
                            <!-- start single product item -->
                            <?php
                            foreach ($select_produk as $key => $value) {
                                echo form_open('pelanggan/c_katalog/add');
                            ?>
                                <li>
                                    <input type="hidden" name="price" value="<?= $value->harga_produk - ($value->diskon / 100 * $value->harga_produk) ?>">
                                    <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
                                    <input type="hidden" name="id" value="<?= $value->id_produk ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="picture" value="<?= $value->gambar ?>">
                                    <input type="hidden" name="qty_produk" value="<?= $value->qty_produk ?>">
                                    <figure>
                                        <a class="aa-product-img" href="#"><img style="width: 200px;" src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="polo shirt img"></a>
                                        <?php
                                        if ($value->qty_produk <= 1) {
                                        ?>
                                            <span class="fa fa-shopping-cart"></span>Stok Habis
                                        <?php
                                        } else {
                                        ?>
                                            <a type="submit" class="aa-add-card-btn"><button class="btn btn-danger"><span class="fa fa-shopping-cart"></span>Add To Cart</button></a>

                                        <?php
                                        }
                                        ?>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="#"><?= $value->nama_produk ?></a> | Rasa <?= $value->rasa_produk ?></h4>
                                            <span class="aa-product-price">Rp. <?= number_format($value->harga_produk - ($value->diskon / 100 * $value->harga_produk), 0) ?></span>

                                            <?php
                                            if ($value->diskon != '0') {
                                                echo '<span class="aa-product-price"><del>Rp. ' . number_format($value->harga_produk, 0) . '</del></span>';
                                            }
                                            ?>

                                        </figcaption>
                                    </figure>
                                    <div class="aa-product-hvr-content">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Stok Produk"><span class="fa fa-heart-o">Stok <?= $value->qty_produk ?></span></a>
                                    </div>
                                    <!-- product badge -->
                                </li>
                            <?php
                                echo form_close();
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <!-- single sidebar -->
                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Top Rated Products</h3>
                        <div class="aa-recently-views">
                            <ul>
                                <?php
                                foreach ($rank as $key => $value) {

                                ?>
                                    <li>
                                        <a href="#" class="aa-cartbox-img"><img alt="img" src="<?= base_url('asset/gambar/' . $value->gambar) ?>"></a>
                                        <div class="aa-cartbox-info">
                                            <h4><a href="#"><?= $value->nama_produk ?></a></h4>

                                            <p>Rp. <?= number_format($value->harga_produk, 0) ?></p>
                                        </div>
                                    </li>
                                <?php

                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </aside>
                <aside class="aa-sidebar">

                    <div class="aa-sidebar-widget">
                        <h3>Paket Roti</h3>
                        <p>Nikmati Paket Roti, Harga Lebih Murah!!!</p>
                        <div class="aa-recently-views">
                            <ul>
                                <?php
                                foreach ($paket as $key => $value) {
                                    echo form_open('pelanggan/c_katalog/add');
                                ?>
                                    <input type="hidden" name="price" value="<?= $value->harga_produk - ($value->diskon / 100 * $value->harga_produk) ?>">
                                    <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
                                    <input type="hidden" name="id" value="<?= $value->id_produk ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="picture" value="<?= $value->gambar ?>">
                                    <input type="hidden" name="qty_produk" value="<?= $value->qty_produk ?>">
                                    <li>
                                        <a href="#" class="aa-cartbox-img"><img alt="img" src="<?= base_url('asset/gambar/' . $value->gambar) ?>"></a>
                                        <div class="aa-cartbox-info">
                                            <h4><a href="#"><?= $value->nama_produk ?></a></h4>

                                            <p>Rp. <?= number_format($value->harga_produk, 0) ?></p>
                                            <?php
                                            if ($value->qty_produk <= 1) {
                                            ?>
                                                <p>Stok Abis</p>
                                            <?php
                                            } else {
                                            ?>
                                                <a type="submit" class="aa-add-card-btn"><button class="btn btn-danger"><span class="fa fa-shopping-cart"></span>Add To Cart</button></a>
                                            <?php
                                            }
                                            ?>

                                        </div>

                                    </li>
                                <?php
                                    echo form_close();
                                }
                                ?>
                                <!-- <?php
                                        foreach ($paket as $key => $value) {
                                        ?>
                                        <input type="text" name="id_paket" value="<?= $value->id_produk ?>">
                                        <input type="text" name="price_paket" value="<?= $value->harga_paket ?>">
                                        <input type="text" name="qty_paket" value="5">
                                        <input type="text" name="name_paket" value="<?= $value->nama_paket ?>">
                                        <input type="text" name="foto_paket" value="<?= $value->foto ?>">
                                        <input type="text" name="qty_jml" value="<?= $value->qty ?>">
                                        <li><a href="#" class="aa-cartbox-img"><img alt="img" src="<?= base_url('asset/gambar/' . $value->foto) ?>"></a>
                                            <div class="aa-cartbox-info">
                                                <h4><a href="#"><?= $value->nama_paket ?></a></h4>
                                                <p>Rp. <?= number_format($value->harga_paket, 0) ?></p>
                                            </div>
                                        </li>
                                        <li><a type="submit" class="aa-add-card-btn"><button class="btn btn-danger"><span class="fa fa-shopping-cart"></span>Add To Cart</button></a></li>
                                    <?php
                                        }
                                    ?> -->
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>

        </div>
    </div>
</section>
<!-- / product category -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <!-- Modal view slider -->
                    <div class="col-md-6">
                        <div class="aa-product-view-slider">
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                            <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal view content -->
                    <div class="col-md-6">
                        <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                                <span class="aa-product-view-price">$34.99</span>
                                <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet,
                            <p>consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>

                            <div class="aa-prod-view-bottom">
                                <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>