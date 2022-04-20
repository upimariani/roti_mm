<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Produk</span>
                            <span class="info-box-number">
                                <?= $jml_produk ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Akun Admin</span>
                            <span class="info-box-number"><?= $jml_admin ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Order Masuk</span>
                            <span class="info-box-number"><?= $jml_order ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pelanggan Register</span>
                            <span class="info-box-number"><?= $jml_pelanggan ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chatting</h3>

                            <div class="card-tools">
                                <span class="badge badge-danger"><?= $jml_chat ?> Chat</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                <?php
                                foreach ($daftar_chat as $key => $value) {
                                ?>
                                    <li>
                                        <a class="users-list-name" href="<?= base_url('admin/c_chatting/chatting/' . $value->id_pelanggan) ?>"><?= $value->nama_pelanggan ?></a>
                                        <span class="users-list-date"><?= $value->time ?></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                </div>
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Laporan Produk</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($produk as $key => $value) {
                                ?>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            <?= $value->nama_produk ?>
                                        </td>
                                        <td>Rp. <?= number_format($value->harga_produk, 0) ?></td>
                                        <td>
                                            <small class="text-<?php if ($value->qty_produk <= 50) {
                                                                    echo 'danger';
                                                                } else {
                                                                    echo 'success';
                                                                } ?> mr-1">
                                                <i class="fas fa-arrow-<?php if ($value->qty_produk <= 50) {
                                                                            echo 'down';
                                                                        } else {
                                                                            echo 'up';
                                                                        } ?>"></i>
                                                <?= $value->qty_produk ?>
                                            </small>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->