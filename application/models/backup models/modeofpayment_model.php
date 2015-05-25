<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Modeofpayment_model extends CI_Model
{
	
	public function create($name)
	{
		$data  = array(
			'name' => $name
		);
		$query=$this->db->insert( 'modeofpayment', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewmodeofpayment()
	{
		$query="SELECT `id`, `name`, `deletestatus` FROM `modeofpayment` WHERE `deletestatus`=1";
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'modeofpayment' )->row();
		return $query;
	}
	
	public function edit($id,$name)
	{
		$data  = array(
			'name' => $name
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'modeofpayment', $data );
		
		return 1;
	}
	function deletemodeofpayment($id)
	{
		$query=$this->db->query("DELETE FROM `modeofpayment` WHERE `id`='$id'");
	}
    
	public function getmodeofpaymentforlistingdropdown()
	{
		$query=$this->db->query("SELECT * FROM `modeofpayment`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
     public function getselectedmodeofpaymentforlistingdropdown($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `listing`,`modeofpayment` FROM `listingmodeofpayment`  WHERE `listing`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->modeofpayment;
            }
        }
         return $return;
	}
	public function getdaysofoperationforlistingdropdown()
	{
		$query=$this->db->query("SELECT * FROM `daysofoperation`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
     public function getselecteddaysofoperationforlistingdropdown($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `listing`,`daysofoperation` FROM `listingdaysofoperation`  WHERE `listing`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->daysofoperation;
            }
        }
         return $return;
	}
	
}
?>