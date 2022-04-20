<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>LOGIN</b> ADMIN</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?php
                if ($this->session->flashdata('error')) {
                    echo '<p class="login-box-msg text-danger">';
                    echo $this->session->flashdata('error');
                    echo '</p>';
                }
                if ($this->session->flashdata('pesan')) {
                    echo '<p class="login-box-msg text-danger">';
                    echo $this->session->flashdata('pesan');
                    echo '</p>';
                }
                ?>
                <form action="<?= base_url('admin/c_login_admin') ?>" method="post">
                    <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">LOGIN</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.min.js"></script>

</body>

</html>