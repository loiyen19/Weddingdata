
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                            <a href="<?php echo site_url('cart') ?>">Keranjang Belanja</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Customer</h4>
                <form  method="post">
                    <div class="row">
                    <input type="hidden" name="ID_customer" value="<?php echo $user['ID_customer']; ?>">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama Anda</p>
                                        <input type="text" disabled value="<?= $user['Nama_lengkap']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nomot Telfon</p>
                                        <input type="text"disabled value="<?= $user['Telfon']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email</p>
                                        <input type="text"disabled value="<?= $user['Email']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Alamat</p>
                                        <input type="text"disabled value="<?= $user['Alamat']?>">
                                    </div>
                                </div>
                                <div>
                                    <h4>Data Acara Anda</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Tanggal Acara<span class="text-danger">*</span></p>
                                        <?= form_error('tanggal_acara', '<small class="text-danger pl-1">', '</small>'); ?>
                                        <input type="date" name="tanggal_acara">
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Jam Order<span class="text-danger">*</span></p>
                                        <?= form_error('jam_order', '<small class="text-danger pl-1">', '</small>'); ?>
                                        <input type="time" name="jam_order">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Alamat Acara / Detail Alamat <span>*</span></p>
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                <textarea class="form form-control" name="alamat" type="text" placeholder="Masukan Detail Alamat Seperti : jalan,Rt,RW..."
                                rows="5"></textarea>
                            </div>
                            <div class="checkout__input">
                                <p>Catatan</p>
                                <textarea class="form form-control" type="text" name="catatan" placeholder="Masukan Catatan Untuk Toko..."
                                 rows="5"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Nota Pembayaran</h4>
                                <div class="checkout__order__products">Produk / Jasa<span>Total</span></div>
                              
                                <ul>
                                <?php foreach ($cartItems as $item) : ?>
                                    <li><?php echo $item['name']; ?> <span> Rp.<?= number_format($item['subtotal']);?></span></li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="checkout__order__subtotal">Total Item <span> <?= $this->cart->total_items(); ?></span></div>
                                <div class="checkout__order__subtotal">Diskon Toko <span>95 %</span></div>
                                <div class="checkout__order__total">Total <span>Rp.<?= number_format($this->cart->total()*95/100 ); ?></span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Pesanan Saya Sudah Sesuai.
                                        <input type="checkbox" id="acc-or" name="cek">
                                        <span class="checkmark"></span>
                                        <?= form_error('cek', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </label>
                                </div>
                                <p>Durasi Pembayaran Pesanan Anda adalah 1 X 24 Jam.Buat Pesanan dan Pilih Metode Pembayaran Anda!</p>
                               
                                <button  class="site-btn">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

   