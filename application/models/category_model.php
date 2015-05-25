<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Category_model extends CI_Model
{
	//category
	public function createcategory($name,$parent)
	{
		$data  = array(
			'name' => $name,
			'parent' => $parent
		);
		$query=$this->db->insert( 'category', $data );
		
		return  1;
	}
    function viewcategory($startfrom,$totallength)
	{
		$query=$this->db->query("SELECT `category`.`id`,`category`.`name`,`tab2`.`name` as `parent` FROM `category` 
		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent` 
		ORDER BY `category`.`id` ASC LIMIT $startfrom,$totallength")->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount`  FROM `category` 
		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent` ")->row();
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
	public function beforeeditcategory( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'category' )->row();
		return $query;
	}
	
	public function editcategory( $id,$name,$parent)
	{
		$data = array(
			'name' => $name,
			'parent' => $parent
		
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'category', $data );
		
		return 1;
	}
	function deletecategory($id)
	{
		$query=$this->db->query("DELETE FROM `category` WHERE `id`='$id'");
		
	}
	
	public function getcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `category`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	
    
	public function getcategorylist()
	{
		$query=$this->db->query("SELECT `category`.`id`,`category`.`name`,`tab2`.`name` as `parent`,`tab2`.`id` as `parentid` FROM `category` 
		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`  ORDER BY `name` ASC")->result();
		return $query;
	}
//    function viewmaincategory()
//	{
//		$query=$this->db->query("SELECT `category`.`id`,`category`.`name`,`category`.`logo`,`category`.`status`,`tab2`.`name` as `parent` FROM `category` 
//		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent` WHERE `category`.`parent`='0'
//		ORDER BY `category`.`id` ASC")->result();
//		return $query;
//	}
}
?>