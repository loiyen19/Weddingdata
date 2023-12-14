<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cek Out</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_title">
                        <h2> Detail Cek Out </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.Order</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Tanggal Order</th>
                                    <th>Jam Order</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($order_temp as $val) {  ?>
                                    <tr>
                                        <th><?php echo $val->ID_orders; ?></th>
                                        <th><?php echo $val->Nama_produk; ?></th>
                                        <th><?php echo $val->Quantity; ?></th>
                                        <th><?= number_format($val->Price)?></th>
                                        <th><?php echo format_indo(date($val->Tgl_order));?></th>
                                        <th><?php echo $val-> Jam_order;?></th>
                                        <th><?php echo $val-> Alamat;?></th>
                                        <th>
                                            <?php echo $val-> Status;?> <span class=""> <a href="<?php echo site_url('orderan/ubah_status/'.$val->ID_order_item)?>" 
                                            class="btn btn-sm btn-primary">Ubah</a> </span>
                                           
                                        </th>
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