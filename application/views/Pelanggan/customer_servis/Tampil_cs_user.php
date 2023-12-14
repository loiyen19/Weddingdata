<div class="contact-form spad">
   
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Bantuan!</h2>
                </div>
                <?php echo $this->session->flashdata('not'); ?>
            </div>
        </div>
        <form action="<?php echo site_url('customer_service/tambah') ?>" method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" disabled placeholder="<?= $user['Nama_lengkap'] ?>">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="email" name="email" placeholder="Masukan Email anda...">
                </div>
                <div class="col-lg-12 col-md-12">
                    <input type="text" name="subjek" placeholder="Subjek...">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="ketikan pesan anda..." name="pesan"></textarea>
                    <button type="submit" class="site-btn ml-5">SEND MESSAGE</button>
                </div>
            </div>
        </form>

    </div>
</div>