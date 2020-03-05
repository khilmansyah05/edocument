<?php
  $this->load->view('header');
  // $title = "Tambah Event";
  // echo validation_errors('<div class="alert alert-danger">', '</div>');
  // if(!empty($this->config->item('error'))){
  //   echo '<div class="alert alert-danger">'.$this->config->item('error').'</div>';
  // }

  echo $this->session->flashdata('message');
?>
<center>
		<div id="page" class="animated fadeInDown delay-05s">
			<div class="container" align="center">
        <h2 class="section-heading">Detail Peserta</h2>
        <br/>
      </div>
			<table class="table table-striped" style="width:45%">
				<tr>
					<td valign="top">Nama Lengkap</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['nama_lengkap'])){echo $hasil['nama_lengkap'];}?></td>

				</tr>
				<tr>
					<td valign="top">Email</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['email'])){echo $hasil['email'];}?></td>
				</tr>
        <tr>
					<td valign="top">No HP</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['no_telpon'])){echo $hasil['no_telpon'];}?></td>
				</tr>
        <tr>
					<td valign="top">Alamat</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['alamat'])){echo $hasil['alamat'];}?></td>
				</tr>
        <tr>
					<td valign="top">Tempat Lahir</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['tempat_lahir'])){echo $hasil['tempat_lahir'];}?></td>
				</tr>
        <tr>
					<td valign="top">Tanggal Lahir</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['tgl_lahir'])){echo date_convert($hasil['tgl_lahir']);}?></td>
				</tr>
        <tr>
					<td valign="top">Kedinasan</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['kedinasan'])){echo $hasil['kedinasan'];}?></td>
				</tr>
        <tr>
					<td valign="top">Nama Klinik</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['nama_klinik'])){echo $hasil['nama_klinik'];}?></td>
				</tr>
        <tr>
					<td valign="top">Kepemilikan Klinik</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['status_kepemilikan'])){echo kepemilikan_convert($hasil['status_kepemilikan']);}?></td>
				</tr>
        <tr>
					<td valign="top">Memiliki USG</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['usg'])){echo usg_convert($hasil['usg']);}?></td>
				</tr>
        <tr>
					<td valign="top">Pernah mengikuti pelatihan USG</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['status_pelatihan'])){echo pelatihan_convert($hasil['status_pelatihan']);}?></td>
				</tr>
        <tr>
					<td valign="top">Pendidikan</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['pendidikan'])){echo $hasil['pendidikan'];}?></td>
				</tr>
				<tr>
					<td valign="top">Tanggal Registrasi</td>
					<td valign="top">:</td>
					<td valign="top"><?php if(isset($hasil['registrasi_date'])){echo $hasil['registrasi_date'];}?></td>
				</tr>
        <tr>
          <?php if($hasil['verifikasi_status']=='0' AND $jumlah<2){
          echo "
          <td  align='center'> <a href='".site_url('customer/verifikasi_peserta')."/".simple_encrypt($hasil['id_peserta'])."' class='btn btn-info btn-small' onClick=\"return confirm('Anda yakin mau memverifikasi data ini ?')\" >Verifikasi</a></td>
          <td colspan='2' align='center'> <a href='".site_url('customer/tidak_verifikasi_peserta')."/".simple_encrypt($hasil['id_peserta'])."' class='btn btn-danger btn-small' onClick=\"return confirm('Anda yakin tidak memverifikasi data ini ?')\" >Tidak Verifikasi</a></td>
          " ;}
          ?>
        </tr>
				<!-- <?php //echo $row->$file_gambar; ?> -->
			</table>
		</div>
	</center>
<?php
  $this->load->view('footer');
?>
