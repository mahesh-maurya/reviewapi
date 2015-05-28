<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class relatedvideos_model extends CI_Model
{
	//video
	public function create($videoid,$relatedvideoid)
	{
		$data  = array(
			'videoid' => $videoid,
			'relatedvideoid' => $relatedvideoid,
		);
		$query=$this->db->insert( 'relatedvideos', $data );
		
		return  1;
	}
	public function beforeedit($id)
	{
		$this->db->where('id', $id );
		$query=$this->db->get('relatedvideos')->row();
		return $query;
	}
	public function getrelatedvideos(){
	 
		$query=$this->db->query("SELECT `relatedvideos`.`id`,`relatedvideos`.`videoid`,`relatedvideos`.`relatedvideoid`
FROM `relatedvideos`")->result();       
		return $query;	
	}
	
	public function edit($id,$videoid,$relatedvideoid)
	{
		
		$query=$this->db->query("UPDATE `relatedvideos` SET `videoid`='$videoid',`relatedvideoid`='$relatedvideoid' WHERE `id`='$id'");
		return 1;
	}
	function deleterelatedvideos($id)
	{
		$query=$this->db->query("DELETE FROM `relatedvideos` WHERE `id`='$id'");
		
	}    
	function viewrelatedvideos($startfrom,$totallength)
	{
		$query="SELECT `relatedvideos`.`id` as `id`,`relatedvideos`.`videoid` as `videoid`,`relatedvideos`.`relatedvideoid` as `relatedvideoid` FROM `relatedvideos` LEFT OUTER JOIN `video` ON `video`.`id`=`relatedvideos`.`videoid`";
		$query=$this->db->query($query)->result();
        $return=new stdClass();
        $return->query=$query;
        $return->totalcount=$this->db->query("SELECT count(*) as `totalcount` FROM `relatedvideos`")->row();
        $return->totalcount=$return->totalcount->totalcount;
		return $return;
	}
	 public function getvideosdropdown()
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
}
?>