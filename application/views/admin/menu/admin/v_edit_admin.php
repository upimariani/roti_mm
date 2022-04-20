<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Admin</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php
                        foreach ($edit as $key => $value) {
                        ?>

                            <!-- form start -->
                            <form action="<?= base_url('admin/c_admin/proses_edit/' . $value->id_admin) ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Admin</label>
                                        <input type="text" name="nama_admin" value="<?= $value->nama_admin ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Admin">
                                        <?php echo form_error('nama_admin', '<div class="error">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="username" value="<?= $value->username ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username">
                                        <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" name="password" value="<?= $value->password ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password">
                                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="<?= base_url('admin/c_admin') ?>" class="btn btn-danger">Kembali</a>
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>