<?php
$this->load->view('header');
echo $this->session->flashdata('message');

 ?>

 <div class="container">
   <h4> Daftar Event </h4>
   <br/>
  <table class='table table-hover'>
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Nama Event</th>
  						<th>Tanggal Event</th>
              <th>Status Event</th>
  						<th>File Gambar</th>
  						<th>Pilihan</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php
  						for($i=0; $i<count($hasil); $i++){
  							$h = $hasil[$i];
  								echo"
                  <td>".($i+1)."</td>
                  <td>$h[nama_event]</td>
                  <td>$h[tanggal_event]</td>
                  <td>Sudah Dilaksanakan</td>
                  <td><a href='".base_url('uploads/event/'.$h['gambar'])."' target='_blank'>Buka File</a></td>

                  <td>
                  <b>
                    <a href='".site_url('customer/list_pendaftaran_event_done/')."/".simple_encrypt($h['id_event'])."' class='btn btn-info btn-small')\" >Peserta</a>
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
