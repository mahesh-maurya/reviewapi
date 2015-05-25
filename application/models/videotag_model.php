<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Videotag_model extends CI_Model
{
	//videotag
	public function createvideotag($video,$tag)
	{
		$data  = array(
			'video' => $video,
			'tag' => $tag
		);
		$query=$this->db->insert( 'videotags', $data );
		
		return  1;
	}
    function viewvideotag($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `videotags`.`id`, `videotags`.`video`, `videotags`.`tag`, `videotags`.`timestamp`,`video`.`title` AS `videotitle` 
FROM `videotags`
INNER JOIN `video` ON `videotags`.`video`=`video`.`id` 
		ORDER BY `videotags`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `videotags`
INNER JOIN `video` ON `videotags`.`video`=`video`.`id`  ")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
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
		$query=$this->db->get( 'videotags' )->row();
		return $query;
	}
	
	public function editvideotag($id,$video,$tag)
	{
		$data = array(
			'video' => $video,
			'tag' => $tag
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'videotags', $data );
		
		return 1;
	}
	function deletevideotag($id)
	{
		$query=$this->db->query("DELETE FROM `videotags` WHERE `id`='$id'");
		
	}
	
	
    
}
?>