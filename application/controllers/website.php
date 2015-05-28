<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Website extends CI_Controller
{
	public function index( )
	{
		$data["page"]="index";
		$data["description"]=$this->home_model->getdescription();
		$description=$data["description"];
//		print_r($description);
        $this->load->view("frontend",$data);
	}
    
	public function explore( )
	{
		$data["page"]="explore";
        $this->load->view("frontend",$data);
	}
	public function feed( )
	{
		$data["page"]="feed";
        $data["videos"]=$this->video_model->getallvideos();
        $this->load->view("frontend",$data);
	}

	public function description()
	{
        $id=$this->input->get('id');
        $data["video"]=$this->video_model->getvideobyid($id);
        $data["videotags"]=$this->video_model->getvideotagsbyvideo($id);
        $data["relatedvideosid"]=$this->video_model->getrelatedvideosid($id);
		$multiplevideos=$data["relatedvideosid"];
        $data["relatedvideos"]=$this->video_model->getrelatedvideos($multiplevideos);
		$relatedvideos=$data["relatedvideos"];
		$data["page"]="description";
        $this->load->view("frontend",$data);
	}

	public function preview( )
	{
		$data["page"]="preview";
        $data["videos"]=$this->video_model->getallvideos();
        $this->load->view("frontend",$data);
	}
    public function getemail(){
		$email=$this->input->get_post('email');
		$id=$this->user_model->getemail($email);
		$data["message"]=$id;
        $this->load->view("json",$data);
    }
    public function getemail1(){
    $email=$this->input->get_post('email');
    $id=$this->user_model->getemail($email);
       $data["message"]=$id;
        $this->load->view("json",$data);
    }
        public function getemail2(){
    $email=$this->input->get_post('email');
    $id=$this->user_model->getemail($email);
      $data["message"]=$id;
        $this->load->view("json",$data);
    }

}
?>