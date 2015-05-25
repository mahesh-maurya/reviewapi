<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	
    public function GetCategoryList()
    {
        $data['message']=$this->category_model->getcategorylist();
		$this->load->view('json',$data);
    }
	function postVideo()
	{
		$title=$this->input->get_post('title');
		$useremail=$this->input->get_post('useremail');
		$userid=$this->user_model->getuseridbyemail($useremail);
		$latitude=$this->input->get_post('latitude');
		$longitude=$this->input->get_post('longitude');
		$location=$this->input->get_post('location');
		$rating=$this->input->get_post('rating');
		$category=$this->input->get_post('category');
		$image=$this->input->get_post('image');
        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mp4|3gp|flv|mp3';
		$this->load->library('upload', $config);
		$filename="video";
		$video="";
		if (  $this->upload->do_upload($filename))
		{
            $uploaddata = $this->upload->data();
            $video=$uploaddata['file_name'];
		}
        
		$data["message"]=$this->video_model->postvideo($title,$userid,$latitude,$longitude,$location,$rating,$video,$category,$image);
		$this->load->view("json",$data);
	}
    
	function postVideoforapi()
	{
		$title=$this->input->get_post('title');
		$useremail=$this->input->get_post('useremail');
		$userid=$this->user_model->getuseridbyemail($useremail);
		$latitude=$this->input->get_post('latitude');
		$longitude=$this->input->get_post('longitude');
		$location=$this->input->get_post('location');
		$rating=$this->input->get_post('rating');
		$category=$this->input->get_post('category');
		$video=$this->input->get_post('video');
		$image=$this->input->get_post('image');
        
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'mp4|3gp|flv|mp3';
//		$this->load->library('upload', $config);
//		$filename="video";
//		$video="";
//		if (  $this->upload->do_upload($filename))
//		{
//            $uploaddata = $this->upload->data();
//            $video=$uploaddata['file_name'];
//		}
//        
		$data["message"]=$this->video_model->postvideo($title,$userid,$latitude,$longitude,$location,$rating,$video,$category,$image);
		$this->load->view("json",$data);
	}
    
    public function getvideosforuser()
    {
		$useremail=$this->input->get_post('useremail');
		$userid=$this->user_model->getuseridbyemail($useremail);
		$category=$this->input->get_post('category');
        $data['message']=$this->video_model->getvideosforuser($userid,$category);
		$this->load->view('json',$data);
    }
    public function getallparentcategories()
    {
        $data['message']=$this->category_model->getallparentcategories();
		$this->load->view('json',$data);
    }
    
    public function getsubcategory()
    {
        $id=$this->input->get_post('id');
        $data['message']=$this->category_model->getsubcategory($id);
		$this->load->view('json',$data);
    }
    public function getlistingbycategory()
    {
        $categoryid=$this->input->get_post('id');
        $data['message']=$this->listing_model->getlistingbycategory($categoryid);
		$this->load->view('json',$data);
    }
    public function getonelistingbyid()
    {
        $listingid=$this->input->get_post('id');
        $data['message']=$this->listing_model->getonelistingbyid($listingid);
		$this->load->view('json',$data);
    }
    public function getlistingbycity()
    {
        $cityid=$this->input->get_post('id');
        $data['message']=$this->listing_model->getlistingbycity($cityid);
		$this->load->view('json',$data);
    }
    //search
    
    public function searchcategory()
    {
        $category=$this->input->get_post('categoryname');
        $data['message']=$this->category_model->searchcategory($category);
		$this->load->view('json',$data);
    }
    
}
?>