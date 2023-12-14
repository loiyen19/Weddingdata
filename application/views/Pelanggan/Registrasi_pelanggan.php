  <!-- Contact Form Begin -->
  <div class="contact-form spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="contact__form__title">
                      <h2>Registrasi</h2>
                      <?php echo $this->session->flashdata('not'); ?>
                  </div>
              </div>
            
          </div>

          <form method="post" enctype="multipart/form-data" action="<?php echo site_url('beranda_wed/registrasi')?>" >
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <label class="ml-1">Nama Lengkap </label>
                      <?= form_error('nama_lengkap', '<small class="text-danger ml-1 ">', '</small>'); ?>
                      <input type="text" name="nama_lengkap" value="<?php echo set_value('nama_lengkap') ?>" placeholder="Nama Lengkap Anda...">
                     
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <label class="ml-1">No. Rekening</label>
                      <?= form_error('nomor_rekening', '<small class="text-danger ml-1 ">', '</small>'); ?>
                      <input type="text" name="nomor_rekening"value="<?php echo set_value('nomor_rekening') ?>" placeholder="Nomor Rekening Anda... ">
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <label class="ml-1">No. Telfon</label>
                      <?= form_error('nomor_telfon', '<small class="text-danger ml-1 ">', '</small>'); ?>
                      <input type="text" name="nomor_telfon" value="<?php echo set_value('nomor_telfon') ?>" placeholder="Nomor Telfon Anda...">
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <label class="ml-1">Email</label>
                      <?= form_error('email', '<small class="text-danger ml-1 ">', '</small>'); ?>
                      <input type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="Masukan Email exp: customer@gmail.com...">
                  </div>
                  <div class="col-lg-6  ">
                      <label class="ml-1">Foto Profil</label>
                      <input type="file" name="gambar" ></input>
                  </div>
                  <div class="col-lg-6 ">
                      <label class="ml-1">Alamat</label>
                      <?= form_error('alamat', '<small class="text-danger ml-1
                             ">', '</small>'); ?>
                      <input type="text" name="alamat" value="<?php echo set_value('email') ?>" placeholder="Masukan Alamat Lengkap Anda..." ></input>
                  </div>
                 
                  <div class="col-lg-4 ">
                          <label>Password <small class="text-danger">*</small></label>
                          <?= form_error('password', '<small class="text-danger ml-1 ">', '</small>'); ?>
                          <input type="text" name="password"  placeholder="Password anda..."></input>
                      </div>
                      <div class="col-lg-4 ">
                          <label>Konfirmasi Password <small class="text-danger">*</small></label>
                          <?= form_error('konfirmasi', '<small class="text-danger ml-1 ">', '</small>'); ?>
                          <input type="password" name="konfirmasi" placeholder="Konfirmasi Password..."></input>
                      </div>

                  <div class="col-12 text-center">
                      <button type="submit" class="site-btn">Daftar</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <!-- Contact Form End -->