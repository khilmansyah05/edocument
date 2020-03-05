<?php
$this->load->view('header');
echo $this->session->flashdata('message');

 ?>

 <div class="container">
   <h4> Daftar Pelatihan yang Masih Dibuka </h4>
   <br/>

  <table class='table table-hover'>
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Nama Event</th>
  						<th>Tanggal Event</th>
  						<th>File Gambar</th>
  						<th>Pilihan</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php
              $no = $this->uri->segment('5') + 1;
  						for($i=0; $i<count($hasil); $i++){
  							$h = $hasil[$i];
                  $k = date_convert($h['tanggal_event']);
  								echo"
                  <td>".($no++)."</td>
                  <td>$h[nama_event]</td>
                  <td>$k</td>
                  <td><a href='".base_url('uploads/event/'.$h['gambar'])."' target='_blank'>Buka File</a></td>

                  <td>
                  <b>
                    <a href='".site_url('event/event_edit')."/".simple_encrypt($h['id_event'])."' class='btn btn-small btn-success' >Ubah</a> |
                    <a href='".site_url('customer/list_pendaftaran_event')."/".simple_encrypt($h['id_event'])."' class='btn btn-info btn-small')\" >Pendaftar</a> |
                    <a href='".site_url('event/event_delete')."/".simple_encrypt($h['id_event'])."' class='btn btn-danger btn-small'  onClick=\"return confirm('Anda yakin mau menghapus data event ini ?')\" >Hapus</a>
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
