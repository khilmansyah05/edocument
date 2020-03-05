<div class="ff-section-boxed" style="background-color:#ffff">
  <div class="page-content container-fluid">
      <div class="col-sm-12">
        <div class="row">
          <div class="panel-body">
            <div class="crousel-slide">
              <div class="bx-wrapper" style="max-width: 100%;">
                <div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 401px;">
                  <ul style="width: auto; position: relative;">
                    <li style="float: none; list-style: none; position: absolute; width: 1140px; z-index: 0; display: none;">
                    <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/f6e4e1987bff39897af603b2644d6169.png" style="width:100% !important;">
                  </li>
                  <li style="float: none; list-style: none; position: absolute; width: 1140px; z-index: 50; display: list-item;">
                    <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/908922deadbf5937c27292984c0b2581.jpg" style="width:100% !important;">
                  </li>
                  <li style="float: none; list-style: none; position: absolute; width: 1140px; z-index: 0; display: none;">
                      <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/756ef4c81cf5a1be62795e384a6508da.png" style="width:100% !important;">
                    </li>
                    <li style="float: none; list-style: none; position: absolute; width: 1140px; z-index: 0; display: none;">
                      <img src="http://sandbox.fingermediasolution.com/hellosemarang/assets/banners/b6c08754bfaa39b893ecf3712ca75ff2.png" style="width:100% !important;">
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section style='background-image:url("assets/images/idi4.png"); background-color:#dcf5de; background-position:center right; background-repeat:no-repeat'>
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
                  $i = 0;
                    for($i=0;$i<=1;$i++){
                      $h=$hasil[$i];
                      echo "$h[nama_event]<br/>
                      <img src='uploads/event/.$h[gambar]'><br/>
                      <br/>
                      <br/>
                      ";

                    }
                   ?></p>
                  <p>Hello Printing Ideas is a full-service print shop and printing service company. We print, carve, and engrave on any surface, in any color, and to fit any size. We offer services in both digital printing and wide format printing or large format printing. From the start, we work with you as a graphic partner and visual designer, providing you the highest quality products at competitive prices.</p>
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
