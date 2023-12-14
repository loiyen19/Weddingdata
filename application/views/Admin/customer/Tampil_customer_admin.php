<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Customer</h3>
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
                                          <th>Nama_lengkap</th>
                                          <th>Alamat</th>
                                          <th>Rekening</th>
                                          <th>No Telfon </th>
                                          <th>Email</th>
                                          <th>Foto Profil</th>
                                          <th>Terdaftar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no=1; foreach($customer as $val) { ?>
                                      <tr>
                                          <th scope="row"><?php echo $no;?></th>
                                          <td><b><?php echo $val->Nama_lengkap; ?><b</td>
                                          <td><?php echo $val->Alamat; ?></td>
                                          <td><?php echo $val->Rekening; ?> </td>
                                          <td><?php echo $val->Telfon; ?></td>
                                          <td><?php echo $val->Email; ?></td>
                                          <td><?php echo $val->Gambar; ?></td>
                                          <td><?php echo format_indo(date($val->Date_created));?></td>
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
