 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>Harga Produk & Jasa </h2>
                     <div class="breadcrumb__option">
                         <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                         <a href="<?php echo site_url('jasa_beranda') ?>">Jasa</a>
                         <span>Filter</span>
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

             <div class="col-lg-9 col-md-7">
                 <div class="product__discount">
                     <div class="section-title product__discount__title">
                         <h2>Pencarian ditemukan..</h2>
                     </div>
                     <div class="filter__item">
                         <div class="row">
                             <div class="col-lg-4 col-md-4">
                                 <div class="filter__found">
                                     <h6><span><?php echo $total_data; ?></span> Data ditemukan...</h6>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <?php if (empty($filterproduk)) : ?>
                             <h5 class="">Produk / Jasa Kosong!</h5>
                         <?php else : ?>
                             <?php foreach ($filterproduk as $val) : ?>
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
                 <?php endif; ?>

                 </div>
             </div>
         </div>
 </section>
 <!-- Product Section End -->