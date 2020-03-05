<html>
  <head>
    <title>Tambah User</title>
  </head>
  <body>
  <center>
    <h1>Data User</h1>
    <hr>
    <a href='<?php echo base_url("user/user_input"); ?>'>Tambah Data</a><br><br>

    <table border="1" cellpadding="7">
      <tr>
        <th class="text-center">NIK</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Username</th>
        <th class="text-center">Divisi</th>
        <th class="text-center">level</th>
        <th colspan="2">Aksi</th>
      </tr>

      <?php
      if( ! empty($user)){ // Jika data user tidak sama dengan kosong, artinya jika data user ada
        foreach($user as $data){
          echo "<tr>
          <td>".$data->NIK."</td>
          <td>".$data->nama."</td>
          <td>".$data->username."</td>
          <td>".$data->divisi."</td>
          <td>".$data->level."</td>
          <td><a href='".base_url("user/user_edit/".$data->username)."'>Ubah</a></td>
          <td><a href='".base_url("user/user_delete/".$data->username)."'>Hapus</a></td>
          </tr>";
        }
      }else{ // Jika data user kosong
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>