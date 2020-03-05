<?php

  $last     = show_alert('last_posting');
  echo $this->session->flashdata('message');

?>

  <form class="form-horizontal" method='POST' action='<?php echo $action; ?>'>
    <h4>Tambah Pengguna</h4>
    <br/>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Nama : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Nama' class='form-control' name='nama' value='<?php echo (ISSET ($last['nama']))? $last['nama'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Email : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Email' class='form-control' name='email' value='<?php echo (ISSET ($last['email']))? $last['email'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Username : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Username (max. 10 karakter)' class='form-control' name='username' value='<?php echo (ISSET ($last['username']))? $last['username'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Password : </label>
      <div class="col-md-9 col-xs-12">
        <input type='password' placeholder='Masukkan Password harus 8 karakter' class='form-control' name='password' value='<?php echo (ISSET ($last['password']))? $last['password'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">No Telpon : </label>
      <div class="col-md-9 col-xs-12">
        <input type='tel' placeholder='Masukkan No Telpon' class='form-control' name='no_telpon' value='<?php echo (ISSET ($last['no_telpon']))? $last['no_telpon'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">Hak Akses : </label>
        <div class="col-md-9 col-xs-12">
          <select name='level' class="form-control"/>
          <?php
            if  (ISSET ($last['level']) && $last['level'] == '0'){
              echo"<option value='0' selected>Admin</option>";
              echo"<option value='1'>Staff</option>";
            }else if(ISSET ($last['level']) && $last['level'] == '1'){
              echo"<option value='1' selected>Staff</option>";
              echo"<option value='0'>Admin</option>";
            }else{
              echo"<option value=''>Pilih Salah Satu</option>";
              echo"<option value='0'>Admin</option>";
              echo"<option value='1'>Staff</option>";
            }
           ?>
          </select>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-md-3 form-control-label">
        <div class="col-sm-offset-2 col-sm-10">
          <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
      </div>
    </div>
  </form>
<?php
  $this->load->view('footer');
?>
