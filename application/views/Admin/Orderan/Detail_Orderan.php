<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Detail Order</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <!-- form input mask -->
            <div class="col-md-7 col-sm-12  ">

                <div class="x_panel">
                  
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td width="200" >No. Orderan</td>
                                    <td><?php echo $detail->ID_orders;?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal </td>
                                    <td><?php echo $detail->Tgl_acara;?> </td>
                                </tr>
                                <tr>
                                    <td>Jam Order</td>
                                    <td><?php echo $detail->Jam_order;?></td>
                                </tr>
                                <tr>
                                    <td>Status Order</td>
                                    <td><i><?php echo $detail->Status_order;?></i><a href="<?php echo site_url('Orderan/ubah_status/' . $detail->ID_orders); ?>" 
                                    class="btn ml-5 text-white btn-sm btn-warning">Ubah</a></td>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rincian Order</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th width="50" >No</th>
                                          <th>Nama Produk</th>
                                          <th>Jumlah</th>
                                          <th>Harga Satuan</th>
                                          <th>Total<small class="ml-2"> ( Jumlah * Harga )</small></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no=1; foreach($rincian as $val) { ?>
                                      <tr>
                                          <th scope="row"><?php echo $no++;?></th>
                                          <td><?php echo $val->Nama_produk; ?></td>
                                          <td><?php echo $val->Jumlah; ?></td>
                                          <td><?= number_format($val->Harga) ?></td>
                                          <td>Rp.<?= number_format($val->total_harga)?></td>
                                      </tr>
                                      <?php $no++; } ?>

                                      <tr>
                                        <td class="text-right font-weight-bold" colspan="4">Total Rp.</td>
                                        <td colspan="4">100.000.000</td>
                                      </tr>
                                      <tr>
                                        <td class="text-right font-weight-bold" colspan="4">Diskon</td>
                                        <td colspan="4"><i>10 %</i></td>
                                      </tr>
                                      <tr>
                                        <td class="text-right font-weight-bold" colspan="4">Grand Total <small>Rp.</small></td>
                                        <td colspan="4"><i>100.1000</i></td>
                                      </tr>
                                  </tbody>

                              </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
