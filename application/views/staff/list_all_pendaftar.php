<?php
$this->load->view('header');
echo $this->session->flashdata('message');

 ?>

 <div class="container">

 <h3 class='page-header'> <?php echo $meta_title; ?> <small> dari Semua Event</small></h3> <br/>


    <div class='form-group'>
      <label class="control-label col-sm-2">Pelatihan : </label>
      <div class="col-md-9 col-xs-12">
        <select name='id_event' class='form-control'>
              <option value=' '>Pilih Pelatihan</option>
              <?php
                foreach ($get as $event) {
                  echo "<option value='".$event['id']."'>".$event['nama_event']."</option>";
                  // echo "<a href='".site_url('customer/list_pendaftaran_event/')."/".$event['id_event']."' class='btn btn-info btn-small') ></a>";
                }
              ?>
        </select>
        <br/>
      </div>
    </div>

   <br/>
   <table class='table table-hover'>
     <thead>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
         <th>No Telpon</th>
         <th>Alamat</th>
         <th>Status</th>
         <th>Tombol</th>
       </tr>
     </thead>
     <tbody>
    <?php
  	for($i=0; $i<count($hasil); $i++){
  			$h = $hasil[$i];
        $j = verifikasi_status($h['verifikasi_status']);
						echo"
							<td>".($i+1)."</td>
							<td>$h[nama_lengkap]</td>
              <td>$h[email]</td>
              <td>$h[no_telpon]</td>
							<td>$h[alamat]</td>
              <td>$j</td>
              <td>
              <a href='".site_url('customer/detail_peserta/')."/".simple_encrypt($h['id_peserta'])."' class='btn btn-small btn-info' >Detail</a>
              </b>
              </td>
              </tr>
  								";
                }
  					?>
  				</tbody>
  			</table>
</div>
<?php
  $this->load->view('footer');
?>
