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
       <td>Deskripsi Kegiatan</td>
       <td>:</td>
       <td><?php echo "$get[deskripsi]"; ?></td>
     </tr>
     <tr>
       <td>Pendaftar</td>
       <td>:</td>
       <td><?php $j = count($hasil); echo $j; ?></td>
     </tr>
     <tr>
       <td>File Kegiatan</td>
       <td>:</td>
       <td><a href='<?php echo base_url('uploads/event/'.$get['gambar']); ?>' target='_blank'>Lihat</a></td>
     </tr>
   </tbody>
 </table>

 <h3 class='page-header'>Pendaftar <small>Kegiatan</small></h3>
   <table class='table table-hover'>
     <thead>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
         <th>File</th>
         <!-- <th>Status</th> -->
         <th>Tombol</th>
       </tr>
     </thead>
     <tbody>
    <?php
  	for($i=0; $i<count($hasil); $i++){
  			$h = $hasil[$i];
  			// if(isset($h['verifikasi_status']) && $h['verifikasi_status'] == 0) {
						echo"
							<td>".($i+1)."</td>
							<td>$h[nama_lengkap]</td>
              <td>$h[email]</td>
							<td>$h[no_telpon]</td>
              <td>
              <b>
              <a href='".site_url('customer/detail_peserta/')."/".$h['id_peserta']."' class='btn btn-small btn-info' >Detail</a> |
              </b>
              </td>
              </tr>
  								";
  						// 		}
  						// 	else{
  						// 		echo"
              //     <td>".($i+1)."</td>
              //     <td>$h[nama_lengkap]</td>
              //     <td>$h[no_telpon]</td>
              //     <td>$h[email]</td>
              //     <td>
              //     <b>
              //       <a href='".site_url('customer/detail_peserta/')."/".$h['id_peserta']."' class='btn btn-small btn-info' >Detail</a> |
              //     </b>
              //     </td>
              //   </tr>
  						// 		";
  						// 	}
  						// }

  					?>
            <!-- <a href='".site_url('customer/verifikasi_peserta/')."/".$h['id_peserta']."' class='btn btn-success btn-small'  onClick=\"return confirm('Anda yakin mau memverifikasi data ini ?')\" >Verifikasi</a> -->
  				</tbody>
  			</table>
</div>
