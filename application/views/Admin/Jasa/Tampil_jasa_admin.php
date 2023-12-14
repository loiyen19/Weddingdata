<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Jasa</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <?php echo $this->session->flashdata('not'); ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Jasa</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo site_url('jasa') ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Kategori
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control " name="kategori">
                                        <option>Pilih kategori produk</option>
                                        <?php foreach ($kategori as $val) { ?>
                                            <option value="<?php echo $val->ID_kategori; ?>"><?php echo $val->Kategori; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?= form_error('kategori', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nama Produk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="nama_produk" class="form-control">
                                </div>
                                <?= form_error('nama_produk', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deskripsi
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea type="text" name="deskripsi" rows="5" class="form-control"></textarea>
                                </div>
                                <?= form_error('deskripsi', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Harga
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="harga" class="form-control">
                                   
                                </div>
                                <?= form_error('harga', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tanggal Masuk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" name="tanggal_masuk" class="form-control">
                                </div>
                                <?= form_error('tanggal_masuk', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tersedia
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="stok" class="form-control">
                                </div>
                                <?= form_error('stok', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Diskon
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="diskon" class="form-control">
                                </div>
                                <?= form_error('diskon', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Foto Produk
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-sm btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- tambah foto -->
            <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Jasa </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nama Jasa</th>
                                    <th>Harga</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Detail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($jasa as $val) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><i><?php echo $val->Kategori; ?></i></td>
                                        <td><?php echo $val->Nama_produk; ?></td>
                                        <td>Rp.<?= number_format($val->Harga); ?></td>
                                        <td><?php echo format_indo(date( $val->Tgl_masuk)) ?></td>
                                        <td><?php echo anchor('jasa/detail_jasa/' . $val->ID_produk, '
                        <div class="btn btn-sm btn-success"><b>Detail</b></div>') ?></td>
                                        <td>
                                            <?php echo anchor('jasa/Edit_jasa/' . $val->ID_produk, '<div class="btn btn-sm btn-danger"><b>Edit</b></div>') ?>
                                            <?php echo anchor('jasa/Hapus_jasa/' . $val->ID_produk, '<div class="btn btn-sm btn-primary "> <b>Hapus</b></div>') ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>