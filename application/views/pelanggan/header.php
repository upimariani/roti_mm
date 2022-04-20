<body class="productPage">
    <!-- wpf loader Two -->
    <div id="wpf-loader-two">
        <div class="wpf-loader-two-inner">
            <span>Loading</span>
        </div>
    </div>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-top-area">
                            <!-- start header top left -->
                            <div class="aa-header-top-left">

                                <!-- start cellphone -->
                                <div class="cellphone hidden-xs">
                                    <p><i class="fa fa-bookmark" aria-hidden="true"></i> P-IRT : 206320801472</p>
                                </div>
                                <!-- / cellphone -->
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="aa-head-top-nav-right">
                                    <li class="hidden-xs"><a href="<?= base_url('pelanggan/c_chatting') ?>">Chatting</a></li>
                                    <li class="hidden-xs"><a href="<?= base_url('pelanggan/c_katalog/status_pengiriman') ?>">Shipping</a></li>
                                    <?php
                                    if ($this->session->userdata('id_pelanggan') == '') {
                                    ?><li><a href="<?= base_url('pelanggan/c_login') ?>">Login</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a href="<?= base_url('pelanggan/c_login/logout') ?>">LogOut</a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="<?= base_url('pelanggan/c_katalog') ?>">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>Roti<strong>MM</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <?php
                            if ($this->session->userdata('id_pelanggan') == '') {
                            ?>
                                <div class="aa-cartbox">
                                    <a class="aa-cart-link" href="#">
                                        <span class="fa fa-shopping-basket"></span>
                                        <span class="aa-cart-title">SHOPPING CART</span>
                                    </a>
                                    <div class="aa-cartbox-summary">
                                        <p>Segera Melakukan Login</p>
                                    </div>
                                </div>
                                <!-- / cart box -->
                            <?php
                            } else {
                            ?>

                                <!-- cart box -->
                                <?php
                                $keranjang = $this->cart->contents();
                                $jml_item = 0;
                                foreach ($keranjang as $key => $value) {
                                    $jml_item = $jml_item + $value['qty'];
                                }
                                ?>
                                <div class="aa-cartbox">
                                    <a class="aa-cart-link" href="#">
                                        <span class="fa fa-shopping-basket"></span>
                                        <span class="aa-cart-title">SHOPPING CART</span>
                                        <?php
                                        if ($jml_item == 0) {
                                        ?>
                                            <span></span>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="aa-cart-notify"><?= $jml_item ?></span>
                                        <?php
                                        }
                                        ?>
                                    </a>
                                    <div class="aa-cartbox-summary">
                                        <ul>
                                            <?php
                                            if ($jml_item == 0) {
                                            ?>
                                                <p>Segera Checkout</p>
                                                <?php
                                            } else {
                                                foreach ($keranjang as $key => $value) {
                                                ?>
                                                    <li>
                                                        <a class="aa-cartbox-img" href="#"><img src="<?= base_url('asset/gambar/' . $value['picture']) ?>" alt="img"></a>
                                                        <div class="aa-cartbox-info">
                                                            <h4><?= $value['name'] ?><a href="#"></a></h4>
                                                            <p><?= $value['qty'] ?> x Rp. <?= number_format($value['price'], 0) ?></p>
                                                        </div>
                                                        <a class="aa-remove-product" href="<?= base_url('Pelanggan/c_katalog/delete/' . $value['rowid']) ?>"><span class="fa fa-times"></span></a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                        </ul>
                                        <a class="aa-cartbox-checkout aa-primary-btn" href="<?= base_url('pelanggan/c_katalog/cart') ?>">VIEW CART</a>
                                    <?php
                                            }
                                    ?>
                                    </div>
                                </div>
                                <!-- / cart box -->
                            <?php
                            }
                            ?>

                            <!-- search box -->
                            <div class="aa-search-box">
                                <form action="">
                                    <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                                    <button type="submit"><span class="fa fa-search"></span></button>
                                </form>
                            </div>
                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->