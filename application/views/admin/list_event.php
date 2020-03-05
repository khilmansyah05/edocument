<?php
$this->load->view('header');
echo $this->session->flashdata('message');

 ?>

 <div class="container">
   <h4> Daftar Pelatihan </h4>
   <br/>

  <table class='table table-hover'>
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Nama Event</th>
  						<th>Tanggal Event</th>
              <th>Status Event</th>
  						<th>File Registrasi</th>
  						<th>Pilihan</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php
              $no = $this->uri->segment('5') + 1;
  						for($i=0; $i<count($hasil); $i++){
  							$h = $hasil[$i];
                  $k = date_convert($h['tanggal_event']);
                  $j = event_convert($h['event_status']);
  								echo"
                  <td>".($no++)."</td>
                  <td>$h[nama_event]</td>
                  <td>$k</td>
                  <td>$j</td>
                  <td><a href='".base_url('uploads/event/'.$h['gambar'])."' target='_blank'>Buka File</a></td>

                  <td>
                  <b>
                    <a href='".site_url('customer/list_pendaftaran_event/')."/".simple_encrypt($h['id_event'])."' class='btn btn-info btn-small')\" >Pendaftar</a>
                  </b>
                  </td>
                </tr>
  								";
  							}


  					?>
  				</tbody>
  			</table>
        <!-- <?php
        //echo $this->pagination->create_links();
        ?> -->
</div>

<?php
$this->load->view('footer');
?>
