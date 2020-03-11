<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content grey darken-3 lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
        <?php $no = $this->uri->segment(3); foreach($kerjaan as $row): ?>
    <?php endforeach; ?>
    <!--      <a href="<?php echo base_url('kerjaan/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
    -->  </div>
      <div class="card-content">
        <div class="row">
          <div class="input-field col s12 m8">
              <input readonly id="desk_pekerjaan" name="desk_pekerjaan" type="text" value="<?php echo $kerjaan->desk_pekerjaan; ?>">
              <label for="desk_pekerjaan" class=""><span class="text-danger">*</span>Nama Pengirim</label>
          </div>

		  <div class="input-field col s12 m8">
              <input readonly id="tugas" name="tugas" type="text" value="<?php echo $kerjaan->tugas; ?>">
              <label for="tugas" class=""><span class="text-danger">*</span>No Surat</label>
          </div>	

		  <div class="input-field col s12 m8">
              <input readonly id="jenis" name="jenis" type="text" value="<?php echo $kerjaan->jenis; ?>">
              <label for="jenis" class=""><span class="text-danger">*</span>Jenis</label>
          </div>
		  
		  <div class="input-field col s12 m8">
              <input readonly id="perihal" name="perihal" type="text" value="<?php echo $kerjaan->perihal; ?>">
              <label for="perihal" class=""><span class="text-danger">*</span>Perihal</label>
          </div>
		  
		  <div class="input-field col s12 m8">
              <input readonly id="bagian" name="bagian" type="text" value="<?php echo $kerjaan->bagian; ?>">
              <label for="bagian" class=""><span class="text-danger">*</span>Bagian</label>
          </div>

           <div class="input-field col s12 m8">
              <input readonly id="tgl_mulai" name="tgl_mulai" type="text" value="<?php echo $kerjaan->tgl_mulai; ?>">
              <label for="tgl_mulai" class=""><span class="text-danger">*</span>Tanggal Dispo</label>
          </div>


          <div class="input-field col s12 m8">
              <input readonly id="tgl_berakhir" name="tgl_berakhir" type="text" value="<?php echo $kerjaan->tgl_berakhir; ?>">
              <label for="tgl_berakhir" class=""><span class="text-danger">*</span>Target Waktu</label>
          </div>

         

          <div class="input-field col s12 m8">
              <input readonly id="status1" name="status1" type="text" value="<?php echo $kerjaan->status; ?>">
              <label for="status1" class=""><span class="text-danger">*</span>Status</label>
          </div>


           <div class="input-field col s12 m8">
             
              <label for="keterangan" class=""><span class="text-danger">*</span>Keterangan</label>
               <input readonly id="keterangan" name="keterangan" type="text" value="<?php echo $kerjaan->keterangan; ?>">
          </div>
		  
		  <div class="input-field col s12 m8">
             
              <label for="tindak_lanjut" class=""><span class="text-danger">*</span>Tindak Lanjut</label>
               <input readonly id="tindak_lanjut" name="tindak_lanjut" type="text" value="<?php echo $kerjaan->tindak_lanjut; ?>">
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
<div class="card-content">