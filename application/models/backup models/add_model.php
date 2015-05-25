<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class add_model extends CI_Model
{
	
	public function create($name,$position,$fromtimestamp,$totimestamp,$details,$image)
	{
		$data  = array(
			'name' => $name,
			'position' => $position,
			'fromtimestamp' => $fromtimestamp,
			'totimestamp' => $totimestamp,
			'details' => $details,
			'image' => $image,
			'timestamp' => NULL
		);
		$query=$this->db->insert( 'add', $data );
		$id=$this->db->insert_id();
		
		if(!$query)
			return  0;
		else
			return  1;
	}
    
	public function edit($id,$name,$position,$fromtimestamp,$totimestamp,$details,$image)
	{
		$data  = array(
			'name' => $name,
			'position' => $position,
			'fromtimestamp' => $fromtimestamp,
			'totimestamp' => $totimestamp,
			'details' => $details,
			'image' => $image,
			'timestamp' => NULL
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'add', $data );
		return 1;
	}
	function viewadd()
	{
		$query="SELECT `add`.`id`, `add`.`name`, `add`.`image`, `add`.`position`, `add`.`timestamp`, `add`.`fromtimestamp`, `add`.`totimestamp`, `add`.`details`, `add`.`deletestatus`,`position`.`name`as `positionname` 
        FROM `add`
        INNER JOIN `position` ON `position`.`id`=`add`.`position`
        WHERE `add`.`deletestatus`=1  ";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
    
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'add' )->row();
		return $query;
	}
    
	public function getaddimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `add` WHERE `id`='$id'")->row();
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
    public function getadddropdown()
	{
		$query=$this->db->query("SELECT * FROM `add`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getlogobyaddid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `add` WHERE `id`='$id'")->row();
		return $query;
	}
	
	function deleteadd($id)
	{
		$query=$this->db->query("DELETE FROM `add` WHERE `id`='$id'");
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