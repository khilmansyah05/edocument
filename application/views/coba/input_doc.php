<?php
  $this->load->view('header');
  $last     = show_alert('last_posting');
  $title = "Tambah Dokument";
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
    <h4>Tambah Dokument</h4>
    <!-- <input type="hidden" name="<?//=$csrf['name'];?>" value="<?//=$csrf['hash'];?>" /> -->
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Judul : </label>
      <div class="col-md-9 col-xs-12">
        <input type='textarea' placeholder='Masukkan Judul (max. 40 karakter)' class='form-control' name='judul' value='<?php echo (ISSET ($last['judul']))? $last['judul'] :''; ?>'/>
      </div>
    </div>
    <div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Nama Dokument : </label>
      <div class="col-md-9 col-xs-12">
        <textarea placeholder='Masukkan Nama Dokument' class='form-control' name='nama_doc' value='<?php echo (ISSET ($last['nama_doc']))? $last['nama_doc'] :''; ?>'/></textarea>
      </div>
    </div>
	<div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Divisi : </label>
      <div class="col-md-9 col-xs-12">
        <textarea placeholder='Masukkan Divisi' class='form-control' name='divisi' value='<?php echo (ISSET ($last['divisi']))? $last['divisi'] :''; ?>'/></textarea>
      </div>
    </div>
    <!--<div class='form-group row'>
      <label class="col-xs-12 col-md-3 form-control-label">Tanggal Dokument : </label>
      <div class="col-md-9 col-xs-12">
        <input type='date' placeholder='Masukkan Tanggal Dokument' class='form-control' name='tanggal' value='<php echo (ISSET ($last['tanggal']))? $last['tanggal'] :''; ?>'/>
      </div>
    </div> -->
    <div class='form-group row'>
        <label class="col-xs-12 col-md-3 form-control-label">File  : </label>
        <div class="col-md-9 col-xs-12">
          <input type='file' id="file" data-plugin="dropify" name='file' required/>
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
