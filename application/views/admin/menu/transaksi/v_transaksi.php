<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        Order Produk
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button type="button" class="btn btn-light">
                                    <i class="fas fa-plus"> <a href="<?= base_url('Admin/c_laporan/transaksi') ?>">Laporan</a></i>
                                </button>

                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    if ($this->session->flashdata('pesan')) {
                                        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>Success</h6>';
                                        echo $this->session->flashdata('pesan');
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="card card-primary card-tabs">
                                        <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Menunggu Konfirmasi</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Dikemas</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Dikirim</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Selesai</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                    <table class="example1 table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">No</th>
                                                                <th class="text-center">Nama Penerima</th>
                                                                <th class="text-center">No Telepon</th>
                                                                <th class="text-center">Total Bayar</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($menunggu as $key => $value) {
                                                            ?>

                                                                <tr>
                                                                    <td class="text-center"><?= $no++ ?></td>
                                                                    <td><?= $value->nama_penerima ?></td>
                                                                    <td><?= $value->no_telp ?></td>
                                                                    <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                    <td class="text-center"><a href="<?= base_url('admin/c_transaksi/konfirmasi/' . $value->id_transaksi) ?>"><button class="btn btn-primary">KONFIRMASI</button></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                                    <table class="example1 table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">No</th>
                                                                <th class="text-center">Nama Penerima</th>
                                                                <th class="text-center">No Telepon</th>
                                                                <th class="text-center">Total Bayar</th>
                                                                <th class="text-center">Time</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($dikemas as $key => $value) {
                                                            ?>

                                                                <tr>
                                                                    <td class="text-center"><?= $no++ ?></td>
                                                                    <td><?= $value->nama_penerima ?></td>
                                                                    <td><?= $value->no_telp ?></td>
                                                                    <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                    <td><?= $value->time ?></td>
                                                                    <td class="text-center"><a href="<?= base_url('admin/c_transaksi/detail_order/' . $value->id_transaksi) ?>"><button class="btn btn-primary">DETAIL ORDER</button></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                                    <table class="example1 table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">No</th>
                                                                <th class="text-center">Nama Penerima</th>
                                                                <th class="text-center">No Telepon</th>
                                                                <th class="text-center">Total Bayar</th>
                                                                <th class="text-center">Kurir</th>
                                                                <th class="text-center">Time</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($dikirim as $key => $value) {
                                                            ?>

                                                                <tr>
                                                                    <td class="text-center"><?= $no++ ?></td>
                                                                    <td><?= $value->nama_penerima ?></td>
                                                                    <td><?= $value->no_telp ?></td>
                                                                    <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                    <td><?= $value->nama_kurir ?></td>
                                                                    <td><?= $value->time ?></td>
                                                                    <td class="text-center"> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#retur<?= $value->id_transaksi ?>">
                                                                            Retur Barang
                                                                        </button>
                                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#selesai<?= $value->id_transaksi ?>">
                                                                            Order Selesai
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                                    <table class="example1 table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">No</th>
                                                                <th class="text-center">Nama Penerima</th>
                                                                <th class="text-center">No Telepon</th>
                                                                <th class="text-center">Total Bayar</th>
                                                                <th class="text-center">Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            foreach ($selesai as $key => $value) {
                                                            ?>

                                                                <tr>
                                                                    <td class="text-center"><?= $no++ ?></td>
                                                                    <td><?= $value->nama_penerima ?></td>
                                                                    <td><?= $value->no_telp ?></td>
                                                                    <td>Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                                                    <td><?= $value->time ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
foreach ($dikirim as $key => $value) {
?>
    <form action="<?= base_url('admin/c_transaksi/return_barang') ?>" method="POST">

        <div class="modal fade" id="retur<?= $value->id_transaksi ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" name="id_transaksi" value="<?= $value->id_transaksi ?>">
                        <h4 class="modal-title">Retur Barang <?= $value->id_transaksi ?></h4><br>
                        <h5 class="modal-title">Atas Nama: <?= $value->nama_penerima ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="point" value="<?= $value->point ?>">
                            <input type="hidden" name="total" value="<?= $value->total_bayar ?>">
                            <input type="hidden" name="id_pelanggan" value="<?= $value->id_pelanggan ?>">
                            <input type="hidden" name="kurir" value="<?= $value->kurir ?>">

                            <label for="exampleInputEmail1">Nama Produk</label>
                            <select class="form-control" id="produk" name="nama">
                                <option>---Pilih Retur Barang---</option>
                                <?php
                                foreach ($produk as $key => $value) {
                                ?>
                                    <option data-harga="<?= $value->harga_produk ?>" value="<?= $value->id_produk ?>"><?= $value->nama_produk ?> | <?= $value->rasa_produk ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk Retur</label>
                            <input type="text" name="harga" class="form-control" id="harga-produk" placeholder="Masukkan Jumlah Retur">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Retur</label>
                            <input type="number" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jumlah Retur">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
    <!-- /.modal -->
<?php
}
?>


<?php
foreach ($dikirim as $key => $value) {
?>
    <form action="<?= base_url('admin/c_transaksi/selesai/' . $value->id_transaksi) ?>" method="POST">

        <div class="modal fade" id="selesai<?= $value->id_transaksi ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" name="id_transaksi" value="<?= $value->id_transaksi ?>">
                        <h4 class="modal-title">Orderan Selesai <?= $value->id_transaksi ?></h4><br>
                        <h5 class="modal-title">Atas Nama: <?= $value->nama_penerima ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="point" value="<?= $value->point ?>">
                        <input type="hidden" name="total" value="<?= $value->total_bayar ?>">
                        <input type="hidden" name="id_pelanggan" value="<?= $value->id_pelanggan ?>">
                        <input type="hidden" name="kurir" value="<?= $value->kurir ?>">
                        <p>Apakah Order Sudah Selesai?</p>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
    </form>
    <!-- /.modal -->
<?php
}
?>