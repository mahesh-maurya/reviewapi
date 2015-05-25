<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class position_model extends CI_Model
{
	
	public function create($name,$height,$width)
	{
		$data  = array(
			'name' => $name,
			'height' => $height,
			'width' => $width
		);
		$query=$this->db->insert( 'position', $data );
		$id=$this->db->insert_id();
		
		if(!$query)
			return  0;
		else
			return  1;
	}
    
	public function edit($id,$name,$height,$width)
	{
		$data  = array(
			'name' => $name,
			'height' => $height,
			'width' => $width
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'position', $data );
		return 1;
	}
	function viewposition()
	{
		$query="SELECT `id`, `name`, `width`, `height`, `deletestatus` FROM `position` WHERE `deletestatus`=1  ";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
    
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'position' )->row();
		return $query;
	}
	public function getisverifieddropdown()
	{
		$isverified= array(
			 "1" => "Yes",
			 "0" => "No",
			);
		return $isverified;
	}
	public function gettypedropdown()
	{
		$type= array(
			 "1" => "Free",
			 "0" => "Paid",
			);
		return $type;
	}
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
    
    public function getuserdropdown()
	{
		$query=$this->db->query("SELECT * FROM `user`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname." ".$row->lastname;
		}
		
		return $return;
	}
    public function getpositiondropdown()
	{
		$query=$this->db->query("SELECT * FROM `position`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getlogobypositionid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `position` WHERE `id`='$id'")->row();
		return $query;
	}
	
	function deleteposition($id)
	{
		$query=$this->db->query("DELETE FROM `position` WHERE `id`='$id'");
	}
	function saveuserlog($id,$action)
	{
		$fromuser = $this->session->userdata('id');
		$data2  = array(
			'onuser' => $id,
			'fromuser' => $fromuser,
			'description' => $action,
		);
		$query2=$this->db->insert( 'userlog', $data2 );
	}
    
}
?>