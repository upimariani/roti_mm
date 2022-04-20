<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Informasi Produk</h1>
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
                <div class="col-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Produk</h3><br>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-secondary">
                                <i class="fas fa-plus"> | Produk</i>
                            </button>
                            <a href="<?= base_url('Admin/c_laporan/produk') ?>"><button type="button" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-file-pdf"></i> Laporan
                                </button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="example1 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Rasa Produk</th>
                                        <th class="text-center">Harga Produk</th>
                                        <th class="text-center">Qty Produk</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($select_produk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?><br><?= $value->deskripsi ?></td>
                                            <td><?= $value->rasa_produk ?></td>
                                            <td class="text-center"><span class="right badge badge-success">Rp. <?= number_format($value->harga_produk, 0) ?></span></td>
                                            <td><?= $value->qty_produk ?> pcs</td>
                                            <td><img style="width: 100px;" src="<?= base_url('asset/gambar/' . $value->gambar) ?>"> </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-block btn-outline-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_produk ?>">EDIT</button>
                                                <a href="<?= base_url('admin/c_produk/hapus/' . $value->id_produk) ?>"><button type="button" class="btn btn-block btn-outline-danger btn-sm">HAPUS</button></a>
                                            </td>
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
                <div class="col-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Diskon Produk</h3><br>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#tambah_diskon">
                                <i class="fas fa-plus"> | Diskon</i>
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Diskon Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($diskon as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?></td>
                                            <td><span class="badge bg-info">Rp. <?= number_format($value->harga_produk, 0) ?></span></td>
                                            <td class="text-center"><span class="badge bg-warning"><?= $value->diskon ?>%<br>
                                                    Harga : Rp. <?= number_format($value->harga_produk - ($value->diskon / 100 * $value->harga_produk))  ?></span></td>
                                            <td class="text-center"><button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_diskon<?= $value->id_produk ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-sm">
                                                    <a href="<?= base_url('admin/c_produk/hapus_diskon/' . $value->id_produk) ?>"><i class="fas fa-trash"></i></a>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Paket Produk</h3><br>
                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#tambah_paket">
                                <i class="fas fa-plus"> | Paket</i>
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Paket</th>
                                        <th>Harga</th>
                                        <th>Detail Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($paket as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img style="width: 100px;" src="<?= base_url('asset/gambar/' . $value->gambar) ?>">
                                                <?= $value->nama_produk ?></td>
                                            <td><span class="badge bg-info">Rp. <?= number_format($value->harga_produk, 0) ?></span></td>
                                            <td class="text-center"><?= $value->deskripsi ?></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit_paket<?= $value->id_produk ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-sm">
                                                    <a href="<?= base_url('admin/c_produk/hapus/' . $value->id_produk) ?>"><i class="fas fa-trash"></i></a>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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


<!-- Modal Tambah Data Produk -->
<div class="modal fade" id="modal-secondary">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <?php echo form_open_multipart('admin/c_produk/insert_produk'); ?>
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rasa Produk</label>
                        <input type="text" name="rasa_produk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Rasa Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Produk</label>
                        <input type="number" name="harga_produk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Qty Produk</label>
                        <input type="number" name="qty_produk" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Qty Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi Produk</label>
                        <textarea name="deskripsi" class="form-control compose-textarea" style="height: 300px">
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Gambar</label>
                        <div class="input-group">
                            <input type="file" name="gambar" class="form-control" placeholder="Alternative input">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-success">Save changes</button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
foreach ($select_produk as $key => $value) {
?>
    <!-- Modal Edit Data Produk -->
    <div class="modal fade" id="edit<?= $value->id_produk ?>">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/c_produk/edit/' . $value->id_produk);
                    ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="<?= $value->nama_produk ?>" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rasa Produk</label>
                            <input type="text" name="rasa_produk" class="form-control" value="<?= $value->rasa_produk ?>" id="exampleInputEmail1" placeholder="Masukkan Rasa Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Produk</label>
                            <input type="number" name="harga_produk" class="form-control" value="<?= $value->harga_produk ?>" id="exampleInputEmail1" placeholder="Masukkan Harga Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Qty Produk</label>
                            <input type="number" name="qty_produk" class="form-control" value="<?= $value->qty_produk ?>" id="exampleInputPassword1" placeholder="Masukkan Qty Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control compose-textarea" style="height: 300px"><?= $value->deskripsi ?>
                    </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar</label>
                            <img src="<?= base_url('asset/gambar/' . $value->gambar) ?>" id="gambar_load" width="200px">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
}
?>
<!--
<div class="modal fade" id="tambah_paket">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/c_produk/paket') ?>" method="POST">
            <?php
            $id_paket = strtoupper(random_string('alnum', 5));
            ?>
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Paket Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="id_paket" value="<?= $id_paket ?>">
                        <input type="text" name="nama_paket" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Produk</label>
                        <select class="select2bs4" multiple="multiple" name="id_produk[]" data-placeholder="Pilih Produk Paket" style="width: 100%;">
                            <?php foreach ($select_produk as $key => $value) {
                            ?>
                                <option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
                        -->
<div class="modal fade" id="tambah_diskon">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/c_produk/diskon') ?>" method="POST">

            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Diskon Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <select name="produk" class="form-control" required>
                            <option>---Pilih Produk Diskon---</option>
                            <?php
                            foreach ($select_produk as $key => $value) {
                            ?>
                                <option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Besar Diskon</label>
                        <input type="number" name="besar_diskon" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
foreach ($diskon as $key => $value) {
?>

    <div class="modal fade" id="edit_diskon<?= $value->id_produk ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/c_produk/diskon') ?>" method="POST">

                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Diskon Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="produk" value="<?= $value->id_produk ?>">
                            <label>Nama Produk</label>
                            <select class="form-control">
                                <option disabled="disabled">---Pilih Produk Diskon---</option>
                                <?php
                                foreach ($select_produk as $key => $row) {
                                ?>
                                    <option disabled="disabled" value="<?= $row->id_produk ?>" <?php if ($row->id_produk == $value->id_produk) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?= $row->nama_produk ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Besar Diskon</label>
                            <input type="number" name="besar_diskon" value="<?= $value->diskon ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>

//tambah paket
<div class="modal fade" id="tambah_paket">
    <div class="modal-dialog">
        <?php echo form_open_multipart('admin/c_produk/insert_paket'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukkan Paket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Paket</label>
                    <input type="text" name="nama_paket" placeholder="Masukkan Nama Paket" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga Paket</label>
                    <input type="number" name="harga_paket" placeholder="Masukkan Harga Paket" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi Paket</label>
                    <textarea name="deskripsi_paket" class="form-control compose-textarea" style="height: 300px">
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Qty Paket</label>
                    <input type="number" name="qty_paket" placeholder="Masukkan Qty Paket" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Gambar Paket</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?php echo form_close(); ?>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
foreach ($paket as $key => $value) {
?>
    <div class="modal fade" id="edit_paket<?= $value->id_produk ?>">
        <div class="modal-dialog">
            <?php echo form_open_multipart('admin/c_produk/edit_paket/' . $value->id_produk);
            ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" value="<?= $value->nama_produk ?>" placeholder="Masukkan Nama Paket" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="number" name="harga_paket" value="<?= $value->harga_produk ?>" placeholder="Masukkan Harga Paket" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi Paket</label>
                        <textarea name="deskripsi_paket" class="form-control compose-textarea" style="height: 300px"><?= $value->deskripsi ?>
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label>Qty Paket</label>
                        <input type="number" name="qty_paket" value="<?= $value->qty_produk ?>" placeholder="Masukkan Qty Paket" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar Paket</label>
                        <img style="width: 150px;" src="<?= base_url('asset/gambar/' . $value->gambar) ?>">
                        <input type="file" name="gambar" class="form-control">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <?php
            echo form_close();
            ?>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
}
?>