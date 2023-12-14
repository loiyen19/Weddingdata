<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Pembayaran</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <!-- form input mask -->
            <div class="col-md-12 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_content">

                    <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th width="50" >No</th>
                                          <th>ID Order</th>
                                          <th>Nominal</th>
                                          <th>Bank</th>
                                          <th>Rekening </th>
                                          <th>Bukti</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no=1; foreach($pembayaran as $val) { ?>
                                      <tr>
                                          <th scope="row"><?php echo $no++;?></th>
                                          <td><b>#<?php echo $val->ID_order; ?><b</td>
                                          <td>Rp.<?= number_format($val->Nominal)?></td>
                                          <td><?php echo $val->Bank; ?> </td>
                                          <td><?php echo $val->Rekening; ?></td>
                                          <td><img src="<?php echo base_url('asset/gambar/'.$val->Gambar)?>" ></td>
                                      </tr>
                                      <?php $no++; } ?>
                                  </tbody>

                              </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
