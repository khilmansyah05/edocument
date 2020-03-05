<?php
class M_event extends CI_Model{
	public function __Construct(){
	parent:: __Construct();
	}

	public function get_all_event(){
		return $this->db->query("SELECT * FROM event WHERE event_status = '0'  ORDER BY tanggal_event DESC")->result_array();
	}

	// function data($number,$offset){
	// 		return $query = $this->db->get('event',$number,$offset)->result();
	// 	}
	//
	// function jumlah_event(){
	// 	return $this->db->get('event')->num_rows();
	// }

	public function delete_event($data, $id_event){
		return $this->db->update('event', $data, array('id_event' => $id_event));
	}

	public function insert_event($data){
		return $this->db->insert('event', $data);
	}

	public function get_event_by_id($id_event){
		return $this->db->query("SELECT * FROM event WHERE id_event = '$id_event'")->row_array();
	}

	public function get_event_done(){
		return $this->db->query("SELECT * FROM event WHERE event_status = '1'")->result_array();
	}

	// public function event_today($today){
	// 	return $this->db->query("SELECT * FROM event WHERE tanggal_event = '$today'")->row_array();
	// }

	public function update_event($data, $id_event){
		return $this->db->update('event', $data, array('id_event' => $id_event));
	}


}
?>
