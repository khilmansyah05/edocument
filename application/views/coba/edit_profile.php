<?php
  $this->load->view('header');
  $title = "Edit Profile";
  // echo validation_errors('<div class="alert alert-danger">', '</div>');
  // if(!empty($this->config->item('error'))){
  //   echo '<div class="alert alert-danger">'.$this->config->item('error').'</div>';
  // }

  echo $this->session->flashdata('message');
  // $csrf = array(
  //   'name' => $this->security->get_csrf_token_name(),
  //   'hash' => $this->security->get_csrf_hash()
  // );
?>
  <form class="form-horizontal" method='POST' action='<?php echo $action; ?>'>
    <h4>Edit User</h4>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Nama : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Nama' class='form-control' name='nama' value='<?php echo (isset($get['nama']))?$get['nama']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">NIK : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan NIK' class='form-control' name='NIK' value='<?php echo (isset($get['NIK']))?$get['NIK']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Divisi : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Divisi' class='form-control' name='divisi' value='<?php echo (isset($get['divisi']))?$get['divisi']:'';?>'/>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-md-3 form-control-label">
          <button type='submit' class='btn btn-primary'>Save</button>
      </div>
    </div>
  </form>
<?php
  $this->load->view('footer');
?>
