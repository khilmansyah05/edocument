<?php
  $this->load->view('header');
  // $title = "Tambah Event";
  // echo validation_errors('<div class="alert alert-danger">', '</div>');
  // if(!empty($this->config->item('error'))){
  //   echo '<div class="alert alert-danger">'.$this->config->item('error').'</div>';
  // }

  echo $this->session->flashdata('message');
?>

    <!-- Example Full-Bg Line -->
    <div class="example-wrap">
      <br/>
      <h4 class="example-title">Dashboard Manager</h4>
      <br/>
      <div class="example example-responsive">
        <div class="w-sm-400" id="exampleFlotFullBg"></div>
      </div>
    </div>
    <!-- End Example Full-Bg Line -->
  </div>

  <?php
    $this->load->view('footer');
  ?>
