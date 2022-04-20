<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?= base_url('admin/c_halaman_utama') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_produk' && $this->uri->segment(3) == 'select_produk') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Kelola Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_produk/select_produk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_produk' && $this->uri->segment(3) == 'select_produk') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_admin') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_transaksi') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_transaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_transaksi') {
                                                                                                echo 'active';
                                                                                            }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_retur_barang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_retur_barang') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Retur Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/c_login_admin/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            LogOut
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>