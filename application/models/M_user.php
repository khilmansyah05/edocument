<?php
class M_user extends CI_Model{
	public function __Construct(){
	parent:: __Construct();
	}

	public function get_all_user($filter = [] , $limit = 0, $start = 0){
		if($limit <= 0) $limit 	= 50;
		if($start <= 0) $start 	= 0;

		$flt = [];
		if(ISSET($filter['status']) && $filter['status'] != ''){
			$filter['status']		= strtolower(inject($filter['status']));
			$flt[]							= "user_status 	= $filter[status]";
		}
		if(ISSET($filter['full_name']) && $filter['full_name'] != ''){
			$filter['full_name']		= strtolower(inject($filter['full_name']));
			$flt[]							= "lower(nama) LIKE '%$filter[full_name]%'";
		}
		if(ISSET($filter['username']) && $filter['username'] != ''){
			$filter['username']		= strtolower(inject($filter['username']));
			$flt[]							= "lower(username) = '$filter[username]'";
		}
		if(ISSET($filter['telepon']) && $filter['telepon'] != ''){
			$filter['telepon']		= strtolower(inject($filter['telepon']));
			$flt[]							= "no_telpon 	= '$filter[telepon]'";
		}
		if(ISSET($filter['level']) && $filter['level'] != ''){
			$filter['level']		= strtolower(inject($filter['level']));
			$flt[]							= "level 	= $filter[level]";
		}

		$str_filter = implode('AND' , $flt);

		if(count($flt) > 0) $str_filter = 'AND'.$str_filter;

		$result		= $this->db->query("
				SELECT id_user, nama, username, NIK, divisi, level
				FROM user
				WHERE user_status = '0'
				$str_filter
				LIMIT $start, $limit
		")->result_array();

		return $result;
	}
	
	public function getAll()
    {
        return $this->db->query("SELECT * FROM user WHERE user_status = '0'")->result();
    }

	public function delete_user($id_user){
		return $this->db->query("UPDATE user SET user_status = '1' WHERE id_user = '$id_user'");
	}

	public function insert_user($data){
		return $this->db->insert('user', $data);
	}

	public function get_user_by_id($id_user){
		return $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'")->row_array();
	}

	public function get_user_aktif(){
		return $this->db->query("SELECT * FROM user WHERE user_status = '0'")->result_array();
	}

	public function update_user($data, $id_user){
		return $this->db->update('user', $data, array('id_user' => $id_user));
	}

	public function username_is_available($username){
		$username = $this->db->escape($username);
		$query = $this->db->query("SELECT username FROM user WHERE username = $username");
		return $query->num_rows();
	}

	public function email_is_available($email){
		$email = $this->db->escape($email);
		$query = $this->db->query("SELECT email FROM user WHERE email = $email");
		return $query->num_rows();
	}

	public function password_is_available($password){
		$username = $this->db->escape($password);
		$query = $this->db->query("SELECT password FROM user WHERE password = $password");
		return $query->num_rows();
	}
}
?>
