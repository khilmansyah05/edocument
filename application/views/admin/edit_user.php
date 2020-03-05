<?php
  $this->load->view('header');
  $title = "Edit User";
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
      <label class="col-xs-12 col-md-3 form-control-label">Email : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Email' class='form-control' name='email' value='<?php echo (isset($get['email']))?$get['email']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Username : </label>
      <div class="col-md-9 col-xs-12">
        <input type='' placeholder='Masukkan Username (max. 10 karakter)' class='form-control' name='username' value='<?php echo (isset($get['username']))?$get['username']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">No Telpon : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan No Telpon' class='form-control' name='no_telpon' value='<?php echo (isset($get['no_telpon']))?$get['no_telpon']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">Hak Akses : </label>
        <div class="col-md-9 col-xs-12">
          <select name='level' class="form-control"/>
          <?php
          if(isset($get['level']) && $get['level'] == 0) {
              echo "<option value='0' selected>Admin</option>";
              echo"<option value='1'>Staff</option>";
          } else if(isset($get['level']) && $get['level'] == 1){
                  echo "<option value='1' selected>Staff</option>";
                  echo"<option value='0'>Admin</option>;";
                }else{
                    echo"<option value='0'>Admin</option>";
                    echo"<option value='1'>Staff</option>";
                }
          ?>
          </select>
        </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">Status : </label>
        <div class="col-md-9 col-xs-12">
          <select name='user_status' class="form-control"/>
          <?php
          if(isset($get['user_status']) && $get['user_status'] == 0) {
              echo "<option value='0' selected>Aktif</option>";
              echo"<option value='1'>Tidak Aktif</option>";
          } else if(isset($get['user_status']) && $get['user_status'] == 1){
                  echo "<option value='1' selected>Tidak Aktif</option>";
                  echo"<option value='0'>Aktif</option>;";
                }else{
                    echo"<option value='0'>Aktif</option>";
                    echo"<option value='1'>Tidak Aktif</option>";
                }
          ?>
          </select>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12form-control-label">
        <div class="col-md-12 form-control-label">
        </div>
          <div class="col-md-3 form-control-label">
            <a href='<?php echo site_url('user/user_list');?>' class='btn btn-primary'>Back</a>
          </div>
          <div class="col-xs-11 col-md-8 form-control-label">
            <button type='submit' class='btn btn-primary'>Save</button>
          </div>
      </div>
    </div>
  </form>
<?php
  $this->load->view('footer');
?>
