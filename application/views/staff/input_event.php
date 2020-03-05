<?php
  $this->load->view('header');
  $last     = show_alert('last_posting');
  $title = "Tambah Event";
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
    <h4>Tambah Event</h4>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Nama Kegiatan : </label>
      <div class="col-md-9 col-xs-12">
        <input type='textarea' placeholder='Masukkan Nama Kegiatan (max. 40 karakter)' class='form-control' name='nama_event' value='<?php echo (ISSET ($last['nama_event']))? $last['nama_event'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Deskripsi : </label>
      <div class="col-md-9 col-xs-12">
        <textarea placeholder='Masukkan Deskripsi Kegiatan' class='form-control' name='deskripsi' value='<?php echo (ISSET ($last['deskripsi']))? $last['deskripsi'] :''; ?>'/></textarea>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Tanggal Event : </label>
      <div class="col-md-9 col-xs-12">
        <input type='date' placeholder='Masukkan Tanggal Event' class='form-control' name='tanggal_event' value='<?php echo (ISSET ($last['tanggal_event']))? $last['tanggal_event'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">File  : </label>
        <div class="col-md-9 col-xs-12">
          <input type='file' id="input-file-now" data-plugin="dropify" name='gambar' required/>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-md-3 form-control-label">
        <div class="col-md-9 col-xs-12">
          <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
      </div>
    </div>
  </form>
<?php
  $this->load->view('footer');
?>
