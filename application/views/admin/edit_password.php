<?php
  $this->load->view('header');

  echo $this->session->flashdata('message');

?>
  <form class="form-horizontal" method='POST' action='<?php echo $action; ?>'>
    <h4>Ganti Password</h4>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Password Lama : </label>
      <div class="col-md-9 col-xs-12">
        <input type='password' placeholder='Masukkan Password Lama' class='form-control' name='password' value='<?php echo set_value('password'); ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Password Baru : </label>
      <div class="col-md-9 col-xs-12">
        <input type='password' placeholder='Masukkan Password Baru (min. 8 karakter)' class='form-control' name='passwordBaru' value='<?php echo set_value('passwordBaru'); ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Konfirmasi Password : </label>
      <div class="col-md-9 col-xs-12">
        <input type='password' placeholder='Masukkan Konfirmasi Password' class='form-control' name='cpassword' value='<?php echo set_value('cpassword'); ?>'/>
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
