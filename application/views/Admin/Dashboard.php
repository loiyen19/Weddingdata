
<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row" style="display: inline-block;">
    <div class="tile_count">
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-folder-o"></i> Total Jasa</span>
        <div class="count"><?= $jumlah_jasa ?></div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-folder-o"></i> Kategori</span>
        <div class="count"><?= $jumlah_kategori ?></div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-folder-o"></i> Orderan Masuk </span>
        <div class="count green"><?= $jumlah_order ?></div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-folder-o"></i> Customer</span>
        <div class="count"><?= $jumlah_cs ?></div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-folder-o"></i> Pembayaran</span>
        <div class="count"><?= $jumlah_bayar ?></div>
      </div>
      <div class="col-md-2 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-folder-o"></i> ulasan</span>
        <div class="count"><?= $jumlah_rating ?></div>
      </div>
      <div class="col-md-4 col-sm-4  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Pendapatan</span>
        <div class="count"><?= number_format($jumlah)?></div>
     
      </div>
    </div>
  </div>
  <!-- /top tiles -->

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="dashboard_graph">

        <div class="row x_title">
          <div class="col-md-6">
            <h6><i>Orderan Masuk</i></h6>
          </div>

          <div class="x_content">

            <table class="table table-striped">
              <thead>
                <tr>
                 
                  <th>ID order</th>
                  <th>Nama Customer</th>
                  <th>Jumlah</th>
                  <th>Waktu</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach($detail_order as $val){ ?>
                <tr>
                
                  <td><?php echo $val->ID_order;?> </td>
                  <td><?php echo $val->Nama_lengkap;?></td>
                  <td>Rp.<?= number_format($val->Total)?></td>
                  <td><?php echo $val->Date_created;?></td>
                  <td>
                    <?php 
                    if($val->Status === 'Belum DiBayar'){
                        echo '<span class="btn btn-sm btn-warning text-white">Belum Dibayar</span>';
                    }else{
                      echo '<span class="btn btn-sm btn-success text-white">Sudah Bayar</span>';
                    }
                    ?>
                  </td>
                </tr>
              <?php $no++; }  ?>
              </tbody>
            </table>

          </div>

        </div>




        <div class="clearfix"></div>
      </div>
    </div>

  </div>
  <br />

  <div class="row">

  
  </div>
</div>
<!-- /page content -->