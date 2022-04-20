<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Informasi Admin & Kurir</h1><br>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h6><i class="icon fas fa-check"></i>Success</h6>';
                        echo $this->session->flashdata('pesan');
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h5>Admin</h5>
                                <a href="<?= base_url('admin/c_admin/insert_admin') ?>"><button class="btn btn-info btn-sm">Tambah Admin</button></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="example1 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Admin</th>
                                        <th class="text-center">Username/Password</th>=
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($select_admin as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_admin ?></td>
                                            <td><?= $value->username ?> <br> <?= $value->password ?></td>
                                            <td class="text-center"><a href="<?= base_url('admin/c_admin/hapus/' . $value->id_admin) ?>"><button class="btn btn-danger btn-sm">Hapus</button></a>
                                                <a href="<?= base_url('admin/c_admin/edit/' . $value->id_admin) ?>"><button class="btn btn-primary btn-sm">Edit</button></a>
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
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h5>Kurir</h5>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-default">Tambah Kurir</button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="example1 table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Kurir</th>
                                        <th class="text-center">Area</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kurir as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_kurir ?></td>
                                            <td><?= $value->area ?></td>
                                            <td><?= $value->status_kurir ?> </td>
                                            <td class="text-center"><a href="<?= base_url('admin/c_admin/hapus_kurir/' . $value->id_kurir) ?>"><button class="btn btn-danger btn-sm">Hapus</button></a>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_kurir<?= $value->id_kurir ?>">Edit</button>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/c_admin/insert_kurir') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Kurir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kurir</label>
                        <input type="text" name="nama_kurir" placeholder="Masukkan Nama Kurir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Area Kurir</label>
                        <input type="text" name="area" placeholder="Masukkan Area Kurir" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($kurir as $key => $value) {
?>
    <div class="modal fade" id="edit_kurir<?= $value->id_kurir ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/c_admin/edit_kurir/' . $value->id_kurir) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Kurir</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kurir</label>
                            <input type="text" name="nama_kurir" value="<?= $value->nama_kurir ?>" placeholder="Masukkan Nama Kurir" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Area Kurir</label>
                            <input type="text" name="area" value="<?= $value->area ?>" placeholder="Masukkan Area Kurir" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
}
?>