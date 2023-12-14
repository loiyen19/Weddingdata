<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url('assets/img/wedd.jpg') ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>Pesanan</h2>
          <div class="breadcrumb__option">
            <a href="<?php echo site_url('beranda_wed') ?>">Beranda</a>
            <span>Pesanan</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="product-details spad">
  <div class="container">
    <div class="row">
      <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col">
          <div class="card">
            <div class="card-header bg-warning text-white">
            <i class="fa fa-warning ml-3"></i> Pesanan Masuk  : <span class="ml-2" >  <?php echo format_indo(date($detail->Date_created)); ?></span>
            </div>

            <div class="card-body">
              <h3 class="card-title">Total Pembayaran : <span class="ml-2" onclick='copyText(<?php echo $detail->Total; ?>)'>
               Rp.<b><?= number_format($detail->Total) ?><button class="btn btn-sm btn-success ml-2" ><i class="fa fa-copy"></i></button></b></span></h3>
              <p class="card-text"> <span class="fa fa-warning"></span>Pesanan Akan Otomatis Terhapus Jika Waktu Pembayaran Sudah Lewat Yaitu <b>1 X 24 Jam.</b>
                Harap Segera Melakukan Pembayran!
              </p>
              <table class="table mt-1">
                <h6>Daftar No Rekening Toko Kami.</h6>
                <thead>
                  <tr>
                    <th scope="col">Bank</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Rekening</th>
                    <th scope="col">Salin</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($rekening as $val){ ?>
                  <tr>
                    <td><?php echo $val->Nama_rekening?></td>
                    <td><?php echo $val->Nama?></td>
                    <td><div><?php echo $val->No_rekening?></div></td>
                    <td><button class="btn btn-sm btn-primary ml-2" onclick='copyText(<?php echo $val->No_rekening; ?>)'>
                    <i class=" fa fa-solid fa-copy" ></i></button></td>
                  </tr>
                  <?php $no++; }?>
            
                </tbody>
              </table>

            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card">
              <div class="card-header bg-primary text-white">
                Pembayaran<span class="ml-2"><b>#<?= $detail->ID_order; ?></b></span>
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo site_url('order_beranda/pembayaran/'.$detail->ID_order)?>"  enctype="multipart/form-data" >
                <input type="text" name="id_order" hidden  class="form-control" value="<?= $detail->ID_order;?>">
                  <div class="form-group mb-3">
                    <label for="exampleInputEmail1" class="form-label">Atas Nama</label>
                    <input type="text" name="nama_bayar" class="form-control" placeholder="Nama Anda...">
                    <?= form_error('nama_bayar', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No. Orderan</label>
                    <input type="text" disabled  class="form-control" value="<?= $detail->ID_order;?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nominal</label>
                    <input type="text" name="nominal" class="form-control" 
                    value="<?= $detail->Total?>" placeholder="Masuakan nominal Exp.100000 / tidak mengunakan ( . )">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Bank</label>
                    <input type="text" name="bank" class="form-control" placeholder="Masukan Nama Bank...">
                    <?= form_error('bank', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Rekening</label>
                    <input type="text" name="rekening" class="form-control" placeholder="Masukan No rekening ">
                    <?= form_error('rekening', '<small class="text-danger pl-1">', '</small>'); ?>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Upload Bukti <span class="text-danger">*</span></label>
                    <input type="file" name="gambar" class="form-control">
                    
                  </div>
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-sm btn-primary ">Upload</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>