<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Keranjang Belanja</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                        <span>Cek Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <?php if ($this->cart->total_items() > 0) : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php foreach ($cartItems as $item) : ?>
                                <tbody>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="img/cart/cart-1.jpg" alt="">
                                            <h5><?php echo $item['name']; ?></h5>
                                        </td>
                                        <td class="shoping__cart__price">Rp.
                                            <?= number_format($item['price']); ?>
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <form method="post" action="<?php echo site_url('cart/update_cart'); ?>">
                                                    <div class="pro-qty">
                                                        <input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>">
                                                        <input type="number" name="qty" value="<?php echo $item['qty']; ?>" min="1">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>

                                            </div>

                                        </td>
                                        <td class="shoping__cart__total">
                                            Rp. <?= number_format($item['subtotal']); ?>
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="<?php echo site_url('cart/remove_from_cart/' . $item['rowid']); ?>"><span class="icon_close"></a></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?php echo site_url('jasa_beranda')?>" class="primary-btn cart-btn">Lanjut Belanja</a>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total Belanja</h5>
                    <ul>
                        <li>Total Item <span> <?= $this->cart->total_items(); ?></span></li>
                        <li>Total <span>Rp.<?= number_format($this->cart->total()); ?></span></li>
                    </ul>
                    <a href="<?php echo site_url('cart/checkout') ?>" class="primary-btn">Cek Out </a>
                </div>
            </div>

        </div>
    <?php else : ?>
        <?php echo $this->session->flashdata('not'); ?>
        <h4 class="">Keranjang Belanja Kosong!</h4>

    <?php endif; ?>
    </div>
</section>
<!-- Shoping Cart Section End -->