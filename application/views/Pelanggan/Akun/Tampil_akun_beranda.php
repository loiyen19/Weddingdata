<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Profil</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Beranda</a>
                        <span>Profil</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                        <img src="<?php echo base_url('assets/fotoprofil/profil.png') ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama Lengkap : <?= $user['Nama_lengkap'] ?></h5>
                            <p class="card-text">Email : <?= $user['Email'] ?></p>
                            <p class="card-text">No. Telfon : <?= $user['Telfon'] ?></p>
                            <p class="card-text">Rekening : <i><?= $user['Rekening'] ?></i></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 ml-1" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">Alamat : <?= $user['Alamat'] ?></p>
                        </div>
                        <p class="card-text ml-3"><?= format_indo(date($user['Date_created'])) ?><small class="text-muted ml-2">
                                <span class="fa fa-check-square"></span> Terdaftar</small></p>
                    </div>
                </div>
            </div>

        </div>
</section>