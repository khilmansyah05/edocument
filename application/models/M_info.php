<?php

class M_info extends CI_Model{
  public function __Construct(){
    parent:: __Construct();
  }

  public function get_info($name){
		return $this->db->query("SELECT * FROM options WHERE name ='$name'")->rpw_array();
	}

}

 ?>
