 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>Jasa dan Produk
                     </h2>
                     <div class="breadcrumb__option">
                         <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                         <span>Jasa</span>
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
                         <h4>Harga</h4>
                         <div class="price-range-wrap">
                             <form action="<?php echo site_url('jasa_beranda/filter_harga'); ?>" method="get">
                                 <div class="price-input ">
                                     <div>
                                         <input type="text" name="min_price" placeholder="Min. Harga...">
                                     </div>
                                     <div class="mt-1">
                                         <input type="text" name="max_price" placeholder="Max. Harga...">
                                     </div>
                                 </div>
                                 <button class="btn btn-primary btn-sm mt-1" type="submit">Cari</button>
                             </form>
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
                         <h2>Flash Salle..</h2>
                     </div>
                     <div class="row">
                         <div class="product__discount__slider owl-carousel">
                             <?php foreach ($produk_terbaru as $val) : ?>
                                 <div class="col-lg-4">
                                     <div class="product__discount__item">
                                         <div class="product__discount__item__pic set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                                             <div class="product__discount__percent"><?= $val->Diskon; ?>%</div>
                                             <ul class="product__item__pic__hover">
                                               
                                                 <li><a href="<?php echo site_url('cart/add_keranjang/' . $val->ID_produk) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                             </ul>
                                         </div>
                                         <div class="product__discount__item__text">
                                             <h5><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?= $val->Nama_produk ?></a></h5>
                                             <div class="product__item__price">Rp.<?= number_format($val->Harga * $val->Diskon / 100); ?> <span><?= number_format($val->Harga) ?></span></div>
                                         </div>
                                     </div>
                                 </div>
                             <?php endforeach; ?>
                         </div>
                     </div>
                 </div>
                 <div class="filter__item">
                     <div class="row">
                         <div class="col-lg-4 col-md-5">
                             <div class="filter__sort">
                                 <span>Urutkan</span>
                                 <form action="<?php echo site_url('jasa_beranda/filter_tahun'); ?>" method="get">
                                     <select name="tahun">
                                         <?php for ($year = date('Y'); $year >= 2020; $year--) : ?>
                                             <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                         <?php endfor; ?>
                                     </select>
                                     <button class="btn btn-primary btn-sm" type="submit">Cari</button>
                                 </form>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-4">
                             <div class="filter__found">
                                 <h6><span><?= $jml_produk; ?></span> Produk ditemukan!</h6>
                             </div>
                         </div>
                         <div class="col-lg-4 col-md-3">
                             <div class="filter__option">
                                 <span class="icon_grid-2x2"></span>
                                 <span class="icon_ul"></span>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <?php foreach ($data as $val) : ?>
                         <div class="col-lg-4 col-md-6 col-sm-6">
                             <div class="product__item">
                                 <div class="product__item__pic set-bg" data-setbg="<?php echo base_url('asset/gambar/' . $val->Gambar); ?>">
                                     <ul class="product__item__pic__hover">
                                         <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                         <li><a href="<?php echo site_url('cart/add_keranjang/' . $val->ID_produk) ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                     </ul>
                                 </div>
                                 <div class="product__item__text">
                                     <span><i><?php echo $val->Kategori; ?></i></span>
                                     <h6><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?php echo $val->Nama_produk; ?></a></h6>
                                     <h5>Rp.<?= number_format($val->Harga) ?></h5>
                                 </div>
                             </div>
                         </div>
                     <?php endforeach; ?>
                 </div>
                 <div class="product__pagination">
                     <?php echo $this->pagination->create_links(); ?>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Product Section End -->