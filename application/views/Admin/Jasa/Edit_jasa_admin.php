<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Jasa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <?php echo $this->session->flashdata('not'); ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Jasa</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo site_url('jasa/Edit_jasa/'.$produk->ID_produk); ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kategori
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control " name="kategori">
                                        <option>Pilih kategori produk</option>
                                        <?php foreach ($kategori as $val) { ?>
                                            <option value="<?php echo $val->ID_kategori; ?>"  <?php if($val->ID_kategori == $produk->ID_kategori) echo 'selected'; ?>>
                                            <?php echo $val->Kategori; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?= form_error('kategori', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Produk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="nama_produk" value="<?php echo $produk->Nama_produk ?>" class="form-control">
                                </div>
                                <?= form_error('nama_produk', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deskripsi
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea type="text" name="deskripsi" rows="5" class="form-control"><?php echo $produk->Deskripsi ?></textarea>
                                </div>
                                <?= form_error('deskripsi', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="harga" value="<?php echo $produk->Harga ?>" class="form-control">
                                </div>
                                <?= form_error('harga', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal Masuk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" name="tanggal_masuk" value="<?php echo $produk->Tgl_masuk ?>" class="form-control">
                                </div>
                                <?= form_error('tanggal_masuk', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Stok
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="stok" value="<?php echo $produk->Stok ?>" class="form-control">
                                </div>
                                <?= form_error('stok', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Diskon
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="diskon" value="<?php echo $produk->Diskon ?>" class="form-control">
                                </div>
                                <?= form_error('diskon', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Foto Produk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="gambar" class="form-control">
                                    <div class="mt-2">
                                    <?php if (!empty($produk->Gambar)) : ?>
                                        <img src="<?php echo base_url('asset/Gambar/' . $produk->Gambar); ?>" width="150" height="110">
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>