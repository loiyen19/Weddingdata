<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $detail->Nama_produk; ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                        <a href="#">Detail Produk</a>
                        <span><?= $detail->Nama_produk; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?php echo base_url('asset/gambar/' . $detail->Gambar); ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <?php foreach ($gambar as $val) : ?>
                            <img data-imgbigurl="<?php echo base_url('asset/gambar/' . $val->Image); ?>" src="<?php echo base_url('asset/gambar/' . $val->Image); ?>" alt="">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $detail->Nama_produk; ?></h3>
                    <div class="product__details__rating">
                        <div class="rating-stars"><?php echo displayRatingStars($average_rating); ?><span>
                                <?php echo $average_rating ?>
                            </span>/<span><?= $jmlreview; ?> reviews </span></div>
                    </div>
                    <div class="product__details__price">Rp.<?= number_format($detail->Harga); ?> <small class="text-dark"><i>-<?= number_format($detail->Harga * $detail->Diskon / 100); ?>
                                /<?= $detail->Diskon; ?> %</i></small></div>

                    <div class="mb-3">

                    </div>
                    <a href="<?php echo site_url('cart/add_keranjang/' . $detail->ID_produk) ?>" class="primary-btn">Masukan Keranjang</a>

                    <ul>
                        <li><b>Tersedia </b> <span><?= $detail->Stok; ?></span><small class="ml-2">Per Pemesanan</small></li>
                        <li><b>Update</b> <span><?= $detail->Date_created; ?></span></li>
                        <li><b>Tanggal</b> <span><i><?= format_indo(date($detail->Tgl_masuk)); ?></i></span></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
            <?php echo $this->session->flashdata('not');?>
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Ulasan<span>( <?= $jmlreview; ?> )</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Infomation</h6>
                                <p><?= $detail->Deskripsi; ?></p>
                                <hr>
                                <div class="contact-form spad ">
                                    <form action="<?php echo site_url('jasa_beranda/rating') ?>" method="post">
                                    <input type="text" hidden name="id_produk" value="<?php echo $detail->ID_produk; ?>">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="rating" placeholder="1 - 5 Seberapa Besar anda merekomendasi ini...?">
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <textarea type="text" name="ulasan" placeholder="Tulis Sesuatu Tentang Ini..."></textarea>
                                        </div>

                                        <button type="submit" class="site-btn ml-1 col-6 btn-sm">Kirim</button>
                                    </form>
                                </div>
                            </div>
        
                    </div>
                    <div class="tab-pane" id="tabs-3" role="tabpanel">
                        <div class="product__details__tab__desc">
                            <?php if (empty($reviews)) : ?>
                                <p class="text-center">Hasil Tidak Ditemukan!</p>
                            <?php else : ?>
                                <?php foreach ($reviews as $val) : ?>
                                    <div class="card w-90 mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title"><b><?php echo $val->Nama_lengkap; ?></b></h6>
                                            <p class="card-text"><?php echo $val->Ulasan; ?></p>
                                            <span><i><?php echo format_indo(date($val->Date_created)); ?></i></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Produk Lainnya</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($produk as $val) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="<?php echo site_url('cart/add_keranjang/' . $val->ID_produk) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?php echo $val->Nama_produk; ?></a></h6>
                            <h5>Rp.<?= number_format($val->Harga) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->