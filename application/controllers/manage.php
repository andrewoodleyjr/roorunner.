<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage
 *
 * @author GOI LLC
 */
require_once ('check.php');
class manage extends check{

    private $form_errors = '';
	private $message = '';
	
    public function __construct() {
        parent::__construct();
    }
    
    public function faq(){
        
        try{
        
           $menuArray = array();
           $menu = '<li><a href="/manage/" style="color:">Home</a></li>
              <li ><a href="/setting/">Settings</a></li>
              <li class="active"><a href="/manage/faq">Help</a></li>
              <li><a href="/main/logout">Sign Out</a></li>';
           $menuArray['menu'] = $menu;
           $header = array();
              $header['stylesheets'] = '<link href="/scripts/css/faq.css" rel="stylesheet" media="all" type="text/css" />';
              $header['title'] = 'Shwcase Connect &middot; FAQs';
              $this->load->model('model_faq');
              
              
           $this->load->view('header', $header);
           $this->load->view('menu', $menuArray);
           $this->load->view('main/faq', $this->model_faq->getYoutubePlayList());
           $this->load->view('footer');
           
        }
        catch(Exception $e){
            $this->error($e->getMessage());
        }
    }   
	public $App_ID;

    public function App_Process(){
		
		$this->load->library('general_library');
        $gl = new general_library();
        $this->App_ID = $gl->getUserAppID($this->session_data);	
		$App_ID= $this->App_ID;
		
		
		//We will then check if the user has started creating their app. 
		//And show them to where ever they left off. 
		//Steps 1 - 7 by going to the database first...
		  
		$this->db->where('App_ID', $App_ID);
        $query_users = $this->db->get('applications');					  
		 
			if($query_users->num_rows != 1):
               
          		else: 
					foreach ($query_users->result() as $row)
					{
					   $submitted = $row->approved;
					}    
			endif;
			
		
		if($submitted == 0):
			 $this->load->helper('url');
             redirect('/process/start/', 'refresh');
		endif;
	}
    
    public function index(){
		
		    
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			 $home['tasks'] = $this->model_page_entertainment->getEventTable($this->session_data);
              

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/home', $home);
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    }
	
	public function task($id){
		
		    
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			 $home['tasks'] = $this->model_page_entertainment->getDetails($id,$this->session_data);
              

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/task', $home);
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    }
	
	
	public function jobs(){
		
		    
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			 $home['tasks'] = $this->model_page_entertainment->getJobs($this->session_data);
              

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/jobs', $home);
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
}

public function accept($id){
	
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			  $value = $this->model_page_entertainment->accept($id,$this->session_data);
              
			
              if($value):
						/*$this->load->model('model_apps');
			 			$value2 = $this->model_apps->sendAccept($id,$this->session_data);

					   if($value2):
					   
							$this->load->helper('url');
							redirect('/manage/', 'refresh');
							return true;
					   
					   else:*/

						   $this->load->helper('url');
						   redirect('/manage/', 'refresh');
						   return false;
					   
					   //endif;
					   
					   
			  else:
              			$this->load->helper('url');
                       redirect('/manage/', 'refresh');
                       return false;
			endif;
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
}

public function past(){
		
		    
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			 $home['tasks'] = $this->model_page_entertainment->getPastJobs($this->session_data);
              

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/past', $home);
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
}

public function cancel(){
		
		    
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			 $home['tasks'] = $this->model_page_entertainment->getPastJobs($this->session_data);
              

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/past', $home);
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
}

public function delete($id){
		
		    
        try{
              $home = array('name' => $this->session_data['name']);
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
			  
			  $this->load->model('model_page_entertainment');
                   
			 $value = $this->model_page_entertainment->delete($id,$this->session_data);
              
			  if($value):
			  			$this->load->helper('url');
                       redirect('/manage/', 'refresh');
                       return false;
			  else:
              			$this->load->helper('url');
                       redirect('/manage/', 'refresh');
                       return false;
			endif;
			
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
}
	
	
	
	public function updatetask($id)
    {
       try
       {
           $post = $this->input->post();
           if(isset($post['submit'])):
               if((!isset($post['title'])) || (!isset($post['reward'])) || (!isset($post['description'])) || (!isset($post['location']))):
                   $this->form_errors = "Fill out all information.";
				   return false;
				   $this->update();
			
                   
                   
                   else:
                   
				   $this->load->model('model_users');
				   $valid = $this->model_users->update($id,$this->session_data);
                   
				   //Checks is user information is valid
                   if($valid):
	
					   $this->load->helper('url');
                       redirect('/manage/', 'refresh');
                       return false;
                       else:
                           $this->form_errors = "An Error Occured Please Try Again";
                           $this->update();
                           return false;
					
                   endif;
               endif;
               else:
               $this->update();
               return true;
           endif;
       }
       catch(Exception $e)
       {
            $this->error($e->getMessage());
       }
    }
	
	public function create(){
		
		    
        try{
              
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
              
			  $errors = $this->form_errors;
              if($errors != ''):
                  $errors['description'] = $this->form_errors['description'];
				  $errors['title2'] = $this->form_errors['title'];
				  $errors['location'] = $this->form_errors['location'];
				  $errors['reward'] = $this->form_errors['reward'];
				  $errors['error'] = "<div class='alert alert-danger'>Please Fill Out All Fields</div>";
				  
              endif;
			  //var_dump($errors);
              $login = array('error' => $errors);

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/create', $login);
              //$this->load->view('footer');
			  
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    }
	
	public function profile(){
		
		    
        try{
              
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              $header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
              $profile_section_info = array();
			  
			  $this->load->model('model_users');
			  $profile_section_info['info'] = $this->model_users->getUserInformation($this->session_data['userid']);
			  $profile_section_info['trust'] = $this->model_users->getUserTrustPoints($this->session_data['userid']);
			  $profile_section_info['reward'] = $this->model_users->getUserRewardPoints($this->session_data['userid']);
			  //var_dump($profile_section_info);
              //$login = array('error' => $errors);

              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/profile', $profile_section_info);
              //$this->load->view('footer');
			  
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    }
	
	public function createtask()
    {
       try
       {
           $post = $this->input->post();
           if(isset($post['submit'])):
		   	
               if((strlen($post['title']) <= 0) || (strlen($post['reward']) <= 0) || (strlen($post['description']) <= 0) || (strlen($post['location']) <= 0)):
			   
			   	   
				   
                   $this->form_errors = $post;
				   
				   //var_dump($this->form_errors);
				   $this->create();
					return false;
                   
                   else:
                   
				   //var_dump('inside else');
				   $this->load->model('model_users');
                   
				   $valid = $this->model_users->create($this->session_data);
                   
				   //Checks is user information is valid
                   if($valid):
	
					   $this->load->helper('url');
                       redirect('/manage/', 'refresh');
                       return false;
                       else:
                           $this->form_errors = "An Error Occured Please Try Again";
                           $this->create();
                           return false;
					
                   endif;
               endif;
               else:
               $this->create();
               return true;
           endif;
       }
       catch(Exception $e)
       {
            $this->error($e->getMessage());
       }
    }
	
public function completeduser($id){
		
		    
        try{
              $home = array();
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              //$header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
              $this->load->model('model_apps');
               
			   //$home['info'] = $this->model_apps->sendEmailsuser($id,$this->session_data); 
			
	
              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/sendmessage/'.$id.'');
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    
    
    
}	
	
public function update($id){
		
		    
        try{
              $home = array();
              $header['stylesheets'] = '<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,700|Open+Sans+Condensed:300,700" rel="stylesheet" /><script src="js/jquery.min.js"></script>
		<script src="/js/config.js"></script>
		<script src="/js/skel.min.js"></script>
		<script src="/js/skel-panels.min.js"></script>
		<link rel="stylesheet" href="/css/skel-noscript.css" />
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-desktop.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/js/html5shiv.js"></script><link rel="stylesheet" href="/css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="/css/ie7.css" /><![endif]-->';
              //$header['title'] = 'FestRunner &middot; Member';
              $menuArray = array();
              $this->load->model('model_page_entertainment');
               
			   $home['info'] = $this->model_page_entertainment->getData($id,$this->session_data); 
			
	
              $this->load->view('header', $header);
              //$this->load->view('menu', $menuArray);
              $this->load->view('main/update', $home);
              //$this->load->view('footer');
        }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    }
   public function UpdateProfile(){
		
		    
        try{
              
               $this->load->model('model_users');
			   $success= $this->model_users->updateUserProfile($this->session_data); 
			
				if($success):
					  $this->profile();
					  $this->message = "Your information has been updated.";
				else:
					  var_dump($this->form_errors);
					  //$this->profile();
				
				endif;
	
              
     }
    catch(Exception $e){
        $this->error("Error loading the page.");
    }
    }
    
    
 
    
}



?>