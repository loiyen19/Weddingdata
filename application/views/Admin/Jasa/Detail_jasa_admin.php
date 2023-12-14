        <!-- page content -->
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail Jasa</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jasa</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 ">
                      <div class="product-image">
                        <img src="<?php echo base_url('asset/gambar/'.$detail->Gambar);?>"  />
                      </div>
                    </div>

                    <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title"><?php echo $detail->Nama_produk?></h3>

                      <p><?php echo $detail->Deskripsi?></p>
                      <br />
                      <br />
                      <br />

                      <div class="">
                        <div class="product_price">
                          <h1 class="price">Rp.<?= number_format($detail->Harga)?></h1>
                
                          <br>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12">

                    <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informasi </h2>
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
                          <th>Stok</th>
                          <th>Tanggal Masuk</th>
                          <th>Diskon</th>
                          <th>Kategori</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $detail->Stok?></td>
                          <td><?php echo $detail->Tgl_masuk?></td>
                          <td><?php echo $detail->Diskon?></td>
                          <td><?php echo $detail->ID_kategori?></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      