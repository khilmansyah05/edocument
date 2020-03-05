<section class="title">
       <div class="container">
           <div class="row-fluid">
               <div class="span6">
                   <h1>Cara Pemesanan</h1>
               </div>
               <div class="span6">
                   <ul class="breadcrumb pull-right">
                       <li><a href="<?php echo site_url('home_cs/dashboard');?>">Beranda</a> <span class="divider">/</span></li>
                       <li class="active">Cara Pesan</li>
                   </ul>
               </div>
           </div>
       </div>
</section>
<section id="career" class="container">

 <div class="left">
     <h2>Cara Pemesanan Produk :</h2>
   </div>
 <hr>
   <div class="row-fluid">
     <!-- Left Column -->
     <div class="span6">
       <h3>1. Langkah Pertama</h3>
       <p>Tentukan produk pilihan Anda</p>
       <hr>

      <h3>2. Langkah Kedua</h3>
      <p>Konsultasikan ketersediaan dan harga produk kepada Customer Service kami melalui telepon/ SMS ke nomor 08112811366</p>
      <hr/>

     <h3>3. Langkah Ketiga</h3>
   <p>Setelah harga disepakati, silahkan transfer uang pembayaran ke salah satu rekening kami</p>
   <ul class="arrow">
   <?php
     $x = get_option('cara_pesan');
     $e = explode('|',$x);
     for($i=0; $i<count($e); $i++){
       echo "<li>$e[$i]</li>";
     }
   ?>
   </ul>
    </div>
    <!-- /Left Column -->

    <!-- Right Column -->
    <div class="span6">
   <h3>4. Langkah Keempat</h3>
    <p>Konfirmasikan pembayaran Anda kepada Customer Service kami melalui telepon atau melalui SMS dengan format: NAMA LENGKAP [spasi] NAMA PRODUK [spasi] NOMOR TELEPON [spasi] ALAMAT TUJUAN PENGIRIMAN</p>

    <hr/>

   <h3>5. Langkah Kelima</h3>
   <p>Setelah konfirmasi transfer diterima, pemesanan Anda akan segera kami proses.</p>
   <hr>
    </div>
  <!-- /Right Column -->

</div>
<p>&nbsp;</p>

</section>
