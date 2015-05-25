<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Listing_model extends CI_Model
{
	
	public function create($name,$user,$lat,$long,$address,$city,$pincode,$state,$country,$description,$contact,$email,$website,$facebookuserid,$googleplus,$twitter,$yearofestablishment,$timeofoperation_start,$timeofoperation_end,$type,$credits,$isverified,$video,$logo,$category,$modeofpayment,$daysofoperation)
	{
		$data  = array(
			'name' => $name,
			'user' => $user,
			'lat' => $lat,
			'long' => $long,
            'address'=>$address,
            'city'=>$city,
            'pincode'=>$pincode,
            'state' => $state,
            'country' => $country,
            'description' => $description,
			'contactno' => $contact,
			'email' => $email,
            'website'=> $website,
			'facebook' => $facebookuserid,
            'googleplus' => $googleplus,
            'twitter' => $twitter,
            'yearofestablishment' => $yearofestablishment,
            'timeofoperation_start' => $timeofoperation_start,
            'timeofoperation_end' => $timeofoperation_end,
            'type' => $type,
            'credits' => $credits,
            'isverified' => $isverified,
            'video' => $video,
            'logo' => $logo
		);
		$query=$this->db->insert( 'listing', $data );
		$listingid=$this->db->insert_id();
        foreach($category AS $key=>$value)
        {
           $this->listing_model->createcategorybylisting($value,$listingid);
        }
        foreach($modeofpayment AS $key=>$value)
        {
           $this->listing_model->createmodeofpaymentbylisting($value,$listingid);
        }
        foreach($daysofoperation AS $key=>$value)
        {
           $this->listing_model->createdaysofoperationbylisting($value,$listingid);
        }
//		print_r($category);
//        print_r($modeofpayment);
//        print_r($daysofoperation);
		if(!$query)
			return  0;
		else
			return  1;
	}
    public function createcategorybylisting($value,$listingid)
	{
		$data  = array(
			'category' => $value,
			'listing' => $listingid
		);
		$query=$this->db->insert( 'listingcategory', $data );
		return  1;
	}
    public function createmodeofpaymentbylisting($value,$listingid)
	{
		$data  = array(
			'modeofpayment' => $value,
			'listing' => $listingid
		);
		$query=$this->db->insert( 'listingmodeofpayment', $data );
		return  1;
	}
    public function createdaysofoperationbylisting($value,$listingid)
	{
		$data  = array(
			'daysofoperation' => $value,
			'listing' => $listingid
		);
		$query=$this->db->insert( 'listingdaysofoperation', $data );
		return  1;
	}
	function viewlisting()
	{
		$query="SELECT `id`, `name`, `user`, `lat`, `long`, `address`, `city`, `pincode`, `state`, `country`, `description`, `logo`, `contactno`, `email`, `website`, `facebook`, `twitter`, `googleplus`, `yearofestablishment`, `timeofoperation_start`, `timeofoperation_end`, `type`, `credits`, `isverified`, `video`, `deletestatus` FROM `listing`  ";
	   
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
    public function getlistingdropdown()
	{
		$query=$this->db->query("SELECT * FROM `listing`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    public function getlistingforspecialofferdropdown()
	{
		$query=$this->db->query("SELECT * FROM `listing`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'listing' )->row();
		return $query;
	}
	public function beforeeditlistingimages( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'listingimages' )->row();
		return $query;
	}
    
	public function getlogobylistingid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `listing` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit($id,$name,$user,$lat,$long,$address,$city,$pincode,$state,$country,$description,$contact,$email,$website,$facebookuserid,$googleplus,$twitter,$yearofestablishment,$timeofoperation_start,$timeofoperation_end,$type,$credits,$isverified,$video,$logo,$category,$modeofpayment,$daysofoperation)
	{
		$data  = array(
			'name' => $name,
			'user' => $user,
			'lat' => $lat,
			'long' => $long,
            'address'=>$address,
            'city'=>$city,
            'pincode'=>$pincode,
            'state' => $state,
            'country' => $country,
            'description' => $description,
			'contactno' => $contact,
			'email' => $email,
            'website'=> $website,
			'facebook' => $facebookuserid,
            'googleplus' => $googleplus,
            'twitter' => $twitter,
            'yearofestablishment' => $yearofestablishment,
            'timeofoperation_start' => $timeofoperation_start,
            'timeofoperation_end' => $timeofoperation_end,
            'type' => $type,
            'credits' => $credits,
            'isverified' => $isverified,
            'video' => $video,
            'logo' => $logo
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'listing', $data );
        $querydeletecategory=$this->db->query("DELETE FROM `listingcategory` WHERE `listing`='$id'");
        $querydeletemodeofpayment=$this->db->query("DELETE FROM `listingmodeofpayment` WHERE `listing`='$id'");
        $querydeletedaysofoperation=$this->db->query("DELETE FROM `listingdaysofoperation` WHERE `listing`='$id'");
        foreach($category AS $key=>$value)
        {
           $this->listing_model->createcategorybylisting($value,$id);
        }
        foreach($modeofpayment AS $key=>$value)
        {
           $this->listing_model->createmodeofpaymentbylisting($value,$id);
        }
        foreach($daysofoperation AS $key=>$value)
        {
           $this->listing_model->createdaysofoperationbylisting($value,$id);
        }
		return 1;
	}
	function deletelisting($id)
	{
		$query=$this->db->query("DELETE FROM `listing` WHERE `id`='$id'");
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
    
	function viewlistingimages($id)
	{
		$query="SELECT `id`, `listing`, `image`, `order`, `timestamp` 
        FROM `listingimages` 
        WHERE `listing`='$id'";
	   
		$query=$this->db->query($query)->result();
		return $query;
	}
    public function createlistingimages($listing,$order,$image)
	{
		$data  = array(
			'listing' => $listing,
			'image' => $image,
			'order' => $order
		);
		$query=$this->db->insert( 'listingimages', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
    
	public function editlistingimages($id,$order,$image,$listing)
	{
		$data  = array(
			'listing' => $listing,
			'image' => $image,
			'order' => $order
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'listingimages', $data );
        
		return 1;
	}
	function deletelistingimages($id)
	{
		$query=$this->db->query("DELETE FROM `listingimages` WHERE `id`='$id'");
	}
    
	public function getlistingimagesbyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `listingimages` WHERE `id`='$id'")->row();
		return $query;
	}
    
    //frontend apis
    
	public function getlistingbycategory($id)
	{
		$query=$this->db->query("SELECT `listingcategory`.`listing`, `listingcategory`.`category`,`listing`.`name`,`listing`.`id` AS `listingid`, `listing`. `user`, `listing`.`lat`, `listing`.`long`, `listing`.`address`, `listing`.`city`, `listing`.`pincode`, `listing`.`state`, `listing`.`country`, `listing`.`description`, `listing`.`logo`, `listing`.`contactno`, `listing`.`email`, `listing`.`website`, `listing`.`facebook`, `listing`.`twitter`, `listing`.`googleplus`, `listing`.`yearofestablishment`, `listing`.`timeofoperation_start`, `listing`.`timeofoperation_end`, `listing`.`type`, `listing`.`credits`, `listing`.`isverified`, `listing`.`video` 
FROM `listingcategory`
LEFT OUTER JOIN `listing` ON `listing`.`id`=`listingcategory`.`listing`
WHERE `listingcategory`.`category`='$id'")->result();
		return $query;
	}
	public function getonelistingbyid($id)
	{
		$query['listing']=$this->db->query("SELECT `listing`.`name`,`listing`.`id` AS `listingid`, `listing`. `user`, `listing`.`lat`, `listing`.`long`, `listing`.`address`, `listing`.`city`, `listing`.`pincode`, `listing`.`state`, `listing`.`country`, `listing`.`description`, `listing`.`logo`, `listing`.`contactno`, `listing`.`email`, `listing`.`website`, `listing`.`facebook`, `listing`.`twitter`, `listing`.`googleplus`, `listing`.`yearofestablishment`, `listing`.`timeofoperation_start`, `listing`.`timeofoperation_end`, `listing`.`type`, `listing`.`credits`, `listing`.`isverified`, `listing`.`video` 
FROM `listing`
WHERE `listing`.`id`='$id'")->row();
        
		$query['categories']=$this->db->query("SELECT `listingcategory`.`listing`, `listingcategory`.`category`,`category`.`name` AS `categoryname` 
FROM `listingcategory`
LEFT OUTER JOIN `category` ON `category`.`id`=`listingcategory`.`category`
WHERE `listingcategory`.`listing`='$id'")->result();
        
		$query['images']=$this->db->query("SELECT `listingimages`.`listing`, `listingimages`.`image` 
FROM `listingimages`
WHERE `listingimages`.`listing`='$id'")->result();
        
		$query['modeofpayment']=$this->db->query("SELECT `listingmodeofpayment`.`listing`, `listingmodeofpayment`.`modeofpayment` ,`modeofpayment`.`name` AS `modeofpaymentname`
FROM `listingmodeofpayment`
LEFT OUTER JOIN `modeofpayment` ON `modeofpayment`.`id`=`listingmodeofpayment`.`modeofpayment`
WHERE `listingmodeofpayment`.`listing`='$id'")->result();
        
		$query['daysofoperation']=$this->db->query("SELECT `listingdaysofoperation`.`listing`, `listingdaysofoperation`.`daysofoperation` ,`daysofoperation`.`name` AS `daysofoperationname`
FROM `listingdaysofoperation`
LEFT OUTER JOIN `daysofoperation` ON `daysofoperation`.`id`=`listingdaysofoperation`.`daysofoperation`
WHERE `listingdaysofoperation`.`listing`='$id'")->result();
        
		return $query;
	}
    
	public function getlistingbycity($cityid)
	{
		$query=$this->db->query("SELECT `listing`.`name`,`listing`.`id` AS `listingid`, `listing`. `user`, `listing`.`lat`, `listing`.`long`, `listing`.`address`, `listing`.`city`, `listing`.`pincode`, `listing`.`state`, `listing`.`country`, `listing`.`description`, `listing`.`logo`, `listing`.`contactno`, `listing`.`email`, `listing`.`website`, `listing`.`facebook`, `listing`.`twitter`, `listing`.`googleplus`, `listing`.`yearofestablishment`, `listing`.`timeofoperation_start`, `listing`.`timeofoperation_end`, `listing`.`type`, `listing`.`credits`, `listing`.`isverified`, `listing`.`video` 
FROM `listing`
WHERE `listing`.`city`='$cityid'")->result();
		return $query;
	}
    
	function getallinfooflisting($listingid)
	{
		$query="SELECT `id`, `name`, `user`, `lat`, `long`, `address`, `city`, `pincode`, `state`, `country`, `description`, `logo`, `contactno`, `email`, `website`, `facebook`, `twitter`, `googleplus`, `yearofestablishment`, `timeofoperation_start`, `timeofoperation_end`, `type`, `credits`, `isverified`, `video`, `deletestatus` 
        FROM `listing`
        WHERE `id`='$listingid'";
	   
		$query=$this->db->query($query)->row();
		return $query;
	}
}
?>