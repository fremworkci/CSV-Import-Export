<?php
/**
 * 
 */
class Model1 extends CI_model
{
	
	// function upload($data1,$data2,$data3)
	// {
	// 	return $this->db->insert("login",array('name'=>$data1,'email'=>$data2,'password'=>$data3));
	// }

	function export_model()
	{
		$this->db->select("*");
		$this->db->from("login");
		$qry=$this->db->get();
		return $qry->result();
	}
}
?>