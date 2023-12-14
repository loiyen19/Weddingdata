  <!-- Contact Form Begin -->
  <div class="contact-form spad">
      <div class="container">

          <div class="row">
              <div class="col-lg-12 ">
                  <div class="contact__form__title text-left ml-1">
                      <h2>Login !</h2>
                      <?php echo $this->session->flashdata('not'); ?>
                  </div>

              </div>
          </div>

          <form method="post" action="<?php echo site_url('beranda_wed/login_pelanggan') ?>">
              <div class="row">
                  <div class="col-lg-6 col-md-6 ">
                      <label class="ml-2">Email </label>
                      <?= form_error('email', '<small class="text-danger ml-1 ">', '</small>'); ?>
                      <input type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="Masukan Email Anda...">
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <label class="ml-2">Password</label>
                      <?= form_error('password', '<small class="text-danger ml-1 ">', '</small>'); ?>
                      <input type="text" name="password" placeholder="Masukan Password Anda... ">
                  </div>
                  <div class="col-12 text-left ">
                      <button type="submit" class="site-btn">Masuk</button>
                  </div>
              </div>
          </form>
          <div class="col-12 text-left  mt-5 ">
          <h5>belum punya akun ? <span><a href="<?php echo site_url('beranda_wed/registrasi') ?>">Dafttar Akun</a></h5></span>
      </div>
      </div>
     
  </div>

  <!-- Contact Form End -->