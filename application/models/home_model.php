<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class home_model extends CI_Model
{
	//video
	public function createhome($title,$description,$image)
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
		$query=$this->db->get( 'video' )->row();
		return $query;
	}
	
	public function edithome($title,$description)
	{
		$data = array(
			'title' => $title,
			'description' => $description,
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'home', $data );
		
		return 1;
	}
	function deletehome($id)
	{
		$query=$this->db->query("DELETE FROM `home` WHERE `id`='$id'");
		
	}    
}
?>