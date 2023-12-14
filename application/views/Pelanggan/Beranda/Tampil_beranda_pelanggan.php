<!-- kategori pilihan -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($semua_produk as $val) : ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                            <h5><a href="#"><?php echo $val->Nama_produk ?></a></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Produk dan Jasa Kami</h2>
                </div>

            </div>
        </div>
        <div class="row featured__filter">
            <?php foreach ($produk as $val) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">

                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="<?php echo site_url('cart/add_keranjang/' . $val->ID_produk) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?php echo $val->Nama_produk; ?></a></h6>
                            <h5> Rp.<?= number_format($val->Harga) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<!-- Featured Section End -->



<!-- produk lama -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Produk Order</h4>
                  
                    <div class="latest-product__slider owl-carousel">
                    <?php foreach($top_product as $val ) : ?>
                        <div class="latest-prdouct__slider__item">
                            <a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $val->Nama_produk;?></h6>
                                    <span>Total Order : <?= $val->total_orders ?></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach;?>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Terbaru...</h4>
                    <div class="latest-product__slider owl-carousel">
                    <?php foreach($produk_terbaru as $val ) : ?>
                        <div class="latest-prdouct__slider__item">
                            <a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $val->Nama_produk?></h6>
                                    <span>Rp.<?= number_format($val->Harga)?></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest..</h4>
                    <div class="latest-product__slider owl-carousel">
                    <?php foreach($produk_lama as $val ) : ?>
                        <div class="latest-prdouct__slider__item">
                            <a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $val->Nama_produk?></h6>
                                    <span>Rp.<?= number_format($val->Harga)?></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3 text-center">
                    <br>
                    <h4><b>Rekomendasi</b></h4>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($produkrek as $val) : ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><b><?= $val->Nama_produk; ?></b></h5>
                            <p class="card-text">Rp.<?php echo number_format($val->Harga) ?></p>
                        </div>
                        <a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>" class="btn btn-sm btn-Secondary">Lihat Detail<span class="">
                                <i class="fa fa-solid fa-arrow-right"></i></span></a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
