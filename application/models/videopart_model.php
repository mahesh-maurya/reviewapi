<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Videopart_model extends CI_Model
{
	//videopart
	public function createvideopart($video,$part,$question,$videourl,$status)
	{
		$data  = array(
			'video' => $video,
			'part' => $part,
			'question' => $question,
			'videourl' => $videourl,
			'status' => $status
		);
		$query=$this->db->insert( 'videopart', $data );
		
		return  1;
	}
    function viewvideopart($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `videopart`.`id`, `videopart`.`video`, `videopart`.`timestamp`, `videopart`.`part`, `videopart`.`question`, `videopart`.`videourl`, `videopart`.`status` ,`video`.`title` AS `videotitle`,`video`.`description` AS `videodescription`,`video`.`location` AS `videolocation`
FROM `videopart`
INNER JOIN `video` ON `videopart`.`video`=`video`.`id` 
		ORDER BY `videopart`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `videopart`
INNER JOIN `video` ON `videopart`.`video`=`video`.`id` ")->row();
        
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
    
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'videopart' )->row();
		return $query;
	}
	
	public function editvideopart($id,$video,$part,$question,$videourl,$status)
	{
		$data = array(
			'video' => $video,
			'part' => $part,
			'question' => $question,
			'videourl' => $videourl,
			'status' => $status
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'videopart', $data );
		
		return 1;
	}
	function deletevideopart($id)
	{
		$query=$this->db->query("DELETE FROM `videopart` WHERE `id`='$id'");
		
	}
	
	public function getvideopartdropdown()
	{
		$query=$this->db->query("SELECT * FROM `videopart`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->title;
		}
		
		return $return;
	}
	
    
}
?>