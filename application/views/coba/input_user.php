<?php

  $last     = show_alert('last_posting');
  echo $this->session->flashdata('message');

?>

  <form class="form-horizontal" method='POST' action='<?php echo $action; ?>'>
    <h4>Tambah Pengguna</h4>
    <br/>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
	<div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Id User : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Id' class='form-control' name='id_user' value='<?php echo (ISSET ($last['id_user']))? $last['id_user'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Nama : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan Nama' class='form-control' name='nama' value='<?php echo (ISSET ($last['nama']))? $last['nama'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">NIK : </label>
      <div class="col-md-9 col-xs-12">
        <input type='text' placeholder='Masukkan NIK' class='form-control' name='NIK' value='<?php echo (ISSET ($last['NIK']))? $last['NIK'] :''; ?>'/>
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
      <label class="col-xs-12 col-md-3 form-control-label">Divisi : </label>
      <div class="col-md-9 col-xs-12">
        <input type='tel' placeholder='Masukkan Divisi' class='form-control' name='divisi' value='<?php echo (ISSET ($last['divisi']))? $last['divisi'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">Level : </label>
        <div class="col-md-9 col-xs-12">
          <select name='level' class="form-control"/>
          <?php
            if  (ISSET ($last['level']) && $last['level'] == '1'){
              echo"<option value='1' selected>Admin</option>";
              echo"<option value='2'>SPV</option>";
			  echo"<option value='3'>Staff</option>";
			  echo"<option value='4'>Manager</option>";
            }else if(ISSET ($last['level']) && $last['level'] == '2'){
              echo"<option value='1'>Admin</option>";
              echo"<option value='2' selected>SPV</option>";
			  echo"<option value='3'>Staff</option>";
			  echo"<option value='4'>Manager</option>";
            }else if(ISSET ($last['level']) && $last['level'] == '3'){
              echo"<option value='1'>Admin</option>";
              echo"<option value='2'>SPV</option>";
			  echo"<option value='3' selected>Staff</option>";
			  echo"<option value='4'>Manager</option>";
            }else if(ISSET ($last['level']) && $last['level'] == '4'){
              echo"<option value='1'>Admin</option>";
              echo"<option value='2'>SPV</option>";
			  echo"<option value='3'>Staff</option>";
			  echo"<option value='4' selected>Manager</option>";
            }
			else{
              echo"<option value=''>Pilih Salah Satu</option>";
              echo"<option value='1'>Admin</option>";
              echo"<option value='2'>SPV</option>";
			  echo"<option value='3'>Staff</option>";
			  echo"<option value='4'>Manager</option>";
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
