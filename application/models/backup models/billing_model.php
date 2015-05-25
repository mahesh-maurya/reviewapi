<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Billing_model extends CI_Model
{
	
	public function create($listing,$user,$paymenttype,$amount,$period,$credits,$payedto)
	{
		$data  = array(
			'listing' => $listing,
			'user' => $user,
			'paymenttype' => $paymenttype,
			'amount' => $amount,
            'period'=>$period,
            'credits'=>$credits,
            'timestamp'=>NULL,
            'payedto'=>$payedto
		);
		$query=$this->db->insert( 'billing', $data );
		$id=$this->db->insert_id();
		
		if(!$query)
			return  0;
		else
			return  1;
	}
    
	public function edit($id,$listing,$user,$paymenttype,$amount,$period,$credits,$payedto)
	{
		$data  = array(
			'listing' => $listing,
			'user' => $user,
			'paymenttype' => $paymenttype,
			'amount' => $amount,
            'period'=>$period,
            'credits'=>$credits,
            'timestamp'=>NULL,
            'payedto'=>$payedto
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'billing', $data );
		return 1;
	}
	function viewbilling()
	{
		$query="SELECT `billing`.`id`, `billing`.`listing`, `billing`.`user`, `billing`.`timestamp`, `billing`.`paymenttype`, `billing`.`amount`, `billing`.`period`, `billing`.`credits`, `billing`.`payedto`, `billing`.`deletestatus` ,`user`.`firstname`,`user`.`lastname`,`listing`.`name` AS `listingname`,`paymenttype`.`name` AS `paymenttypename`
FROM `billing` 
INNER JOIN `user` ON `user`.`id` = `billing`.`user`
INNER JOIN `listing` ON `listing`.`id` = `billing`.`listing`
INNER JOIN `paymenttype` ON `paymenttype`.`id` = `billing`.`paymenttype`  ";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
    
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'billing' )->row();
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
    public function getbillingdropdown()
	{
		$query=$this->db->query("SELECT * FROM `billing`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getlogobybillingid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `billing` WHERE `id`='$id'")->row();
		return $query;
	}
	
	function deletebilling($id)
	{
		$query=$this->db->query("DELETE FROM `billing` WHERE `id`='$id'");
	}
	function changepassword($id,$password)
	{
		$data  = array(
			'password' =>md5($password),
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