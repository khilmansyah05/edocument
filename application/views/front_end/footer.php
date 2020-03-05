<footer class="ff-section-boxed" style="background-color: #eaeaea">
  <div class="page-content container-fluid">
      <div class="col-sm-3">
        <div class="row">
          <div class="panel-body">
          <!-- <div class="panel"> -->
        <div class="headline style-2" style="text-align:right">
          <i class="ff-font-miu icon-chat56"></i>
          <img src='<?php echo base_url("assets/images/sanjiwani.png"); ?>' style="width:170px;height:100px;" title="sanjiwani"></img>
        </div>
        </div>
      </div>
    </div>
    <div class="col-sm-5">
      <div class="row">
        <div class="panel-body">
        <!-- <div class="panel"> -->
      <div class="headline style-2">
        <i class="ff-font-miu icon-chat56"></i>
        <h3>About Web</h2>
        <?php
          echo get_option('web_description');
        ?>
      </div>
      </div>
    </div>
  </div>
    <div class="col-sm-3">
      <div class="row">
        <div class="panel-body">
        <!-- <div class="panel"> -->
      <div class="headline style-2">
        <i class="ff-font-miu icon-chat56"></i>
        <h3 style="text-align:center">About Us</h2>
        <h5 class="pb-20" style="text-align:left">CV. Sanjiwani AR Medika</h2>
        <?php
          echo get_option('profil_perusahaan');
          echo "<br/>";
          echo get_option('address');
          echo "<br/>";
          echo get_option('telp1');
          echo "<br/>";
          echo get_option('telp2');
          echo "<br/>";
          echo get_option('email2');
          echo "<br/>";
          echo get_option('sosmed_fb');
          echo "<br/>";
        ?>
      </div>
      </div>
    </div>
  </div>
  </div>
</footer>
