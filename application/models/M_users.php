<?php
class M_users extends CI_Model{
	public function __Construct(){
	parent:: __Construct(); 
	}

	public function get_all_user(){
		return $this->db->query("SELECT id_user, nama, username, no_telp,id_desa, level FROM user INNER JOIN level ON user.id_level = level.id_level WHERE user_status = '0' ")->result_array();
	}

	public function delete_user($id){
		$this->db->query("UPDATE user SET user_status = '1' WHERE id_user = '$id'");
	}

	public function insert_user($data){
		return $this->db->insert('user', $data);
	}

	public function get_user_by_id($id){
		return $this->db->query("SELECT * FROM user WHERE id_user = '$id' AND user_status = '0'")->row_array();
	}

	public function update_user($data, $id){
		return $this->db->update('user', $data, array('id_user' => $id));
	}
}
?>
