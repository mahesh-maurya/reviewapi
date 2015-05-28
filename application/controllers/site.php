 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('firstname','First Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('lastname','Last Name','trim|max_length[30]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contact','contactno','trim');
		$this->form_validation->set_rules('phoneno','phoneno','trim');
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('address','Address','trim|');
		$this->form_validation->set_rules('city','City','trim|max_length[30]');
		$this->form_validation->set_rules('pincode','Pincode','trim|max_length[20]');
		$this->form_validation->set_rules('state','state','trim|max_length[20]');
		$this->form_validation->set_rules('country','country','trim|max_length[20]');
		$this->form_validation->set_rules('facebookuserid','facebookuserid','trim|max_length[20]');
		$this->form_validation->set_rules('google','google','trim|max_length[20]');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('status','Status','trim');
		$this->form_validation->set_rules('dob','DOB','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['page']='createuser';
			$data['title']='Create New User';
			$this->load->view('template',$data);
		}
		else
		{
            $website=$this->input->post('website');
            $dob=$this->input->post('dob');
            $description=$this->input->post('description');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $pincode=$this->input->post('pincode');
			$password=$this->input->post('password');
			if($dob != "")
			{
				$dob = date("Y-m-d",strtotime($dob));
			}
			$accesslevel=$this->input->post('accesslevel');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');
			$phoneno=$this->input->post('phoneno');
			$google=$this->input->post('google');
			$state=$this->input->post('state');
			$country=$this->input->post('country');
			$status=$this->input->post('status');
			$facebookuserid=$this->input->post('facebookuserid');
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			if($this->user_model->create($firstname,$lastname,$dob,$password,$accesslevel,$email,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$phoneno,$google,$state,$country)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			
			$data['table']=$this->user_model->viewusers();
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
        $modelquery=$this->user_model->viewusers($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewusers/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
        
        
        
//		$data['table']=$this->user_model->viewusers();
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contact','contactno','trim');
		$this->form_validation->set_rules('phoneno','phoneno','trim');
		$this->form_validation->set_rules('google','google','trim');
		$this->form_validation->set_rules('state','state','trim');
		$this->form_validation->set_rules('country','country','trim');
		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('address','Address','trim|');
		$this->form_validation->set_rules('city','City','trim|max_length[30]');
		$this->form_validation->set_rules('pincode','Pincode','trim|max_length[20]');
        
		$this->form_validation->set_rules('fname','First Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('lname','Last Name','trim|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('status','Status','trim');
		$this->form_validation->set_rules('dob','DOB','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            $website=$this->input->post('website');
            $description=$this->input->post('description');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $pincode=$this->input->post('pincode');
			$id=$this->input->post('id');
			$password=$this->input->post('password');
			$dob=$this->input->post('dob');
			if($dob != "")
			{
				$dob = date("Y-m-d",strtotime($dob));
			}
			$accesslevel=$this->input->post('accesslevel');
			$contact=$this->input->post('contact');
			$phoneno=$this->input->post('phoneno');
			$google=$this->input->post('google');
			$state=$this->input->post('state');
			$country=$this->input->post('country');
			$status=$this->input->post('status');
			$facebookuserid=$this->input->post('facebookuserid');
			$fname=$this->input->post('fname');
			$lname=$this->input->post('lname');
			if($this->user_model->edit($id,$fname,$lname,$dob,$password,$accesslevel,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$phoneno,$google,$state,$country)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    
    
   // HOME START
    public function createhome()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createhome';
		$data[ 'title' ] = 'Create Home';
		$this->load->view( 'template', $data );	
	}
	function createhomesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','Title','trim');
		$this->form_validation->set_rules('description','Description','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createhome';
			$data['title']='Create Home';
			$this->load->view('template',$data);
		}
		else
		{
            $title=$this->input->post('title');
            $description=$this->input->post('description');
			 $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];         
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
				}
			} 
			if($this->home_model->create($title,$description,$image)==0)
			$data['alerterror']="New home could not be created.";
			else
			$data['alertsuccess']="Home created Successfully.";
			
//			$data['table']=$this->home_model->viewhome();
			$data['redirect']="site/viewhome";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewhome()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
        $modelquery=$this->home_model->viewhome($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewhome/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
        
        
        
//		$data['table']=$this->user_model->viewusers();
		$data['page']='viewhome';
		$data['title']='View home';
		$this->load->view('template',$data);
	}
    
	function edithome()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->home_model->beforeedit($this->input->get('id'));
		$before=$data['before'];
		$data['page']='edithome';
		$data['title']='Edit Home';
		$this->load->view('template',$data);
	}
	function edithomesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','Title','trim');
		$this->form_validation->set_rules('description','Description','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			
			$data['alerterror'] = validation_errors();
			$data['before']=$this->home_model->beforeedit($this->input->post('id'));
			$data['page']='edithome';
			$data['title']='Edit Home';
			$this->load->view('template',$data);
		}
		else
		{
			
			 $id=$this->input->get_post('id');
            $title=$this->input->post('title');
            $description=$this->input->post('description');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getimagebyid($id);
               // print_r($image);
                $image=$image->image;
				
            }
            
			if($this->home_model->edit($id,$title,$description,$image)==0)
			$data['alerterror']="Home Editing was unsuccesful";
			else
			$data['alertsuccess']="Home edited Successfully.";			
			$data['redirect']="site/viewhome";
//			$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deletehome()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->home_model->deletehome($this->input->get('id'));
//		$data['table']=$this->home_model->viewhome();
		$data['alertsuccess']="Home Deleted Successfully";
	    $data['redirect']="site/viewhome";
        $this->load->view("redirect",$data);
	}
    
    
    ////HOME END
	
	//RELATED VIDEO START
	
	 public function createrelatedvideos()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['videoid']=$this->relatedvideos_model->getvideosdropdown();
		 $data['relatedvideoid']=$this->relatedvideos_model->getvideosdropdown();
		$data[ 'page' ] = 'createrelatedvideos';
		$data[ 'title' ] = 'Create Related Videos';
		$this->load->view( 'template', $data );	
	}
	function createrelatedvideossubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('videoid','Videoid','trim');
		$this->form_validation->set_rules('relatedvideoid','Relatedvideoid','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['videoid']=$this->relatedvideos_model->getvideosdropdown();
			$data['relatedvideoid']=$this->relatedvideos_model->getvideosdropdown();
			$data['page']='createrelatedvideos';
			$data['title']='Create Related Videos';
			$this->load->view('template',$data);
		}
		else
		{
            $videoid=$this->input->post('videoid');
            $relatedvideoid=$this->input->post('relatedvideoid');
			
			if($this->relatedvideos_model->create($videoid,$relatedvideoid)==0)
			$data['alerterror']="New related video could not be created.";
			else
			$data['alertsuccess']="Related video created Successfully.";
			
//			$data['table']=$this->home_model->viewhome();
			$data['redirect']="site/viewrelatedvideos";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewrelatedvideos()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
        $modelquery=$this->relatedvideos_model->viewrelatedvideos($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewrelatedvideos/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
		$data['page']='viewrelatedvideos';
		$data['title']='View Related Videos';
		$this->load->view('template',$data);
	}
    
	function editrelatedvideos()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['videoid']=$this->relatedvideos_model->getvideosdropdown();
		$data['relatedvideoid']=$this->relatedvideos_model->getvideosdropdown();
		$data['before']=$this->relatedvideos_model->beforeedit($this->input->get('id'));
		$before=$data['before'];
		$data['page']='editrelatedvideos';
		$data['title']='Edit Related Videos';
		$this->load->view('template',$data);
	}
	function editrelatedvideossubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('videoid','Videoid','trim');
		$this->form_validation->set_rules('relatedvideoid','Relatedvideoid','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['videoid']=$this->relatedvideos_model->getvideosdropdown();
			$data['relatedvideoid']=$this->relatedvideos_model->getvideosdropdown();
			$data['alerterror'] = validation_errors();
			$data['before']=$this->relatedvideos_model->beforeedit($this->input->post('id'));
			$data['page']='editrelatedvideos';
			$data['title']='Edit Related Videos';
			$this->load->view('template',$data);
		}
		else
		{
			
			 $id=$this->input->get_post('id');
			 $videoid=$this->input->get_post('videoid');
            $relatedvideoid=$this->input->post('relatedvideoid');
           
			if($this->relatedvideos_model->edit($id,$videoid,$relatedvideoid)==0)
			$data['alerterror']="Related Videos was unsuccesfully edited";
			else
			$data['alertsuccess']="Related Videos edited Successfully.";			
			$data['redirect']="site/viewrelatedvideos";
//			$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleterelatedvideos()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->relatedvideos_model->deleterelatedvideos($this->input->get('id'));
//		$data['table']=$this->home_model->viewhome();
		$data['alertsuccess']="Related videos deleted successfully";
	    $data['redirect']="site/viewrelatedvideos";
        $this->load->view("redirect",$data);
	}
    
	//RELATED VIDEO END
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    /*-----------------User/Organizer Finctions added by avinash for frontend APIs---------------*/
    public function update()
	{
        $id=$this->input->get('id');
        $firstname=$this->input->get('firstname');
        $lastname=$this->input->get('lastname');
        $password=$this->input->get('password');
        $password=md5($password);
        $email=$this->input->get('email');
        $website=$this->input->get('website');
        $description=$this->input->get('description');
        $eventinfo=$this->input->get('eventinfo');
        $contact=$this->input->get('contact');
        $address=$this->input->get('address');
        $city=$this->input->get('city');
        $pincode=$this->input->get('pincode');
        $dob=$this->input->get('dob');
       // $accesslevel=$this->input->get('accesslevel');
        $accesslevel=2;
        $timestamp=$this->input->get('timestamp');
        $facebookuserid=$this->input->get('facebookuserid');
        $newsletterstatus=$this->input->get('newsletterstatus');
        $status=$this->input->get('status');
        $logo=$this->input->get('logo');
        $showwebsite=$this->input->get('showwebsite');
        $eventsheld=$this->input->get('eventsheld');
        $topeventlocation=$this->input->get('topeventlocation');
        $data['json']=$this->user_model->update($id,$firstname,$lastname,$password,$email,$website,$description,$eventinfo,$contact,$address,$city,$pincode,$dob,$accesslevel,$timestamp,$facebookuserid,$newsletterstatus,$status,$logo,$showwebsite,$eventsheld,$topeventlocation);
        print_r($data);
		//$this->load->view('json',$data);
	}
	public function finduser()
	{
        $data['json']=$this->user_model->viewall();
        print_r($data);
		//$this->load->view('json',$data);
	}
    public function findoneuser()
	{
        $id=$this->input->get('id');
        $data['json']=$this->user_model->viewone($id);
        print_r($data);
		//$this->load->view('json',$data);
	}
    public function deleteoneuser()
	{
        $id=$this->input->get('id');
        $data['json']=$this->user_model->deleteone($id);
		//$this->load->view('json',$data);
	}
    public function login()
    {
        $email=$this->input->get("email");
        $password=$this->input->get("password");
        $data['json']=$this->user_model->login($email,$password);
        //$this->load->view('json',$data);
    }
    public function authenticate()
    {
        $data['json']=$this->user_model->authenticate();
        //$this->load->view('json',$data);
    }
    public function signup()
    {
        $email=$this->input->get_post("email");
        $password=$this->input->get_post("password");
        $data['json']=$this->user_model->signup($email,$password);
        //$this->load->view('json',$data);
        
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $data['json']=true;
        //$this->load->view('json',$data);
    }
    
    
    
    /*-----------------End of User functions----------------------------------*/
    
    
    
	//category
    
	function viewcategory()
	{
		$access = array("1");
		$this->checkaccess($access); 
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
        $modelquery=$this->category_model->viewcategory($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewcategory/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
        
        
//		$data['table']=$this->category_model->viewcategory();
		$data['page']='viewcategory';
		$data['title']='View category';
		$this->load->view('template',$data);
	}
	public function createcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createcategory';
		$data[ 'title' ] = 'Create category';
		$this->load->view( 'template', $data );	
	}
   
	function createcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('parent','parent','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['category']=$this->category_model->getcategorydropdown();
			$data[ 'page' ] = 'createcategory';
			$data[ 'title' ] = 'Create category';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$parent=$this->input->post('parent');
			if($this->category_model->createcategory($name,$parent)==0)
			$data['alerterror']="New category could not be created.";
			else
			$data['alertsuccess']="category  created Successfully.";
//			$data['table']=$this->category_model->viewcategory();
			$data['redirect']="site/viewcategory";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->category_model->beforeeditcategory($this->input->get('id'));
        $data['category']=$this->category_model->getcategorydropdown();
		$data['page']='editcategory';
		$data['title']='Edit category';
		$this->load->view('template',$data);
	}
	function editcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('parent','parent','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->category_model->beforeeditcategory($this->input->post('id'));
            $data['category']=$this->category_model->getcategorydropdown();
			$data['page']='editcategory';
			$data['title']='Edit category';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$parent=$this->input->post('parent');
			
			if($this->category_model->editcategory($id,$name,$parent)==0)
			$data['alerterror']="category Editing was unsuccesful";
			else
			$data['alertsuccess']="category edited Successfully.";
            $data['redirect']="site/viewcategory";
			$this->load->view("redirect",$data);
		}
	}
   
	function deletecategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->category_model->deletecategory($this->input->get('id'));
//		$data['table']=$this->category_model->viewcategory();
		$data['alertsuccess']="category Deleted Successfully";
        $data['redirect']="site/viewcategory";
        $this->load->view("redirect",$data);
//		$data['page']='viewcategory';
//		$data['title']='View category';
//		$this->load->view('template',$data);
	}
	
	
    
     //email
    
    public function sendmail()
    {
        $email=$this->input->get('email');
        $this->load->library('email');
        //$email='patiljagruti181@gmail.com,jagruti@wohlig.com';
        $this->email->from('avinash@wohlig.com', 'For Any Information');
        $this->email->to($email);
        $this->email->subject('Email Test');
        $this->email->message('Email From For Any Information');

        $this->email->send();

        echo $this->email->print_debugger();
    }
    
    public function sendemail()
    {
        $userid=$this->input->get('userid');
        $listingid=$this->input->get('listingid');
        $user=$this->user_model->getallinfoofuser($userid);
//        print_r($user);
        $touser=$user->email;
        $listing=$this->listing_model->getallinfooflisting($listingid);
//        print_r($user);
        $tolisting= $listing->email;
        $listingname= $listing->name;
        $listingaddress= $listing->address;
        $listingstate= $listing->state;
        $listingcontactno= $listing->contactno;
        $listingemail= $listing->email;
        $listingyearofestablishment= $listing->yearofestablishment;
        $usermsg="<h3>All Details Of Listing</h3><br>Listing Name:'$listingname' <br>Listing address:'$listingaddress' <br>Listing state:'$listingstate' <br>Listing contactno:'$listingcontactno' <br>Listing email:'$listingemail' <br>Listing yearofestablishment:'$listingyearofestablishment' <br>";
//        echo $msg;
        //to user
        $this->load->library('email');
        $this->email->from('avinash@wohlig.com', 'For Any Information To User');
        $this->email->to($touser);
        $this->email->subject('Listing Details');
        $this->email->message($usermsg);

        $this->email->send();
        
        //to listing
        $firstname=$user->firstname;
        $lastname=$user->lastname;
        $email=$user->email;
        $contact=$user->contact;
        $listingmsg="<h3>All Details Of user</h3><br>user Name:'$firstname' <br>user Last Name:'$lastname' <br>user Email:'$email' <br>user contact:'$contact'";
        
        $this->load->library('email');
        $this->email->from('avinash@wohlig.com', 'For Any Information Listing');
        $this->email->to($tolisting);
        $this->email->subject('User Details');
        $this->email->message($listingmsg);

        $this->email->send();

        echo $this->email->print_debugger();
    }
    
    //video
    
	function viewvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
//        $config['per_page'] = 20; 
        $modelquery=$this->video_model->viewvideo($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewvideo/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
		$data['page']='viewvideo';
		$data['title']='View video';
		$this->load->view('template',$data);
	}
    
	public function createvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'category' ] =$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createvideo';
		$data[ 'title' ] = 'Create video';
		$this->load->view( 'template', $data );	
	}
    
	function createvideosubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('location','location','trim');
		$this->form_validation->set_rules('lat','lat','trim');
		$this->form_validation->set_rules('long','long','trim');
		$this->form_validation->set_rules('rating','rating','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
		$this->form_validation->set_rules('category','category','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$access = array("1");
            $this->checkaccess($access);
            $data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'category' ] =$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createvideo';
            $data[ 'title' ] = 'Create video';
            $this->load->view( 'template', $data );		
		}
		else
		{
            $user=$this->input->post('user');
            $title=$this->input->post('title');
            $description=$this->input->post('description');
            $location=$this->input->post('location');
            $lat=$this->input->post('lat');
            $long=$this->input->post('long');
            $rating=$this->input->post('rating');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            $category=$this->input->post('category');
			if($this->video_model->createvideo($user,$title,$description,$location,$lat,$long,$rating,$videourl,$status,$category)==0)
			$data['alerterror']="New video could not be created.";
			else
			$data['alertsuccess']="video created Successfully.";
			
//			$data['table']=$this->video_model->viewvideo();
			$data['redirect']="site/viewvideo";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function editvideo()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'user' ] =$this->user_model->getuserdropdown();
        $data[ 'status' ] =$this->user_model->getstatusdropdown();
        $data[ 'category' ] =$this->category_model->getcategorydropdown();
		$data['before']=$this->video_model->beforeedit($this->input->get('id'));
		$data['page']='editvideo';
		$data['title']='Edit video';
		$this->load->view('template',$data);
	}
	function editvideosubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('user','user','trim|required');
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('location','location','trim');
		$this->form_validation->set_rules('lat','lat','trim');
		$this->form_validation->set_rules('long','long','trim');
		$this->form_validation->set_rules('rating','rating','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
		$this->form_validation->set_rules('category','category','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'user' ] =$this->user_model->getuserdropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'category' ] =$this->category_model->getcategorydropdown();
            $data['before']=$this->video_model->beforeedit($this->input->get('id'));
            $data['page']='editvideo';
            $data['title']='Edit video';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $user=$this->input->post('user');
            $title=$this->input->post('title');
            $description=$this->input->post('description');
            $location=$this->input->post('location');
            $lat=$this->input->post('lat');
            $long=$this->input->post('long');
            $rating=$this->input->post('rating');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            $category=$this->input->post('category');
            
			if($this->video_model->editvideo($id,$user,$title,$description,$location,$lat,$long,$rating,$videourl,$status,$category)==0)
			$data['alerterror']="video Editing was unsuccesful";
			else
			$data['alertsuccess']="video edited Successfully.";
			
			$data['redirect']="site/viewvideo";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletevideo()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->video_model->deletevideo($this->input->get('id'));
//		$data['table']=$this->video_model->viewvideo();
		$data['alertsuccess']="video Deleted Successfully";
		$data['redirect']="site/viewvideo";
		$this->load->view("redirect",$data);
	}
    
    
    //videotag
    
	function viewvideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
//        $config['per_page'] = 20;
		$modelquery=$this->videotag_model->viewvideotag($pagestart,$this->config->item("per_page"));
//        $modelquery=$this->video_model->viewvideo($pagestart,$config['per_page']);
        
        $config['base_url'] = site_url().'/site/viewvideotag/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
        
        
		$data['page']='viewvideotag';
		$data['title']='View videotag';
		$this->load->view('template',$data);
	}
    
	public function createvideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
		$data[ 'page' ] = 'createvideotag';
		$data[ 'title' ] = 'Create videotag';
		$this->load->view( 'template', $data );	
	}
    
	function createvideotagsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('tag','tag','trim|required');
		
		if($this->form_validation->run() == FALSE)	
		{
			$access = array("1");
            $this->checkaccess($access);
            $data[ 'video' ] =$this->video_model->getvideodropdown();
            $data[ 'page' ] = 'createvideotag';
            $data[ 'title' ] = 'Create videotag';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $video=$this->input->post('video');
            $tag=$this->input->post('tag');
			if($this->videotag_model->createvideotag($video,$tag)==0)
			$data['alerterror']="New videotag could not be created.";
			else
			$data['alertsuccess']="videotag created Successfully.";
			
//			$data['table']=$this->videotag_model->viewvideotag();
			$data['redirect']="site/viewvideotag";
			$this->load->view("redirect",$data);
		}
	}
    
    function editvideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
		$data['before']=$this->videotag_model->beforeedit($this->input->get('id'));
		$data['page']='editvideotag';
		$data['title']='Edit videotag';
		$this->load->view('template',$data);
	}
	function editvideotagsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('tag','tag','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'video' ] =$this->video_model->getvideodropdown();
            $data['before']=$this->videotag_model->beforeedit($this->input->get('id'));
            $data['page']='editvideotag';
            $data['title']='Edit videotag';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $video=$this->input->post('video');
            $tag=$this->input->post('tag');
            
			if($this->videotag_model->editvideotag($id,$video,$tag)==0)
			$data['alerterror']="videotag Editing was unsuccesful";
			else
			$data['alertsuccess']="videotag edited Successfully.";
			
			$data['redirect']="site/viewvideotag";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletevideotag()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->videotag_model->deletevideotag($this->input->get('id'));
//		$data['table']=$this->videotag_model->viewvideotag();
		$data['alertsuccess']="videotag Deleted Successfully";
		$data['redirect']="site/viewvideotag";
		$this->load->view("redirect",$data);
	}
    
    
    
    //videopart
    
	function viewvideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
        $pagestart = $this->uri->segment(3, 0);        
        if($pagestart=="")
        {
            $pagestart=0;
        }
       
        $modelquery=$this->videopart_model->viewvideopart($pagestart,$this->config->item("per_page"));
        
        $config['base_url'] = site_url().'/site/viewvideopart/';
        $config['total_rows'] = $modelquery->totalcount;
        
        $this->pagination->initialize($config); 
		$data['table']=$modelquery->query;
		$data['page']='viewvideopart';
		$data['title']='View videopart';
		
        
        $this->load->view('template',$data);
	}
    
	public function createvideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'page' ] = 'createvideopart';
		$data[ 'title' ] = 'Create videopart';
		$this->load->view( 'template', $data );	
	}
    
	function createvideopartsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('part','part','trim');
		$this->form_validation->set_rules('question','question','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$access = array("1");
            $this->checkaccess($access);
            $data[ 'video' ] =$this->video_model->getvideodropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'page' ] = 'createvideopart';
            $data[ 'title' ] = 'Create videopart';
            $this->load->view( 'template', $data );		
		}
		else
		{
            $video=$this->input->post('video');
            $part=$this->input->post('part');
            $question=$this->input->post('question');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            echo $videourl;
			if($this->videopart_model->createvideopart($video,$part,$question,$videourl,$status)==0)
			$data['alerterror']="New videopart could not be created.";
			else
			$data['alertsuccess']="videopart created Successfully.";
			
			$data['table']=$this->videopart_model->viewvideopart();
			$data['redirect']="site/viewvideopart";
			$this->load->view("redirect",$data);
		}
	}
    
    function editvideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data[ 'video' ] =$this->video_model->getvideodropdown();
        $data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['before']=$this->videopart_model->beforeedit($this->input->get('id'));
		$data['page']='editvideopart';
		$data['title']='Edit videopart';
		$this->load->view('template',$data);
	}
	function editvideopartsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('video','video','trim|required');
		$this->form_validation->set_rules('part','part','trim');
		$this->form_validation->set_rules('question','question','trim');
		$this->form_validation->set_rules('videourl','videourl','trim');
		$this->form_validation->set_rules('status','status','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'video' ] =$this->video_model->getvideodropdown();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data['before']=$this->videopart_model->beforeedit($this->input->get('id'));
            $data['page']='editvideopart';
            $data['title']='Edit videopart';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
            $video=$this->input->post('video');
            $part=$this->input->post('part');
            $question=$this->input->post('question');
            $videourl=$this->input->post('videourl');
            $status=$this->input->post('status');
            
			if($this->videopart_model->editvideopart($id,$video,$part,$question,$videourl,$status)==0)
			$data['alerterror']="videopart Editing was unsuccesful";
			else
			$data['alertsuccess']="videopart edited Successfully.";
			
			$data['redirect']="site/viewvideopart";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletevideopart()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->videopart_model->deletevideopart($this->input->get('id'));
//		$data['table']=$this->videopart_model->viewvideopart();
		$data['alertsuccess']="videopart Deleted Successfully";
        $data['redirect']="site/viewvideopart";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
//		$data['page']='viewvideopart';
//		$data['title']='View videopart';
//		$this->load->view('template',$data);
	}
    
    
}
?>