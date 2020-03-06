<?php 
	/**
	 * 
	 */
	class M_document extends CI_Model
	{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }
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
	}
 ?>