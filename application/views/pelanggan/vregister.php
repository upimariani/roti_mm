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
              <div class="aa-myaccount-register">
                <h4>Register</h4>
                <form action="<?= base_url('pelanggan/c_login/register') ?>" method="post" class="aa-login-form">
                  <label for="">Nama Pelanggan<span>*</span></label><?php echo form_error('nama', '<span class="label label-danger">', '</span>'); ?>
                  <input type="text" name="nama" placeholder="Masukkan Nama Pelanggan" value="<?= set_value('nama') ?>">
                  <label for="">Alamat<span>*</span></label><?php echo form_error('alamat', '<span class="label label-danger">', '</span>'); ?>
                  <input type="text" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat') ?>">
                  <label for="">No Telepon<span>*</span></label><?php echo form_error('no_tlpon', '<span class="label label-danger">', '</span>'); ?>
                  <input type="number" class="form-control" name="no_tlpon" placeholder="Masukkan No Telepon" value="<?= set_value('no_tlpon') ?>">
                  <label for="">Username<span>*</span></label><?php echo form_error('username', '<span class="label label-danger">', '</span>'); ?>
                  <input type="text" name="username" placeholder="Masukkan Username" value="<?= set_value('username') ?>">
                  <label for="">Password<span>*</span></label><?php echo form_error('password', '<span class="label label-danger">', '</span>'); ?>
                  <input type="password" name="password" placeholder="Masukkan Password" value="<?= set_value('password') ?>">
                  <button type="submit" class="aa-browse-btn">Register</button>
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