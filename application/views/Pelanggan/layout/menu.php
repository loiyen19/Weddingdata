    <!-- saat diperbesar -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="<?php site_url('cart') ?>"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="<?php echo site_url('beranda-wed/login_pelanggan') ?>"><i class="fa fa-user"></i> Login</a>
            </div>
            <div class="header__top__right__auth ml-1">
                <a href="<?php echo site_url('beranda_wed/registrasi') ?>"><i class="fa fa-user"></i><b>User_nama</b></a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- konsisi besar -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> HelloWord@gmail.com</li>
                                <li><b>PT. WeddingCreative</b></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">

                            <div class="header__top__right__auth ml-1">
                                <a href="<?php echo site_url('adminpanel') ?>"><i class="fa fa-user"></i><b>Login Admin</b></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?= ($active == 'home') ? 'active' : '' ?>"><a href="<?php echo site_url('beranda_wed') ?>">Beranda</a></li>
                            <li class="<?= ($active == 'jasa') ? 'active' : '' ?>"><a href="<?php echo site_url('jasa_beranda') ?>">Jasa</a></li>
                            <li class="<?= ($active == 'order') ? 'active' : '' ?>"><a href="<?php echo site_url('order_beranda') ?>">Order</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="<?php echo site_url('order_beranda') ?>">Pesanan</a></li>
                                </ul>
                            </li>
                            <li class="<?= ($active == 'cs') ? 'active' : '' ?>"><a href="<?php echo site_url('customer_service') ?>">Service</a></li>
                            <li class="<?= ($active == 'akun') ? 'active' : '' ?>"><a href="<?php echo site_url('akun_beranda') ?>">Akun</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="<?php echo site_url('akun_beranda') ?>"><i class="fa fa-user "></i>Profile saya</a></li>
                                    <li><a href="<?php echo site_url('beranda_wed/logout') ?>"><i class="fa fa-sign-out "></i>Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>

                            <li><a href="<?php echo site_url('Cart') ?>"><i class="fa fa-shopping-bag"></i><span>
                                        <?= $this->cart->total_items(); ?>
                                    </span></a></li>
                        </ul>
                        <div class="header__cart__price">Total Rp : <span><?= number_format($this->cart->total()); ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->

    <section class="hero <?php echo ($selected_menu == 'hero-normal') ? 'hero-normal' : ''; ?>">
        <div class="container">
            <div class="row ">
                <div class="col-lg-3 ">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Kategori</span>
                            <?php $kategori = $this->M_menu_pelanggan->get_all_data(); ?>
                        </div>

                        <?php foreach ($kategori as $val) { ?>
                            <ul>
                                <li><a href="<?= site_url('beranda_wed/kategori/' . $val->ID_kategori .    $val->Kategori) ?>"><?= $val->Kategori; ?></a></li>
                            </ul>
                        <?php
                        } ?>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?php echo site_url('Pencarian_beranda'); ?>" method="get">
                                <input type="text" name="keyword" value="<?php echo $this->input->get('keyword'); ?>" placeholder="Cari Produk / Jasa...">
                                <button type="submit" class="site-btn">Cari</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+62 822-5059-0837</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <!-- bener -->
                    <?php if ($isWeddingOrganizer) : ?>

                    <?php else : ?>
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo base_url('assets/img/banner1.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class=""><b>Wedding Planner</b></h3>
                                        <p class="text-white">" Kami Membantu Anda Dalam Mempersiapkan Pernikahan " </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo base_url('assets/img/banner2.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class=""><b>Wedding Team</b></h3>
                                        <p class="text-white">" Kami Memiliki Tim Yang Siap Membantu " </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo base_url('assets/img/banner3.jpg') ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class=""><b>Wedding Organizatiion</b></h3>
                                        <p class="text-white">" Kami Siap Memberikan Pelayanan Terbaik"</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>