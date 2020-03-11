<!DOCTYPE html>
<html lang="en">
<head><title> List Dokument</title></head>

<body>
<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('dokument/dokument_input') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<!-- table hasil -->
      <div class="card">
        <div class="card-header bg-info">
		<center>
          <p>DAFTAR DOKUMENT </p>
		  </center>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>NAMA FILE</th>
                <th>DIVISI</th>
                <th>FILE</th>
				<th>ACTION</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                foreach ($dokumen as $datadoc) {
                    ?>

                      <tr>
                        <td><?php echo $datadoc->id ?></td>
                        <td><?php echo $datadoc->judul ?></td>
                        <td><?php echo $datadoc->nama_doc ?></td>
                        <td><?php echo $datadoc->divisi ?></td>
						<td>
							<img src="<?php echo base_url('uploads/dokument/'.$datadoc->file) ?>" width="64" />
						</td>
						<td width="250">
							<a href='<?php echo site_url('dokument/detail/') ?>' class='btn btn-primary'>Lihat</a>
							<a onclick="deleteConfirm('<?php echo site_url('user/user_delete/') ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Download</a>
						</td>
                      </tr>

                    <?php
                    
                }
               ?>
            </tbody>

            <!-- <tfoot>
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>NAMA FILE</th>
                <th>DIVISI</th>
                <th>FILE</th>
              </tr>
            </tfoot> -->
          </table>
        </div>
      </div>
</body>
</html>