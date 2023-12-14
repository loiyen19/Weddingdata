 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2><?= $detail->Kategori; ?></h2>
                     <div class="breadcrumb__option">
                         <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                         <span>Kategori</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Section End -->

 <!-- Product Section Begin -->
 <section class="product spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-5">
                 <div class="sidebar">

                     <div class="sidebar__item">
                         <div class="latest-product__text">
                             <h4>Terbaru</h4>
                             <div class="latest-product__slider owl-carousel">
                                 <?php foreach ($produk_terbaru as $val) : ?>
                                     <div class="latest-prdouct__slider__item">

                                         <a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>" class="latest-product__item">
                                             <div class="latest-product__item__pic">
                                                 <img src="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>" alt="">
                                             </div>
                                             <div class="latest-product__item__text">
                                                 <h6><?php echo $val->Nama_produk; ?></h6>
                                                 <span>$30.00</span>
                                             </div>
                                         </a>

                                     </div>
                                 <?php endforeach; ?>
                             </div>

                         </div>
                     </div>
                     <div class="sidebar__item">
                         <div class="latest-product__text">
                             <h4>Latest Products</h4>
                             <div class="latest-product__slider owl-carousel">
                                 <?php foreach ($produk_lama as $val) : ?>
                                     <div class="latest-prdouct__slider__item">
                                         <a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>" class="latest-product__item">
                                             <div class="latest-product__item__pic">
                                                 <img src="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>" alt="">
                                             </div>
                                             <div class="latest-product__item__text">
                                                 <h6><?= $val->Nama_produk ?></h6>
                                                 <span>Rp.<?= number_format($val->Harga) ?></span>
                                             </div>
                                         </a>
                                     </div>
                                 <?php endforeach; ?>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="col-lg-9 col-md-7">
                 <div class="product__discount">
                     <div class="section-title product__discount__title">
                         <h2><?= $detail->Kategori ?></h2>
                     </div>

                     <div class="row">
                         <?php if (empty($produk_kategori)) : ?>
                             <h5 class="mb-5">Produk / Jasa Kosong!</h5>
                         <?php else : ?>
                             <div class="product__discount__slider owl-carousel">

                                 <?php foreach ($produk_kategori as $val) : ?>
                                     <div class="col-lg-4">
                                         <div class="product__discount__item">
                                             <div class="product__discount__item__pic set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                                                 <div class="product__discount__percent">-<?php echo $val->Diskon; ?>%</div>
                                                 <ul class="product__item__pic__hover">
                                                     <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                 </ul>
                                             </div>
                                             <div class="product__discount__item__text">
                                                 <span><?php echo $val->Tgl_masuk; ?></span>
                                                 <h5><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?php echo $val->Nama_produk; ?></a></h5>
                                                 <div class="product__item__price">Rp.<?= number_format($val->Harga) ?><span>$36.00</span></div>
                                             </div>
                                         </div>
                                     </div>
                                 <?php endforeach; ?>


                             </div>
                     </div>
                 <?php endif; ?>
                 </div>
                 <div class="filter__item">
                     <div class="row">


                     </div>
                 </div>

                 <div class="row">
                     <?php foreach ($produk_kategori as $val) : ?>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                             <div class="product__item">
                                 <div class="product__item__pic set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                                     <ul class="product__item__pic__hover">
                                         <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                     </ul>
                                 </div>
                                 <div class="product__item__text">
                                     <h6><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?php echo $val->Nama_produk; ?></a></h6>
                                     <h5>Rp.<?= number_format($val->Harga) ?></h5>
                                     <small><?php echo $val->Date_created; ?></small>
                                 </div>
                             </div>
                         </div>
                     <?php endforeach; ?>
                 </div>
                 <div class="product__pagination">

                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Product Section End -->