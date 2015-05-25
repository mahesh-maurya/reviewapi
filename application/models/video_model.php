<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Video_model extends CI_Model
{
	//video
	public function createvideo($user,$title,$description,$location,$lat,$long,$rating,$videourl,$status,$category,$image)
	{
		$data  = array(
			'user' => $user,
			'title' => $title,
			'description' => $description,
			'location' => $location,
			'lat' => $lat,
			'long' => $long,
			'rating' => $rating,
			'videourl' => $videourl,
			'category' => $category,
			'image' => $image,
			'status' => $status
		);
		$query=$this->db->insert( 'video', $data );
		
		return  1;
	}
	public function postvideo($title,$userid,$latitude,$longitude,$location,$rating,$video,$category)
	{
		$data  = array(
			'user' => $userid,
			'title' => $title,
			'location' => $location,
			'lat' => $latitude,
			'long' => $longitude,
			'rating' => $rating,
			'status' => 1,
			'category' => $category,
			'videourl' => $video
		);
		$query=$this->db->insert( 'video', $data );
		$videoid=$this->db->insert_id();
		if(!$query)
			return  0;
		else
			return  $videoid;
	}
    function viewvideo($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `video`.`id`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`,`user`.`firstname`,`user`.`lastname` 
FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` 
		ORDER BY `video`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
//		return $query;
	}
    
    function getvideosforuser($userid,$category)
	{
        if($category=="")
        {
            $query=$this->db->query("SELECT `video`.`id`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`, `video`.`category`,`user`.`firstname`,`user`.`lastname` 
FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` 
WHERE `video`.`user`='$userid'
		ORDER BY `video`.`id` ASC ")->result();
        }
        else
        {
		$query=$this->db->query("SELECT `video`.`id`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`, `video`.`category`,`user`.`firstname`,`user`.`lastname` 
FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` 
WHERE `video`.`user`='$userid' AND `video`.`category`='$category'
		ORDER BY `video`.`id` ASC ")->result();
        }
        
		return $query;
	}
    
    function getvideosbyuser($userid)
	{
		$query=$this->db->query("SELECT `video`.`id`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`, `video`.`category`,`user`.`firstname`,`user`.`lastname` 
FROM `video`
INNER JOIN `user` ON `video`.`user`=`user`.`id` 
WHERE `video`.`user`='$userid'
		ORDER BY `video`.`id` DESC LIMIT 0,5 ")->result();
        
		return $query;
	}
    
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Has Types",
			 "0" => "No Types",
			);
		return $status;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'video' )->row();
		return $query;
	}
	
	public function editvideo($id,$user,$title,$description,$location,$lat,$long,$rating,$videourl,$status,$category)
	{
		$data = array(
			'user' => $user,
			'title' => $title,
			'description' => $description,
			'location' => $location,
			'lat' => $lat,
			'long' => $long,
			'rating' => $rating,
			'videourl' => $videourl,
			'category' => $category,
			'status' => $status
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'video', $data );
		
		return 1;
	}
	function deletevideo($id)
	{
		$query=$this->db->query("DELETE FROM `video` WHERE `id`='$id'");
		
	}
	
	public function getvideodropdown()
	{
		$query=$this->db->query("SELECT * FROM `video`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->title;
		}
		
		return $return;
	}
	
    
    function getallvideos()
	{
		$query=$this->db->query("SELECT `video`.`id`,`video`.`image`,`video`.`likes`,`video`.`views`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`, `video`.`category`,`user`.`firstname`,`user`.`lastname` 
FROM `video`
LEFT OUTER JOIN `user` ON `video`.`user`=`user`.`id` 
LEFT OUTER JOIN `category` ON `video`.`category`=`category`.`name` 
		ORDER BY `video`.`id` DESC LIMIT 0,9 ")->result();
        
		return $query;
	}
    
    function getvideotagsbyvideo($id)
	{
		$query=$this->db->query("SELECT `videotags`.`id`, `videotags`.`video`, `videotags`.`tag`, `videotags`.`timestamp`,`video`.`title` AS `videotitle` 
FROM `videotags`
INNER JOIN `video` ON `videotags`.`video`=`video`.`id` WHERE `videotags`.`video`='$id'")->result();
        
		return $query;
	}
    
    function getvideobyid($id)
	{
		$query=$this->db->query("SELECT `video`.`id`,`video`.`image`,`video`.`likes`,`video`.`views`, `video`.`user`, `video`.`title`, `video`.`description`,`video`. `location`,`video`. `lat`,`video`. `long`, `video`.`timestamp`, `video`.`rating`, `video`.`videourl`, `video`.`status`, `video`.`category`,`user`.`firstname`,`user`.`lastname`,`user`.`contact` AS `usercontact` 
FROM `video`
LEFT OUTER JOIN `user` ON `video`.`user`=`user`.`id` 
LEFT OUTER JOIN `category` ON `video`.`category`=`category`.`name` WHERE `video`.`id`='$id' 
		ORDER BY `video`.`id` DESC ")->row();
		return $query;
	}
    
    
    
}
?>