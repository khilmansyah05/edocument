<?php
class M_dokument extends CI_Model{
	public function __Construct(){
	parent:: __Construct();
	}

	public function get_all_dokument(){
		//return $this->db->query("SELECT * FROM dokument WHERE doc_status = '0'  ORDER BY tanggal DESC")->result_array();
		return $this->db->query("SELECT * FROM dokumen")->result();
	}
	
	public function getAllDocument($jdl, $dvs){
			if($jdl=="" && $dvs==""){
				return $this->db->get('dokumen')->result();
			}
			else{
				$this->db->like('judul',$jdl);
				$this->db->where('divisi',$dvs);
				return $this->db->get('dokumen')->result();
			}
		}

	// function data($number,$offset){
	// 		return $query = $this->db->get('event',$number,$offset)->result();
	// 	}
	//
	// function jumlah_event(){
	// 	return $this->db->get('event')->num_rows();
	// }

	public function delete_dokument($data, $id){
		return $this->db->update('dokumen', $data, array('id' => $id));
	}

	public function insert_dokument($data){
		return $this->db->insert('dokumen', $data);
	}

	public function get_doc_by_id($id){
		return $this->db->query("SELECT * FROM dokumen WHERE id = '$id'")->row_array();
	}

	public function get_doc_done(){
		return $this->db->query("SELECT * FROM dokumen WHERE doc_status = '1'")->result_array();
	}

	// public function event_today($today){
	// 	return $this->db->query("SELECT * FROM event WHERE tanggal_event = '$today'")->row_array();
	// }

	public function update_dokument($data, $id){
		return $this->db->update('dokumen', $data, array('id' => $id));
	}
	
	public function get_where($where) {
		$query = $this->db->where($where)->get($this->dokumen);
		
		return $query;
	}


}
?>
