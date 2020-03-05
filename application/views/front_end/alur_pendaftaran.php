<div class="ff-section-boxed" style="background-color:#c3c3c3">
  <div class="page-content container-fluid">
      <div class="col-sm-1">
      </div>
    <div class="col-sm-11">
      <div class="row">
        <div class="panel-body">
        <!-- <div class="panel"> -->
        <div class="headline style-2">
          <i class="ff-font-miu icon-chat56"></i>
          <h2 class="pb-20" style="text-align:center"><b>Cara Pendaftaran</b></h2>
          <br/>
          <br/>

          <div class="col-sm-4">
            <img src='<?php echo base_url("assets/images/choices.png"); ?>' style="width:128px;height:128px;">
            <h4 style="text-align:left">Langkah Pertama</h4>
            <p>Memilih Event yang akan diikuti</p>
            <br/>
          </div>

          <div class="col-sm-4">
            <img src='<?php echo base_url("assets/images/form2.png"); ?>' style="width:128px;height:128px;">
            <h4 style="text-align:left">Langkah Kedua</h4>
            <p>Mengisi data diri dan data pekerjaan pada form pendaftaran yang ada <a href="<?php echo site_url('Customer/pendaftaran')?>">disini</a> .</p>
            <br/>
          </div>

          <div class="col-sm-4">
            <img src='<?php echo base_url("assets/images/pay.png"); ?>' style="width:128px;height:128px;">
            <h4 style="text-align:left">Langkah Ketiga</h4>
            <p>Melakukan pembayaran sesuai dengan biaya event. Pembayaran dapat melalui : <?php
              $x = get_option('cara_pesan');
              $e = explode('|',$x);
              for($i=0; $i<count($e); $i++){
                echo "<li>$e[$i]</li>";
              }
            ?></p>
            <br/>
          </div>


          <div class="col-sm-1">
          </div>

          <div class="col-sm-5">
            <img src='<?php echo base_url("assets/images/notif2.png"); ?>' style="width:128px;height:128px;">
            <h4 style="text-align:left">Langkah Keempat</h4>
            <p>Menunggu notifikasi dari kami. Notifikasi dikirim ke email masing-masing.</p>
            <br/>
          </div>

          <div class="col-sm-1">
          </div>

          <div class="col-sm-5">
            <img src='<?php echo base_url("assets/images/check.png"); ?>' style="width:128px;height:128px;">
            <h4 style="text-align:left">Langkah Kelima</h4>
            <p>Melakukan daftar ulang sebelum acara dimulai.</p>
            <br/>
          </div>


        </div>
        </div>
      </div>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
</div>


<?php
  //$this->load->view('front_end/footer.php');
 ?>
