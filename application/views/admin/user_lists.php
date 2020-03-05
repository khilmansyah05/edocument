<form action="<?php echo site_url('User/source_user_list');?>" id='display-table'>
<?php
  $this->load->view('header');
  echo $this->session->flashdata('message');
?>
<div class="panel">
  <div class="panel-header">
    <h3><i class="fa fa-filter"></i><strong>Filter</h3>
    <div class="control-btn"><a class="panel-toggle" href="#"><i class="fa fa-angle-down"></i></a></div>
  </div>
</div>
 <div class="container">
   <div class="row">
     <div class="col-xs-12">
       <div class="box">
         <div class="box-header with-border">
            <h3 class="bpx_title">Filter</h3>
            <div class="btn-fly">
              <a class="btn btn-dark" type="">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
         </div>

         <div class="box-body" style="display : block;">
           <div class="col-md-6">
             <div class="form-group">
              <label for="nama">Nama</label>
              <input class="form-control" id="nama" placeholder="Nama" type="text" name="full_name"/>
             </div>
             <div class="form-group">
              <label for="nama">Username</label>
              <input class="form-control" id="nama" placeholder="Username" type="text" name="username"/>
             </div>
           </div>

        </div>
       </div>
     </div>
   </div>
   <h4> Daftar User </h4>
   <br/>
  <table class='table table-hover'>
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Nama</th>
  						<th>Username</th>
  						<th>Level</th>
  						<th>No Telpon</th>
  						<th>Pilihan</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php
  						for($i=0; $i<count($hasil); $i++){
  							$h = $hasil[$i];
                $j = hak_akses_convert($h['level']);
  								echo"
  									<td>".($i+1)."</td>
  									<td>$h[nama]</td>
  									<td>$h[username]</td>
  									<td>$j</td>
  									<td>$h[no_telpon]</td>
                    <td>
                    <b>
    									<a href='".site_url('user/user_edit/')."/".simple_encrypt($h['id_user'])."' class='btn btn-small btn-success' >Ubah</a> |
    									<a href='".site_url('user/user_delete/')."/".simple_encrypt($h['id_user'])."' class='btn btn-danger btn-small'  onClick=\"return confirm('Anda yakin mau menghapus data ini ?')\" >Hapus</a>
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
