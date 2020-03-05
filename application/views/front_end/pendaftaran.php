<?php
  $this->load->view('header');
  $last     = show_alert('last_posting');
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
<div class="page-content container-fluid">
    <div class="col-sm-12">
      <div class="row">
        <div class="panel-body">
          <form class="form-horizontal" method='POST' enctype="multipart/form-data" action='<?php echo $action; ?>'>
            <h4>Pendaftaran Pelatihan</h4>
            <br>

            <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
            <div class='form-group row'>
              <label class="col-xs-12 col-md-2 form-control-label center"><b> DATA PRIBADI </b></label>
              <div class="col-md-10 col-xs-12">
                <hr>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Nama Lengkap : </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Nama Lengkap (max. 60 karakter)' class='form-control' name='nama_lengkap' value='<?php echo (ISSET ($last['nama_lengkap']))? $last['nama_lengkap'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Pelatihan : </label>
              <div class="col-md-9 col-xs-12">
                <select name='id_event' class='form-control'>
                  <option value=''>Pilih Pelatihan</option>
                  <?php
                  foreach ($hasil as $event) {
                    echo "<option value='".$event['id_event']."'>".$event['nama_event']."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Email : </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Email' class='form-control' name='email' value='<?php echo (ISSET ($last['email']))? $last['email'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">No Telpon : </label>
              <div class="col-md-9 col-xs-12">
                <input type='tel' placeholder='Masukkan No Telpon' class='form-control' name='no_telpon' value='<?php echo (ISSET ($last['no_telpon']))? $last['no_telpon'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Alamat KTP : </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Alamat KTP' class='form-control' name='alamat' value='<?php echo (ISSET ($last['alamat']))? $last['alamat'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Tempat Lahir: </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Tempat Lahir' class='form-control' name='tempat_lahir' value='<?php echo (ISSET ($last['tempat_lahir']))? $last['tempat_lahir'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label"> Tanggal Lahir: </label>
              <div class="col-md-9 col-xs-12">
                <input type='date' placeholder='Masukkan Tanggal Lahir' class='form-control' name='tgl_lahir' value='<?php echo (ISSET ($last['tgl_lahir']))? $last['tgl_lahir'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-2 form-control-label center"><b> DATA PEKERJAAN </b></label>
              <div class="col-md-10 col-xs-12">
                <hr>
              </div>
            </div>

            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Kedinasan : </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Kedinasan' class='form-control' name='kedinasan' value='<?php echo (ISSET ($last['kedinasan']))? $last['kedinasan'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Nama Klinik : </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Nama Klinik' class='form-control' name='nama_klinik' value='<?php echo (ISSET ($last['nama_klinik']))? $last['nama_klinik'] :''; ?>'/>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Kepemilikan : </label>
              <div class="col-md-9 col-xs-12">
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="0" name="status_kepemilikan">
                  <label for="0">Pribadi</label>
                </div>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="1" name="status_kepemilikan">
                  <label for="1">Orang Lain</label>
                </div>
              </div>
            </div>

            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Memiliki USG: </label>
              <div class="col-md-9 col-xs-12">
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="0" name="usg">
                  <label for="0">Ya</label>
                </div>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="1" name="usg">
                  <label for="1">Tidak</label>
                </div>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Pernah Pelatihan USG : </label>
              <div class="col-md-9 col-xs-12">
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="0" name="status_pelatihan">
                  <label for="0">Ya</label>
                </div>
                <div class="radio-custom radio-default radio-inline">
                  <input type="radio" id="1" name="status_pelatihan">
                  <label for="1">Tidak</label>
                </div>
              </div>
            </div>
            <div class='form-group row'>
              <label class="col-xs-12 col-md-3 form-control-label">Pendidikan : </label>
              <div class="col-md-9 col-xs-12">
                <input type='text' placeholder='Masukkan Pendidikan' class='form-control' name='pendidikan' value='<?php echo (ISSET ($last['pendidikan']))? $last['pendidikan'] :''; ?>'/>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-xs-12 col-md-3 form-control-label">
                  <button type='submit' class='btn btn-primary'>Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
<?php
  //$this->load->view('front_end/footer.php');
?>
