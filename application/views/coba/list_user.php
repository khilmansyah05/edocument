<?php
  $no = 1;
  foreach ($user as $data) {
    ?>
	<table border = "5">
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $data->nama; ?></td>
	  <td><?php echo $data->NIK; ?></td>
	  <td><?php echo $data->username; ?></td>
	  <td><?php echo $data->divisi; ?></td>
	  <td><?php echo $data->level; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning" data-id="<?php echo $data->id_user; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger" data-id="<?php echo $data->id_user; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-info" data-id="<?php echo $data->id_user; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
	</table>
    <?php
    $no++;
  }
?>