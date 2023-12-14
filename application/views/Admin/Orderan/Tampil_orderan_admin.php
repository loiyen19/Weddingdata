<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Orderan</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Nama Customer....">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">cari</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>



    <div class="col-md-12 col-sm-12 ">
      <?php echo $this->session->flashdata('not'); ?>
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Orderan Masuk</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Customer</th>
                      <th>Total Order</th>
                      <th>Tanggal Order</th>
                      <th>Lihat</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php $no = 1;
                    foreach ($orderan as $key => $val) {  ?>
                      <tr>
                        <td><?= $val->ID_order; ?></td>
                        <td><?php echo $val->Nama_lengkap; ?></td>
                        <td>Rp.<?= number_format($val->Total) ?></td>
                        <td><?php echo format_indo(date($val->Date_created));?></td>
                        <td>
                          <a href="<?php echo site_url('orderan/nota_pembelian/'.$val->ID_order)?>" class="btn btn-sm btn-primary">Detail</a>
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
  </div>
  