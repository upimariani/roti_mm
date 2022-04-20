<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Informasi Paket Produk</h1>
                    <hr><?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>Success</h6>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }
                        if (isset($error)) {
                            echo '  <div class="callout callout-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h6><i class="icon fas fa-check"></i>';
                            echo $error;
                            echo '</div>';
                        }
                        ?>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h5>Nama Paket : <?= $detail['paket']->nama_paket ?></h5>
                            <h5>Harga Paket : Rp. <?= number_format($detail['paket']->harga_paket, 0) ?></h5>
                            <br>
                            <a href="<?= base_url('admin/c_produk/select_produk') ?>"><button type="button" class="btn btn-outline-warning btn-sm">Kembali</button></a>
                            <a href="<?= base_url('admin/c_produk/hapus_paket/' . $detail['paket']->id_paket) ?>"><button type="button" class="btn btn-outline-danger btn-sm">Hapus Paket</button></a>
                            <br>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Rasa Produk</th>
                                        <th class="text-center">Harga Produk</th>
                                        <th class="text-center">Qty Produk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail['detail'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?><br><?= $value->deskripsi ?></td>
                                            <td><?= $value->rasa_produk ?></td>
                                            <td>Rp. <?= number_format($value->harga_produk, 0) ?></td>
                                            <td><?= $value->qty_produk ?> pcs</td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->