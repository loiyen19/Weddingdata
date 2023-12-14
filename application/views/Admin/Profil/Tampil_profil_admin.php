

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> <b> <?= $user['Username'];?></b> Profile</h3>
              </div>
            </div>
            
            <div class="clearfix">
         
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
              <?php echo $this->session->flashdata('not'); ?>
                <div class="x_panel">
                  <div class="x_title">
                
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view " src="<?php echo base_url('asset/production/images/profil.jpg')?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <a class="btn mt-1 btn-success text-white" href="<?php echo site_url('profil/ubah_password')?>"><i class="fa fa-edit m-right-xs"></i>Ubah Password</a>
                      <br />

                      <!-- start skills -->
                     

                    </div>
                      <div class="profile_title">
                    <div class="col-md-9 col-sm-9  ">

                    <h3> <?= $user['Nama_lengkap'];?></h3>

                      <ul class="list-unstyled user_data">
                        <li>Email :</i> <b>  <?= $user['Email'];?></b>
                        </li>

                        <li>
                          <i> No Telfon : </i> <b> <?= $user['No_telp'];?></b>
                        </li>
                      </ul>

                      <div class="profile_title">
                        <div class="col-md-6">
                        <a class="btn mt-3 btn-success text-white" href="<?php echo site_url('profil/edit_profil_admin')?>"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      