<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Paymenttype_model extends CI_Model
{
	
	public function create($name)
	{
		$data  = array(
			'name' => $name
		);
		$query=$this->db->insert( 'paymenttype', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewpaymenttype()
	{
		$query="SELECT `id`, `name`, `deletestatus` FROM `paymenttype` WHERE `deletestatus`=1";
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'paymenttype' )->row();
		return $query;
	}
	
	public function edit($id,$name)
	{
		$data  = array(
			'name' => $name
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'paymenttype', $data );
		
		return 1;
	}
	function deletepaymenttype($id)
	{
		$query=$this->db->query("DELETE FROM `paymenttype` WHERE `id`='$id'");
	}
	
    public function getpaymenttypedropdown()
	{
		$query=$this->db->query("SELECT * FROM `paymenttype`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
	public function getperioddropdown()
	{
		$period= array(
			 "0" => "Monthly",
			 "1" => "Quaterly",
			 "2" => "Yearly"
			);
		return $period;
	}
}
?>