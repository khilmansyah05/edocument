<?php
	function date_convert($date){
		$d = explode('-',$date);

		$bulan = array(
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'March',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
			);

		return $d[2].' '.$bulan[$d[1]].' '.$d[0];
	}

	function status_convert($user_status){
		if($user_status =='0'){
		return 'Aktif';
		}else{
		return 'Pasif';
		}
	}

	function verifikasi_status($verifikasi_status){
		if($verifikasi_status == 0){
			return 'Belum diverifikasi';
		}else if ($verifikasi_status == 1) {
			return 'Sudah diverifikasi';
		} else {
			return 'Tidak diverifikasi';
		}
	}

	function hak_akses_convert($level){
		if($level =='0'){
		return 'Admin';
		}else{
		return 'Staff';
		}
	}

	function event_convert($event_status){
		if($event_status == '0'){
			return "Masih Dibuka";
		}else if($event_status == '1'){
			return "Sudah Dilaksanakan";
		}else {
			return "Pelatihan Dihapus";
		}
	}

	function kepemilikan_convert($status_kepemilikan){
		if($status_kepemilikan == '0'){
			return "Pribadi";
		}else {
			return "Orang Lain";
		}
	}

	function pelatihan_convert($status_pelatihan){
		if($status_pelatihan == '0'){
			return "Pernah Mengikuti";
		}else {
			return "Tidak Pernah Mengikuti";
		}
	}

	function usg_convert($usg){
		if($usg == '0'){
			return "Memiliki";
		}else {
			return "Tidak Memiliki";
		}
	}

	//helper untuk bahasa
	function get_option($name) {
		$ci     =& get_instance();
		$data   =  $ci->db->query("SELECT * FROM options WHERE name='$name'")->row_array();
		return $data['value'];
	}

	function inject($data) {
		//hapus tag
		$data   = strip_tags($data);
		//hapus space, and konvert all html	l tag jika masih ada
		$data   = htmlspecialchars(trim(htmlentities($data)));
		$data   = addslashes($data);

		return $data;
	}

	function set_dot($d) {
		$whole      = floor($d);
		$fraction   = $d - $whole;

		if ($fraction == 0) {
			return @number_format($d, 0, ',', '.');
		} else {
			return number_format($d, 2, ',', '.');
		}
	}

	function date_formats($date) {
		$d  = explode('-', $date);
		return $d[2].'-'.$d[1].'-'.$d[0];
	}

	function date_checker($date) {
		if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
			return true;
		} else {
			return false;
		}
	}

    function excerpt($term, $count){
        $t = explode(' ',$term);
        $tmp = '';

        if(count($t) <= $count){
            $count = count($t);
        }
        for($i=0;$i<$count;$i++){
            $tmp .= $t[$i].' ';
        }

        return $tmp;
    }
?>
