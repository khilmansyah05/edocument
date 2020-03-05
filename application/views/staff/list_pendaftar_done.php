<?php
$this->load->view('header');
echo $this->session->flashdata('message');

 ?>

 <div class="container">
 <h3 class='page-header'>Detail <small>Kegiatan</small></h3>
 <table class='table'>
   <tbody>
     <tr>
       <td>Nama Kegiatan</td>
       <td>:</td>
       <td><?php echo "$get[nama_event]"; ?></td>
     </tr>
     <tr>
       <td>Jumlah Peserta</td>
       <td>:</td>
       <td><?php echo "$jumlah " ; ?></td>
     </tr>
     <tr>
       <td>File Kegiatan</td>
       <td>:</td>
       <td><a href='<?php echo base_url('uploads/event/'.$get['gambar']); ?>' target='_blank'>Lihat</a></td>
     </tr>
   </tbody>
   <br/>
 </table>

 <h3 class='page-header'>Peserta <small>Kegiatan</small></h3>
   <table class='table table-hover'>
     <thead>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
         <th>No Telpon</th>
         <th>Status</th>
         <th>Tombol</th>
       </tr>
     </thead>
     <tbody>
    <?php
  	for($i=0; $i<count($hasil); $i++){
  			$h = $hasil[$i];
						echo"
							<td>".($i+1)."</td>
							<td>$h[nama_lengkap]</td>
              <td>$h[email]</td>
							<td>$h[no_telpon]</td>
              <td>Sudah diverifikasi</td>
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
