<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Enquiry_model extends CI_Model
{
	
	public function create($name,$listing,$email,$phone)
	{
		$data  = array(
			'name' => $name,
			'listing' => $listing,
			'email' => $email,
			'phone' => $phone,
            'timestamp'=>NULL
		);
		$query=$this->db->insert( 'enquiry', $data );
		$id=$this->db->insert_id();
		
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewenquiry()
	{
		$query="SELECT `enquiry`.`id`, `enquiry`.`name`, `enquiry`.`listing`, `enquiry`.`email`, `enquiry`.`phone`, `enquiry`.`timestamp`, `enquiry`.`deletestatus`,`listing`.`name` AS `listingname`
        FROM `enquiry` 
        INNER JOIN `listing` ON `listing`.`id`=`enquiry`.`listing`
        WHERE `enquiry`.`deletestatus`=1 ";
	   
		$query=$this->db->query($query)->result();
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
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'enquiry' )->row();
		return $query;
	}
    
	public function getlogobylistingid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `listing` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit($id,$name,$listing,$email,$phone)
	{
		$data  = array(
			'name' => $name,
			'listing' => $listing,
			'email' => $email,
			'phone' => $phone,
            'timestamp'=>NULL
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'enquiry', $data );
		return 1;
	}
	function deleteenquiry($id)
	{
		$query=$this->db->query("DELETE FROM `enquiry` WHERE `id`='$id'");
	}
	function changepassword($id,$password)
	{
		$data  = array(
			'password' =>md5($password)
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	public function getaccesslevels()
	{
		$return=array();
		$query=$this->db->query("SELECT * FROM `accesslevel` ORDER BY `id` ASC")->result();
		$accesslevel=$this->session->userdata('accesslevel');
			foreach($query as $row)
			{
				if($accesslevel==1)
				{
					$return[$row->id]=$row->name;
				}
				else if($accesslevel==2)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==3)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==4)
				{
					if($row->id == $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
			}
	
		return $return;
	}
	function changestatus($id)
	{
		$query=$this->db->query("SELECT `status` FROM `user` WHERE `id`='$id'")->row();
		$status=$query->status;
		if($status==1)
		{
			$status=0;
		}
		else if($status==0)
		{
			$status=1;
		}
		$data  = array(
			'status' =>$status,
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
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