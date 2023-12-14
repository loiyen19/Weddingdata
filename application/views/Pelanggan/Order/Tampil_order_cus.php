<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Pesanan</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
                        <span>Pesanan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="product-details spad">
    <div class="container">
        <div class="row">
            <?php echo $this->session->flashdata('not'); ?>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Belum Bayar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Diproses (<?= $total_order; ?>)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Selesai <span></span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">

                                <div class="shoping__cart__table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="shoping__product">No. Order</th>
                                                <th>Total</th>
                                                <th>Tanggal Order</th>
                                                <th>Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($order)) : ?>
                                                <p class="text-center">Tidak Ada Orderan...!</p>
                                            <?php else : ?>
                                                <?php $no = 1;
                                                foreach ($order as $val) { ?>
                                                    <tr>
                                                        <td class="shoping__cart__item">
                                                            <h5>#<?php echo $val->ID_order; ?></h5>
                                                            <?php
                                                            // Tampilkan status pembayaran
                                                            if ($val->Status === 'Belum DiBayar') {
                                                                echo '<span class="btn btn-sm btn-warning">Belum Dibayar</span>';
                                                            } elseif ($val->Status === 'Sudah DiBayar') {
                                                                echo '<span class="btn btn-sm btn-success">Sudah Dibayar</span>';
                                                            } else {
                                                                echo $val->Status;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="shoping__cart__quantity">
                                                            <b>Rp.<?= number_format($val->Total, 0) ?></b><br>

                                                        </td>
                                                        <td class="shoping__cart__quantity">
                                                            <?php echo format_indo(date($val->Date_created)); ?>
                                                        </td>
                                                        <td class="shoping__cart__total">
                                                            <!-- Button trigger modal -->
                                                            <?php

                                                            if ($val->Status === 'Belum DiBayar') {
                                                                echo '<a class="btn btn-sm btn-primary" href="' . site_url('order_beranda/pembayaran/' . $val->ID_order) . '">Bayar!</a>';
                                                            } else {
                                                                echo '<p class=""><span class="fa fa-check"></span>Berhasil!</p>';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                } ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Status Pesanan</th>
                                            <th>Ubah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($order_item as $val) { ?>
                                            <tr>
                                                <td><?php echo $val->ID_orders; ?></td>
                                                <td><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?= $val->Nama_produk; ?></a></td>
                                                <td><?= $val->Quantity; ?></td>
                                                <td>Rp.<?= number_format($val->Price) ?></td>
                                                <td>Rp.<?= number_format($val->Total, 0) ?></td>
                                                <td>

                                                    <?php
                                                    // Tampilkan status pembayaran
                                                    if ($val->Status === 'Sedang diProses') {
                                                        echo '<span class="btn btn-sm btn-success"><i class="fa fa-clock-o "></i>Sedang Diproses</span>';
                                                    } else {
                                                        echo '<span class=" "><i class="fa fa-check"></i>Pesanan Selesai</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <i class="fa fa-edit"></i><a href="" type="button" class="btn btn-sm ">
                                                        Ubah Alamat
                                                    </a>
                                                </td>
                                            </tr>


                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                                <!-- Button trigger modal -->


                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <div class="product__details__tab__desc">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Alamat</th>
                                                <th>Catatan</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($order_selesai as $val) { ?>
                                                <tr>
                                                    <td><?php echo $val->ID_orders; ?></td>
                                                    <td><a href="<?= site_url('Jasa_beranda/detail_jasa_produk/' . $val->ID_produk) ?>"><?= $val->Nama_produk; ?></a>
                                                </td>
                                                    <td><?= $val->Quantity; ?></td>
                                                    <td>Rp.<?= number_format($val->Price) ?></td>
                                                    <td>Rp.<?= number_format($val->Total, 0) ?></td>
                                                    <td>Rp.<?= $val->Alamat?></td>
                                                    <td><?= $val->Catatan?></td>
                                                   
                                                </tr>


                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                    </table>
                                    <!-- Button trigger modal -->


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title " id="exampleModalLabel">Pembayaran Anda!</h5>
                <h6 class="modal-title ml-5 " id="exampleModalLabel">#<?= $order['ID_order'] ?></h6>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-header">
                <div class="copyable-container">
                    <div class="mt-2">
                        <h5 class="modal-title " id="exampleModalLabel">Pilih Bank Untuk Pembayaran!</h5>
                        <label class="form-label "><b>Bank Bri</b></label>
                        <div class="copyable form-control" id="copyText">
                            0011-1233-12313
                            <span class="ml-5"><i class=" fa fa-solid fa-copy" onclick="copyTextToClipboard()"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="form-label"><b>Bank Bri</b></label>
                        <div class="copyable form-control " id="copyText">
                            0011-1233-12313
                            <span class="ml-5"><i class=" fa fa-solid fa-copy" onclick="copyTextToClipboard()"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h6>Total Pembayaran : </h6>
            </div>
            <br>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Atas Nama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">No. Orderan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nominal</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Bank</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Rekening</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Upload Bukti <span class="text-danger">*</span></label>
                        <input type="file" class="form-control">
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Upload</button>
            </div>

        </div>
    </div>
</div>