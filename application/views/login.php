<?php
  $this->load->view('header');
  $title = "Login";
  echo validation_errors('<div class="alert alert-danger">', '</div>');
  if(!empty($this->config->item('error'))){
    echo '<div class="alert alert-danger">'.$this->config->item('error').'</div>';
  }
  // $csrf = array(
  //   'name' => $this->security->get_csrf_token_name(),
  //   'hash' => $this->security->get_csrf_hash()
  // );
?>
  <form class="form-horizontal" method='POST' action='<?php echo base_url('discover/masuk'); ?>'>
    <h4>Login</h4>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group'>
      <label class="control-label col-sm-2">Username</label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Username' class='form-control' name='username' value='<?php echo set_value('username'); ?>'/>
      </div>
    </div>
    <div class='form-group'>
      <label class="control-label col-sm-2">Password</label>
      <div class="col-md-9 col-xs-12">
        <input type='password' placeholder='Masukkan Password' class='form-control' name='password' value='<?php echo set_value('password'); ?>'/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <button type='submit' class='btn btn-primary'>Login</button>
      </div>
    </div>
  </form>
<?php
  $this->load->view('footer');
?>
