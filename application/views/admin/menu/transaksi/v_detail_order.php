<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/c_transaksi') ?>">Order</a></li>
                        <li class="breadcrumb-item active">Detail Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-md-6">
                                <?php
                                foreach ($detail as $key => $value) {
                                ?>
                                    <table class="table table-avatar">
                                        <tr>
                                            <td>No Order</td>
                                            <td><strong><?= $value->id_transaksi ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Penerima</td>
                                            <td><?= $value->nama_penerima ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Telepon</td>
                                            <td><?= $value->no_telp ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?= $value->alamat ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Bayar</td>
                                            <td><strong>Rp. <?= number_format($value->total_bayar, 0) ?></strong></td>
                                        </tr>
                                    </table>
                                <?php
                                }
                                ?>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Nama</th>
                                        <th>Rasa</th>
                                        <th>Harga</th>
                                        <th style="width: 40px">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $subtotal = 0;
                                    foreach ($produk as $key => $value) {
                                        $subtotal = $value->qty * $value->harga_produk;
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->nama_produk ?></td>
                                            <td><?= $value->rasa_produk ?></td>
                                            <td><span class="badge bg-warning">Rp. <?= number_format($value->harga_produk, 0)  ?></span></td>
                                            <td><span class="badge bg-info"><?= $value->qty ?></span></td>
                                            <td>Rp. <?= number_format($subtotal, 0) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table><br>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                                    KIRIM
                                </button>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
foreach ($detail as $key => $value) {
?>
    <form action=" <?= base_url('admin/c_transaksi/kirim_pesanan/' . $value->id_transaksi) ?>" method="POST">
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan Nama Kurir</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kurir</label>
                            <select class="form-control" name="kurir">
                                <option>---Pilih Kurir---</option>
                                <?php
                                foreach ($kurir as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_kurir ?>" <?php if ($value->status_kurir == '1') {
                                                                                echo 'disabled';
                                                                            } ?>><?= $value->nama_kurir ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
<?php
}
?>