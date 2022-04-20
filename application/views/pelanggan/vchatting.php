<!-- product category -->
<section id="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="row">
                        </div>
                    </div>
                    <div class="aa-product-details-bottom">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="aa-product-review-area">
                                <h4>Chatting</h4>
                                <ul class="aa-review-nav">
                                    <?php
                                    foreach ($chat as $key => $value) {
                                        if ($value->pelanggan_send != '0') {
                                    ?>
                                            <li>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><strong><?= $value->nama_pelanggan ?></strong> - <span><?= $value->time ?></span></h4>
                                                        <p><?= $value->pelanggan_send ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                        if ($value->admin_send != '0') {
                                        ?>
                                            <li>
                                                <div class="media">
                                                    <div class="media-body text-right">
                                                        <h4 class="media-heading"><strong>Admin</strong> - <span><?= $value->time ?></span></h4>
                                                        <p><?= $value->admin_send ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <!-- review form -->
                                <form action="<?= base_url('pelanggan/c_chatting') ?>" method="POST" class="aa-review-form">

                                    <div class="form-group">
                                        <input type="text" name="pesan" class="form-control" id="name" placeholder="Tulis Pesan Anda...">
                                    </div>
                                    <button type="submit" class="btn btn-default aa-review-submit">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Related product -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- / product category -->