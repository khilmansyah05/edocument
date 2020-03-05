<?php
  $this->load->view('header');
  // $title = "Tambah Event";
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
  <form class="form-horizontal" method='POST' enctype="multipart/form-data" action='<?php echo $action; ?>'>
    <h4>Edit Event</h4>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Nama Kegiatan : </label>
      <div class="col-md-9 col-xs-12">
        <input type='textarea' placeholder='Masukkan Nama Kegiatan (max. 40 karakter)' class='form-control' name='nama_event' value='<?php echo (isset($get['nama_event']))?$get['nama_event']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Deskripsi : </label>
      <div class="col-md-9 col-xs-12">
        <textarea placeholder='Masukkan Deskripsi Kegiatan' class='form-control' name='deskripsi'/><?php echo (isset($get['deskripsi']))?$get['deskripsi']:'';?></textarea>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Tanggal Event : </label>
      <div class="col-md-9 col-xs-12">
        <input type='date' placeholder='Masukkan Tanggal Event' class='form-control' name='tanggal_event' value='<?php echo (isset($get['tanggal_event']))?$get['tanggal_event']:'';?>'/>
      </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">Status Kegiatan : </label>
        <div class="col-md-9 col-xs-12">
          <select name='event_status' class="form-control"/>
          <?php
            if  (ISSET ($get['event_status']) && $get['event_status'] == '0'){
              echo"<option value='0' selected>Masih Dibuka</option>";
              echo"<option value='1'>Sudah Dilaksanakan</option>";
              echo"<option value='2'>Sudah Dihapus</option>";
            }else if(ISSET ($get['event_status']) && $get['event_status'] == '1'){
              echo"<option value='1' selected>Sudah Dilaksanakan</option>";
              echo"<option value='0'>Masih Dibuka</option>";
              echo"<option value='2'>Sudah Dihapus</option>";
            }else if(ISSET ($get['event_status']) && $get['event_status'] == '2') {
              echo"<option value='2' selected>Sudah Dihapus</option>";
              echo"<option value='0'>Masih Dibuka</option>";
              echo"<option value='1'>Sudah Dilaksanakan</option>";
            }else{
              echo"<option value=''>Pilih Salah Satu</option>";
              echo"<option value='0'>Admin</option>";
              echo"<option value='1'>Staff</option>";
            }
           ?>
          </select>
        </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">File  : </label>
        <div class="col-md-9 col-xs-12">
          <input type='file' id="input-file-now" data-plugin="dropify" name='gambar'/>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12form-control-label">
        <div class="col-md-12 form-control-label">
        </div>
          <div class="col-md-3 form-control-label">
            <a href='<?php echo site_url('event/event_list');?>' class='btn btn-primary'>Back</a>
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
