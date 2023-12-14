<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>Hasil Pencarian...</h4>
                </div>

            </div>
        </div>
        <div class="row featured__filter">
            <?php if (empty($pencarian)) : ?>
                <h2 class="text-center">Hasil Tidak Ditemukan...!</h2>
            <?php else : ?>
                <?php foreach ($pencarian as $val) : ?>
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
            <?php endif; ?>
        </div>
    </div>
</section>

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
                        <a href="#" class="btn btn-sm btn-Secondary">Lihat Detail<span class="">
                                <i class="fa fa-solid fa-arrow-right"></i></span></a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>