<?php
    if(count($data) > 0) {
        if(count($data) > $limit) {
            unset($data[count($data)-1]);
        }

        for($i=0; $i<count($data); $i++){
            $h = $data[$i];

            //$str_level = ISSET($level[$h['id_level']]) ? $level[$h['id_level']] : "undefined";
            echo"
            <tr>
                <td>".($i+1)."</td>
                <td>$h[nama]</td>
                <td>$h[username]</td>
                <td>$h[no_telp]</td>
                <td>$h[level]</td>
                <td>
                    <b>
                    <a href='".site_url('doctor/user_edit')."/".simple_encrypt($h['id_user'])."' class='btn btn-small btn-success' >Ubah</a> |
                    <a href='".site_url('doctor/user_delete')."/".simple_encrypt($h['id_user'])."' class='btn btn-danger btn-small'  onClick=\"return confirm('Anda yakin mau menghapus data ini ?')\" >Hapus</a>
                    </b>
                </td>
            </tr>
            ";
        }
    }else {
        echo "
            <tr>
                <td colspan='7'>Data Tidak Ditemukan</td>
            </tr>
        ";
    }
?>
