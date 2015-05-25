<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Specialoffer_model extends CI_Model
{
	
	public function create($name,$category,$email,$phone,$listing)
	{
		$data  = array(
			'name' => $name,
			'category' => $category,
			'email' => $email,
			'phone' => $phone,
            'timestamp'=>NULL
		);
		$query=$this->db->insert( 'specialoffer', $data );
		$specialofferid=$this->db->insert_id();
        foreach($listing AS $key=>$value)
        {
           $this->specialoffer_model->createlistingbyspecialoffer($value,$specialofferid);
        }
		if(!$query)
			return  0;
		else
			return  1;
	}
    
    public function createlistingbyspecialoffer($value,$specialofferid)
	{
		$data  = array(
			'listing' => $value,
			'specialoffer' => $specialofferid
		);
		$query=$this->db->insert( 'specialofferlisting', $data );
		return  1;
	}
	function viewspecialoffer()
	{
		$query="SELECT `specialoffer`.`id`, `specialoffer`.`name`, `specialoffer`.`category`, `specialoffer`.`email`, `specialoffer`.`phone`, `specialoffer`.`timestamp`, `specialoffer`.`deletestatus`,`category`.`name` AS `categoryname` 
        FROM `specialoffer` 
        LEFT OUTER JOIN `category` ON `category`.`id`=`specialoffer`.`category`
        WHERE `specialoffer`.`deletestatus`=1 ";
	   
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
		$query=$this->db->get( 'specialoffer' )->row();
		return $query;
	}
    
     public function getselectedlistingforspecialofferdropdown($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `specialoffer`,`listing` FROM `specialofferlisting`  WHERE `specialoffer`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->listing;
            }
        }
         return $return;
	}
	public function getlogobylistingid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `listing` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit($id,$name,$category,$email,$phone,$listing)
	{
		$data  = array(
			'name' => $name,
			'category' => $category,
			'email' => $email,
			'phone' => $phone,
            'timestamp'=>NULL
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'specialoffer', $data );
        $querydeletelisting=$this->db->query("DELETE FROM `specialofferlisting` WHERE `specialoffer`='$id'");
        foreach($listing AS $key=>$value)
        {
            $this->specialoffer_model->createlistingbyspecialoffer($value,$id);
        }
		return 1;
	}
	function deletespecialoffer($id)
	{
		$query=$this->db->query("DELETE FROM `specialoffer` WHERE `id`='$id'");
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