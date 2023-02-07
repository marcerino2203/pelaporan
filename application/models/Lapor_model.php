<?php
	class Lapor_model extends CI_MODEL{
		function add($data){
			if($this->db->insert('aduan',$data)){
				return true;
			}else{
				retun false;
			}
		}
	}
?>