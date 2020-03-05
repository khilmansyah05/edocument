<div class="ff-section-boxed" style="background-image:url(base_url('assets/images/about.jpg')) ; background-color:#ffff">
  <div class="page-content container-fluid">
    <div class="col-sm-12">
      <div class="row">
        <div class="panel-body">
          <!-- <div class="panel"> -->
          <div class="headline style-2">
            <i class="ff-font-miu icon-chat56"></i>
            <h4 class="pb-20" style="text-align:center">ABOUT US</h2>
            <h3 style="text-align:center"><?php
            echo get_option('tagline');
            ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="ff-section-boxed" style="background-color:#ffff">
  <div class="page-content container-fluid">
      <div class="col-sm-12">
        <div class="row">
          <div class="panel-body">
          <!-- <div class="panel"> -->
        <div class="headline style-2">
          <i class="ff-font-miu icon-chat56"></i>
          <p style="text-align:center"><?php
            echo get_option('profil_perusahaan');
           ?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="ff-section-boxed" style="background-color:#EDD600">
  <div class="page-content container-fluid">
    <div class="col-md-3">
    </div>
      <div class="col-md-6 ">
        <div class="row">
          <div class="panel-body">
          <!-- <div class="panel"> -->
        <div class="headline style-2">
          <i class="ff-font-miu icon-chat56"></i>
          <center><i class="icon fa-trophy" style="font-size:36px; color:white; text-align:center"></i></center>
          <h2 class="pb-20" style="text-align:center">VISI</h2>
          <p style="text-align:center"><?php
            echo get_option('visi');
           ?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="ff-section-boxed" style="background-color:#222222">
  <div class="page-content container-fluid">
    <div class="col-md-3">
    </div>
      <div class="col-sm-6">
        <div class="row">
          <div class="panel-body">
          <!-- <div class="panel"> -->
        <div class="headline style-2">
          <i class="ff-font-miu icon-chat56"></i>
          <center><i class="icon fa-flag" style="font-size:36px; color:white; text-align:center"></i></center>
          <h2 class="pb-20" style="text-align:center">Misi</h2>
          <p style="text-align:center"><?php
            // echo get_option('misi');
    				$x = get_option('misi');
    				$e = explode('|',$x);
            $j=1;
    				for($i=0; $i<count($e); $i++){
              echo "$j. ";
              $j++;
    					echo "$e[$i]";
    					echo"<br/>";
    				}
           ?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  $this->load->view('front_end/footer.php');
 ?>
