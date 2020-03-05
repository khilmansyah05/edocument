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
       <td>Jumlah Pendaftar</td>
       <td>:</td>
       <td><?php $j = count($hasil); echo $j; ?></td>
     </tr>
     <tr>
       <td>File Kegiatan</td>
       <td>:</td>
       <td><a href='<?php echo base_url('uploads/event/'.$get['gambar']); ?>' target='_blank'>Lihat</a></td>
     </tr>
   </tbody>
   <br/>

   <!-- <?php //echo "
  //<a href='".site_url('customer/notif_verifikasi')"' class='btn btn-success btn-small'  onClick=\"return confirm('Anda yakin mau memverifikasi data ini ?')\" >Verifikasi</a>

   //"?> -->
 </table>


 <h3 class='page-header'>Pendaftar <small>Kegiatan</small></h3>
   <table class='table table-hover'>
     <thead>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
         <th>No Telpon</th>
         <th>Alamat</th>
         <th>Kedinasan</th>
         <th>Options</th>
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
              <td>$h[alamat]</td>
							<td>$h[kedinasan]</td>
              <td>";?>
              <?php echo "<a href='".site_url('customer/notif_verifikasi/').simple_encrypt($h['id_peserta'])."' class='btn btn-success btn-small'  onClick=\"return confirm('Anda yakin mau mengkonfirmasi data ini ?')\" >Konfirmasi Verifikasi</a>"?>
              <?php echo "
              </td>
              </b>
              </td>
              </tr>";
            }?>

  				</tbody>
  			</table>
</div>

<?php
  $this->load->view('footer');
?>
