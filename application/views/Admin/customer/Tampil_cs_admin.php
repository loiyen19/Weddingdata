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
                    <table class="table table-striped">
                                  <thead>
                                      <tr>
                                          <th width="50" >No</th>
                                          <th>ID_Customer</th>
                                          <th>Email</th>
                                          <th>Subjek</th>
                                          <th>Pesan </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no=1; foreach($cs as $val) { ?>
                                      <tr>
                                          <th scope="row"><?php echo $no;?></th>
                                          <td><b><?php echo $val->ID_customer; ?><b</td>
                                          <td><?php echo $val->Email; ?></td>
                                          <td><?php echo $val->Subjek; ?> </td>
                                          <td><?php echo $val->Pesan; ?></td>
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
