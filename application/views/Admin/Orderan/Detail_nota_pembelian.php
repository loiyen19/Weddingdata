  <!-- page content -->
  <div class="right_col" role="main">
      <div class="">
          <div class="page-title">
              <div class="title_left">
                  <h3>Detail Order adf</h3>
              </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
              <!-- form input mask -->
              <div class="col-md-5 col-sm-12  ">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Keterangan Orderan</h2>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>No. Orderan</th>
                                      <th>Tanggal Order</th>
                                      <th>Ubah Status Pesanan</th>
                                  </tr>

                              </thead>
                              <tbody>
                                  <?php foreach ($rincian as $val) : ?>
                                      <tr>
                                          <th><?= $val->ID_orders ?></th>
                                          <th><?php echo format_indo(date($val->Tgl_order)); ?></th>
                                          <th>
                                              <a href="" class="btn btn-sm btn-warning">Ubah</a>
                                          </th>
                                      </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>

                      </div>
                  </div>


              </div>
              <!-- /form input mask -->
              <!-- form input knob -->
              <div class="col-md-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Rincian Orderan</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                          <div class="x_content">

                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th>Nama Produk</th>
                                          <th>Jumlah</th>
                                          <th>Harga Satuan</th>
                                          <th>Total<small class="ml-2"> ( Jumlah * Harga )</small></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        foreach ($rincian as $val) : ?>
                                          <tr>
                                              <td><?php echo $val->Nama_produk ?></td>
                                              <td><?php echo $val->Quantity; ?></td>
                                              <td><?= number_format($val->Price) ?></td>
                                              <td>Rp.<?= number_format($val->Price * $val->Quantity) ?></td>
                                          </tr>


                                          <tr>
                                              <td class="text-right font-weight-bold" colspan="4">Total Rp.</td>
                                              <td colspan="4">Rp.<?= number_format($val->Price * $val->Quantity) ?></td>
                                          </tr>
                                          <tr>
                                              <td class="text-right font-weight-bold" colspan="4">Diskon</td>
                                              <td colspan="4"><i>95%</i></td>
                                          </tr>
                                          <tr>
                                              <td class="text-right font-weight-bold" colspan="4">Grand Total <small>Rp.</small></td>
                                              <td colspan="4"><i>Rp.<?= number_format($val->Price * $val->Quantity * 95 / 100) ?></i></td>
                                          </tr>
                                      <?php endforeach; ?>
                                  </tbody>

                              </table>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- /form input knob -->
              <!-- form input knob -->
              <div class="col-md-12">
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>Data Customer</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                          <div class="x_content">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <td class="text" width="500">Nama </td>
                                          <td><?php echo $customer->Nama_lengkap;?></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Nomor Rekenening</td>
                                          <td> <i><?php echo $customer->Rekening;?></i></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Email</td>
                                          <td><?php echo $customer->Email;?></td>
                                      </tr>
                                      <tr>
                                          <td class="text">No.Telfon</td>
                                          <td><?php echo $customer->Telfon;?></td>
                                      </tr>

                                  </thead>
                              </table>
                          </div>
                          <h5><i>Bukti Pembayaran <small class="text-danger">*</small></i></h5>
                          <div class="x_content">
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <td class="text" width="500">Nama Customer </td>
                                          <td><?php echo $bayar->Nama?></td>
                                      </tr>
                                      <tr>
                                          <td class="text">No. Orders</td>
                                          <td> <i><?php echo $bayar->ID_order?></i></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Nominal</td>
                                          <td>Rp.<?= number_format($bayar->Nominal)?></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Jenis Bank</td>
                                          <td><?php echo $bayar->Bank?></td>
                                      </tr>
                                      <tr>
                                          <td class="text">No. Rekening</td>
                                          <td><?php echo $bayar->Rekening?></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Status Pembayaran</td>
                                          <td><button class="btn btn-sm btn-success"><?php echo $bayar->Status?></button></td>
                                      </tr>
                                      <tr>
                                          <td class="text">Bukti Pembayaran</td>
                                          <td><img src="<?php echo base_url('asset/gambar/'.$bayar->Gambar)?>" 
                                          width="100%" alt=""></td>
                                      </tr>

                                  </thead>
                              </table>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- /form input knob -->

          </div>
      </div>
  </div>