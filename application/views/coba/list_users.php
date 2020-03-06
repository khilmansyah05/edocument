<!DOCTYPE html>
<html lang="en">
<head><title> List User</title></head>

<body>
<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('user/user_input') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive" action='<?php echo $action; ?>'>
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th class="text-center">NIK</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Username</th>
										<th class="text-center">Divisi</th>
										<th class="text-center">level</th>
										<th class="text-center">Aksi</th>
										</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $data): ?>
									<tr>
										<td width="150">
											<?php echo $data->NIK ?>
										</td>
										<td>
											<?php echo $data->nama ?>
										</td>
										<td>
											<?php echo $data->username ?>
										</td>
										<td>
											<?php echo $data->divisi ?>
										</td>
										<td>
											<?php echo $data->level ?>
										</td>
										<!-- <td>
											<img src="<php echo base_url('upload/product/'.$product->image) ?>" width="64" />
										</td>
										<td class="small">
											<php echo substr($product->description, 0, 120) ?>...</td> -->
										<td width="250">
											<!-- <a href='#' class='btn btn-primary' id="btn_edit">Edit</a> -->
											<a href="<?php echo site_url('user/user_edit') ?>"><i class="fas fa-plus"></i>Ubah</a>
											<a onclick="deleteConfirm('<?php echo site_url('user/user_delete/') ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				
				<script>
			$('#deleteConfirm').on('click',function(){
					console.log("form edit muncul")
				})
			</script>
</body>
</html>