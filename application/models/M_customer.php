<?php
class M_Customer extends CI_Model{
	public function __Construct(){
	parent:: __Construct();
	}

	public function get_all_peserta(){
		return $this->db->query("SELECT * FROM peserta ORDER BY verifikasi_status DESC")->result_array();
	}

	public function get_pelatihan($id_peserta){
		return $this->db->query("SELECT * FROM peserta WHERE id_peserta = '$id_peserta'")->row_array();
	}

	public function get_peserta($id_peserta){
		return $this->db->query("SELECT * FROM peserta WHERE id_peserta = '$id_peserta'")->row_array();
	}

	public function get_peserta_by_id($id_event){
		return $this->db->query("SELECT * FROM peserta WHERE id_event = '$id_event' ORDER BY verifikasi_status DESC")->result_array();
	}

	public function hitung_verifikasi($id_event){
		return $this->db->query("SELECT * FROM peserta WHERE id_event = '$id_event' AND verifikasi_status = '1'")->num_rows();
	}

	public function get_peserta_done($id_event){
		return $this->db->query("SELECT * FROM peserta WHERE id_event = '$id_event' AND verifikasi_status = '1'")->result_array();
	}

	public function verifikasi($data, $id_peserta){
		return $this->db->update('peserta', $data, array('id_peserta' => $id_peserta));
	}

	public function update_statusinfo($id){
			return $this->db->query("UPDATE peserta SET status_notif = '1' WHERE id_peserta = '$id'");
		}

	public function get_all_peserta_verifikasi(){
		return $this->db->query("SELECT * FROM peserta WHERE verifikasi_status = '1' ")->result_array();
	}

	public function get_all_peserta_belum_verifikasi(){
		return $this->db->query("SELECT * FROM peserta WHERE verifikasi_status = '0' ")->result_array();
	}

	public function get_all_peserta_tidak_verifikasi(){
		return $this->db->query("SELECT * FROM peserta WHERE verifikasi_status = '2' ")->result_array();
	}

	public function insert_pendaftaran($data){
		return $this->db->insert('peserta', $data);
	}

	public function email_is_available($email){
		$email = $this->db->escape($email);
		$query = $this->db->query("SELECT email FROM peserta WHERE email = $email");
		return $query->num_rows();
	}
	// public function update_event($data, $id_event){
	// 	return $this->db->update('event', $data, array('id_event' => $id_event));
	// }


}
?>
