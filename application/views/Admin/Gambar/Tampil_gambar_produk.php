<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Foto Produk</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">

            <!-- tambah foto -->
            <div class="col-md-12 col-sm-12 ">
                <?php echo $this->session->flashdata('not'); ?>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Foto</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="<?php echo site_url('image/upload_gambar') ?>">
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control " name="id_produk">
                                        <option>Pilih Nama produk Anda</option>
                                        <?php foreach ($produk as $val) { ?>
                                            <option value="<?php echo $val->ID_produk; ?>"><?php echo $val->Nama_produk; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?= form_error('produk', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Pilih Foto
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="gambar[]" multiple class="form-control" />
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success  btn-sm">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- tambah foto -->
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Foto Jasa</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk / Jasa </th>
                                    <th>Gambar</th>
                                    <th>Waktu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ; foreach($foto as $val){?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?= $val->Nama_produk;?></td>
                                    <td><?= $val->Image;?></td>
                                    <td><?= $val->Date_created;?></td>
                                    <td>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('image/delete/'.$val->ID_image)?>">Hapus</a>
                                    </td>
                                </tr>
                                <?php $no++;}?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>