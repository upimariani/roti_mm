<!-- Cart view section -->
<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="aa-myaccount-login">
                                <h4>Login</h4>
                                <?php
                                if ($this->session->flashdata('error')) {
                                    echo '<div class="alert alert-danger" role="alert">';
                                    echo $this->session->flashdata('error');
                                    echo '</div>';
                                }
                                if ($this->session->flashdata('pesan')) {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo $this->session->flashdata('pesan');;
                                    echo '</div>';
                                }
                                ?>
                                <form action="<?= base_url('pelanggan/c_login/login') ?>" method="POST" class="aa-login-form">
                                    <label for="">Username<span>*</span></label>
                                    <input type="text" name="username" placeholder="Username" required>
                                    <label for="">Password<span>*</span></label>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <button type="submit" class="aa-browse-btn">Login</button><br><br><br>
                                    <br>
                                    <div class="aa-register-now">
                                        Don't have an account?<a href="<?= base_url('pelanggan/c_login/register') ?>">Register now!</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->