<div class="ff-section-boxed" style="background-color:#ffff">
  <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/f6e4e1987bff39897af603b2644d6169.png" style="width:100% !important;">
    <!-- <div class="page-content container-fluid"> -->
      <!-- <div class="col-sm-12">
        <div class="row">
          <div class="panel-body">
            <div class="crousel-slide">
              <div class="bx-wrapper" style="max-width: 100%;">
                <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 401px;">
                  <ul style="width: auto; position: relative;">
                    <li style="float: none; list-style: none; position: absolute; width: 1336px; z-index: 0; display: none;">
                    <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/908922deadbf5937c27292984c0b2581.jpg" style="width:100% !important;">
                  </li>
                  <li style="float: none; list-style: none; position: absolute; width: 1336px; z-index: 50; display: list-item;">
                  </li>
                  <li style="float: none; list-style: none; position: absolute; width: 1336px; z-index: 0; display: none;">
                      <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/756ef4c81cf5a1be62795e384a6508da.png" style="width:100% !important;">
                    </li>
                    <li style="float: none; list-style: none; position: absolute; width: 1336px; z-index: 0; display: none;">
                      <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/b6c08754bfaa39b893ecf3712ca75ff2.png" style="width:100% !important;">
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    <!-- </div> -->
  </div>
<!-- background-image:url("assets/images/idi4.png"); -->
  <section style=' background-color:#EDD600; background-position:center right; background-repeat:no-repeat'>
  <div class="container">
          <div class="page-content container-fluid" >
              <div class="col-sm-12">
                <div class="row">
                  <div class="panel-body">
                  <!-- <div class="panel"> -->
                <div class="headline style-2">
                  <i class="ff-font-miu icon-chat56" ></i>
                  <h2 class="pb-20" style="text-align:center; color:white">EVENT TERBARU</h2>
                  <p><?php
                  $i = 1;
                    for($i=0;$i<=1;$i++){
                      $h=$hasil[$i];?>

                      <div class="col-md-12">
                        <h3><?php echo "$h[nama_event]<br/>"?></h3>
                      </div>
                      <div class="col-md-4">
                        <img class="img-circle" src='<?php echo base_url("uploads/event/$h[gambar]")?>' style="width:300px;height:300px;">
                        <br/>
                        <br/>
                      </div>
                      <div class="col-md-8">
                      <?php
                      echo '<p style="text-align:justify;">'.substr($h['deskripsi'],0,200).'...'.'</p>';
                      echo "</div>";


                    }?>


                   </p>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>

        </div>

<?php
  $this->load->view('front_end/footer.php');
 ?>
