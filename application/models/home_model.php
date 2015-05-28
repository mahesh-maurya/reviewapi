<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class home_model extends CI_Model
{
	//video
	public function create($title,$description,$image)
	{
		$data  = array(
			'title' => $title,
			'description' => $description,
			'image' => $image
		);
		$query=$this->db->insert( 'home', $data );
		
		return  1;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'home' )->row();
		return $query;
	}
	public function getdescription(){
	 
		$query=$this->db->query("SELECT `home`.`id`,`home`.`image`,`home`.`description`,`home`.`title`
FROM `home`")->result();       
		return $query;	
	}
	
	public function edit($id,$title,$description,$image)
	{
		
		$query=$this->db->query("UPDATE `home` SET `title`='$title',`description`='$description',`image`='$image' WHERE `id`='$id'");
		return 1;
	}
	function deletehome($id)
	{
		$query=$this->db->query("DELETE FROM `home` WHERE `id`='$id'");
		
	}    
	function viewhome($startfrom,$totallength)
	{
		$query="SELECT DISTINCT `home`.`id` as `id`,`home`.`title` as `title`,`home`.`description` as `description`,`home`.`image` as `image`
		FROM `home`";
		$query=$this->db->query($query)->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `home`")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
}
?>