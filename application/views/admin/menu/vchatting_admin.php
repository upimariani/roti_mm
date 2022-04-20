<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fas fa-comments"></i>
                        </button>
                        <a href="<?= base_url('admin/c_halaman_utama') ?>"><i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Conversations are loaded here -->

                    <div class="direct-chat-messages">
                        <?php
                        foreach ($chatting as $key => $value) {
                            $id_pelanggan = $value->id_pelanggan;
                            if ($value->pelanggan_send != '0') {
                        ?>
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left"><?= $value->nama_pelanggan ?></span>
                                        <span class="direct-chat-timestamp float-right"><?= $value->time ?></span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?= $value->pelanggan_send ?>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                            <?php } else if ($value->admin_send != '0') {
                            ?>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Admin</span>
                                        <span class="direct-chat-timestamp float-left"><?= $value->time ?></span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        <?= $value->admin_send ?>
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- /.direct-chat-msg -->
                        <!-- /.contacts-list -->
                    </div>

                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form action="<?= base_url('admin/c_chatting/send') ?>" method="post">
                        <div class="input-group">
                            <input type="text" name="pesan" placeholder="Type Message ..." class="form-control" required>
                            <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
    </section>
</div>