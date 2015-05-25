<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class User_model extends CI_Model
{
	protected $id,$username ,$password;
	public function validate($username,$password )
	{
		
		$password=md5($password);
		$query ="SELECT `user`.`id`,CONCAT(`firstname`,'',`lastname`) as `name`,`email`,`user`.`accesslevel`,`accesslevel`.`name` as `access` FROM `user`
		INNER JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id` 
		WHERE `email` LIKE '$username' AND `password` LIKE '$password' AND `status`=1 AND `accesslevel` IN (1,2) ";
		$row =$this->db->query( $query );
		if ( $row->num_rows() > 0 ) {
			$row=$row->row();
			$this->id       = $row->id;
			$this->name = $row->name;
			$this->email = $row->email;
			$newdata        = array(
				'id' => $this->id,
				'email' => $this->email,
				'name' => $this->name ,
				'accesslevel' => $row->accesslevel ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
			return true;
		} //count( $row_array ) == 1
		else
			return false;
	}
	public function getimagebyid($id){
	$query=$this->db->query("SELECT `image` FROM `home` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function create($firstname,$lastname,$dob,$password,$accesslevel,$email,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$phoneno,$google,$state,$country)
	{
		$data  = array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'password' =>md5($password),
			'accesslevel' => $accesslevel,
			'email' => $email,
            'website'=> $website,
			'contact' => $contact,
            'address'=>$address,
            'city'=>$city,
            'pincode'=>$pincode,
			'status' => $status,
			'dob' => $dob,
			'facebookuserid' => $facebookuserid,
            'phoneno' => $phoneno,
            'google' => $google,
            'state' => $state,
            'country' => $country
		);
		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();
		if($query)
		{
			$this->saveuserlog($id,'User Created');
		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewusers($startfrom,$totallength)
	{
		$user = $this->session->userdata('accesslevel');
		$query="SELECT DISTINCT `user`.`id` as `id`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`accesslevel`.`name` as `accesslevel`	,`user`.`email` as `email`,`user`.`contact` as `contact`,`user`.`status` as `status`,`user`.`accesslevel` as `access`
		FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id`  ";
	   $accesslevel=$this->session->userdata('accesslevel');
	   if($accesslevel==1)
		{
			$query .= " ";
		}
		else if($accesslevel==2)
		{
			$query .= " WHERE `user`.`accesslevel`> '$accesslevel' ";
		}
		
	   $query.=" ORDER BY `user`.`id` ASC LIMIT $startfrom,$totallength";
		$query=$this->db->query($query)->result();
        
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id`  ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'user' )->row();
		return $query;
	}
	
	public function edit($id,$fname,$lname,$dob,$password,$accesslevel,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$phoneno,$google,$state,$country)
	{
		$data  = array(
			'firstname' => $fname,
			'lastname' => $lname,
			'accesslevel' => $accesslevel, 
            'website'=> $website,
			'contact' => $contact,
            'address'=>$address,
            'city'=>$city,
            'pincode'=>$pincode,
			'status' => $status,
			'dob' => $dob,
			'facebookuserid' => $facebookuserid,
            'phoneno' => $phoneno,
            'google' => $google,
            'state' => $state,
            'country' => $country
		);
		if($password != "")
			$data['password'] =md5($password);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Details Edited');
		}
		return 1;
	}
	function deleteuser($id)
	{
		$query=$this->db->query("DELETE FROM `user` WHERE `id`='$id'");
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
	 function sociallogin($user_profile,$provider)
    {
        $query=$this->db->query("SELECT * FROM `user` WHERE `user`.`socialid`='$user_profile->identifier'");
        if($query->num_rows == 0)
        {

					
					$facebookid="";
					$twitterid="";
					switch($provider)
					{
						
						case "Facebook":
						$facebookid=$user_profile->identifier;
						break;
						case "Twitter":
						$twitterid=$user_profile->identifier;
						break;
					}

            $query2=$this->db->query("INSERT INTO `user` (`id`, `firstname`,`lastname`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `name`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `country`, `pincode`, `facebook`, `twitter`) VALUES (NULL, '$user_profile->firstName','$user_profile->lastName', '', '$user_profile->email', '2', CURRENT_TIMESTAMP, '1', '$user_profile->photoURL', '$user_profile->displayName', '$user_profile->identifier', '$provider', '', '$user_profile->birthYear-$user_profile->birthMonth-$user_profile->birthDay', '', '$user_profile->address,$user_profile->region', '$user_profile->city', '', '$user_profile->country', '', '$facebookid', '$twitterid')");
            $id=$this->db->insert_id();
            $newdata = array(
                'email'     => $user_profile->email,
                'password' => "",
                'logged_in' => 'true',
                'id'=> $id,
                'name'=> $user_profile->displayName,
                'image'=> $user_profile->photoURL,
                'logintype'=>$provider
            );

            $this->session->set_userdata($newdata);

            return $newdata;

        }
        else
        {
            $query=$query->row();
            $newdata = array(
                'email'     => $user_profile->email,
                'password' => "",
                'logged_in' => 'true',
                'id'=> $query->id,
                'name'=> $user_profile->displayName,
                'image'=> $user_profile->photoURL,
                'logintype'=>$provider
            );

            $this->session->set_userdata($newdata);

            return $newdata;
        }
    }
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "2" => "Disabled",
			 "3" => "3",
			 "4" => "4",
			 "5" => "5"
			);
		return $status;
	}
	
	function editaddress($id,$address,$city,$pincode)
	{
		$data  = array(
			'address' => $address,
			'city' => $city,
			'pincode' => $pincode,
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Address Edited');
		}
		return 1;
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
	function getorganizeruser()
	{
		$return=array();
		$query=$this->db->query("SELECT `id`,`firstname`,`lastname` FROM `user` WHERE `accesslevel`=2 ORDER BY `firstname` ASC")->result();
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname.' '.$row->lastname;
		}
		return $return;
	}
	function userinterestevents($user)
	{
		$query = $this->db->query("SELECT `event`.`title` as `event`,`userinterestevents`.`status`,`userinterestevents`.`timestamp` FROM `userinterestevents`
		INNER JOIN `event` ON `event`.`id`=`userinterestevents`.`event`
		WHERE `user`='$user'")->result();
		return $query;
	}
    
    //----------------------------Functions added by avinash--------------------
    
    
    function viewall()
      {
         $query= $this->db->query("SELECT `user`.`id` ,  `user`.`firstname` ,  `user`.`lastname` ,  `user`.`password` ,  `user`.`email` ,  `user`.`website` ,  `user`.`description` ,  `user`.`eventinfo` ,  `user`.`contact` , `user`.`address` ,  `user`.`city` ,  `user`.`pincode` ,  `user`.`dob` ,  `accesslevel`.`id` ,  `accesslevel`.`name` AS `Accesslevel` ,  `user`.`timestamp` ,  `user`.`facebookuserid` ,  `user`.`newsletterstatus` ,  `user`.`status`,`user`.`logo`,`user`.`showwebsite`,`user`.`eventsheld`,`user`.`topeventlocation`
FROM  `user` 
INNER JOIN  `accesslevel` ON  `user`.`accesslevel` =  `accesslevel`.`id`");
        if($query->num_rows > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
        return $data;
        
      }
    
     function viewone($id)
      {
         //$this->db->where('id', $id);
         $query= $this->db->query("SELECT `user`.`id` ,  `user`.`firstname` ,  `user`.`lastname` ,  `user`.`password` ,  `user`.`email` ,  `user`.`website` ,  `user`.`description` ,  `user`.`eventinfo` ,  `user`.`contact` , `user`.`address` ,  `user`.`city` ,  `user`.`pincode` ,  `user`.`dob` ,  `accesslevel`.`id` ,  `accesslevel`.`name` AS `Accesslevel` ,  `user`.`timestamp` ,  `user`.`facebookuserid` ,  `user`.`newsletterstatus` ,  `user`.`status`,`user`.`logo`,`user`.`showwebsite`,`user`.`eventsheld`,`user`.`topeventlocation`
FROM  `user` 
INNER JOIN  `accesslevel` ON  `user`.`accesslevel` =  `accesslevel`.`id` WHERE `user`.`id`='$id'");
        if($query->num_rows > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
        return $data;
         
      }
    
    function deleteone($id)
    {
        $this->db->where('id', $id);
        $query= $this->db->delete('user');
        //$this->db->where('user', $id);
        //$queryorganizer=$this->db->delete('organizer');
        return $query;
    }
    
    function update($id,$firstname,$lastname,$password,$email,$website,$description,$eventinfo,$contact,$address,$city,$pincode,$dob,$accesslevel,$timestamp,$facebookuserid,$newsletterstatus,$status,$logo,$showwebsite,$eventsheld,$topeventlocation)
    {
        $query=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`website`='$website',`description`='$description',`eventinfo`='$eventinfo',`contact`='$contact',`address`='$address',`city`='$city',`pincode`='$pincode',`dob`='$dob',`accesslevel`='$accesslevel',`timestamp`=null,`facebookuserid`='$facebookuserid',`newsletterstatus`='$newsletterstatus',`status`='$status',`logo`='$logo',`showwebsite`='$showwebsite',`eventsheld`='$eventsheld',`topeventlocation`='$topeventlocation' WHERE `id`=$id");
        
        return $query;
    }
    function signup($email,$password) 
    {
         $password=md5($password);   
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email' ");
        if($query->num_rows == 0)
        {
            $this->db->query("INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `description`, `eventinfo`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `newsletterstatus`, `status`,`logo`,`showwebsite`,`eventsheld`,`topeventlocation`) VALUES (NULL, NULL, NULL, '$password', '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL, NULL,NULL, NULL, NULL,NULL);");
            $user=$this->db->insert_id();
            $newdata = array(
                'email'     => $email,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user
            );

            $this->session->set_userdata($newdata);
            
          //  $queryorganizer=$this->db->query("INSERT INTO `organizer`(`name`, `description`, `email`, `info`, `website`, `contact`, `user`) VALUES(NULL,NULL,NULL,NULL,NULL,NULL,'$user')");
            
            
           return $user;
        }
        else
         return false;
        
        
    }
    function login($email,$password) 
    {
        $password=md5($password);
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            $user=$user->id;
            

            $newdata = array(
                'email'     => $email,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user
            );

            $this->session->set_userdata($newdata);
            //print_r($newdata);
            return $user;
        }
        else
        return false;


    }
    function authenticate() {
        $is_logged_in = $this->session->userdata( 'logged_in' );
        //print_r($is_logged_in);
        if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
            return false;
        } //$is_logged_in !== 'true' || !isset( $is_logged_in )
        else {
            $userid = $this->session->userdata( 'id' );
         return $userid;
        }
    }
    
	function getallinfoofuser($id)
	{
		$user = $this->session->userdata('accesslevel');
		$query="SELECT DISTINCT `user`.`id` as `id`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`accesslevel`.`name` as `accesslevel`	,`user`.`email` as `email`,`user`.`contact` as `contact`,`user`.`status` as `status`,`user`.`accesslevel` as `access`
		FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id` 
       WHERE `user`.`id`='$id'";
		$query=$this->db->query($query)->row();
		return $query;
	}
    
    
	function getuseridbyemail($useremail)
	{
		$query = $this->db->query("SELECT `id` FROM `user`
		WHERE `email`='$useremail'")->row();
        $userid=$query->id;
		return $userid;
	}
    public function getemail($email){
    $data = array(
   'email' => $email ,
);
$this->db->insert('user', $data); 
    }
}
?>