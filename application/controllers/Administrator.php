<?php 
	class Administrator extends CI_Controller{

	public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
	   $this->load->model('Administrator_Model');
	   $this->load->model('Payment_Model');
	   $this->load->model('Service_Model');
    }
	

		public function view($page = 'index'){
			if($this->session->userdata('login')) {
    			redirect('administrator/dashboard');
   			}

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function home($page = 'home'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/admin-leftbar');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

		public function dashboard($page = 'dashboard'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			
		   if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			$data['title'] = ucfirst($page);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['total_user']= $this->Administrator_Model->total_user();
			//echo "<pre>"; print_r($data['total_user']); die;
			$data['total_resume']= $this->Administrator_Model->total_apply_job();
			
			$data['service']= $this->Service_Model->get_services();
			$data['appointment']= $this->Administrator_Model->get_appointment();
			$data['pending_orders'] = $this->Service_Model->pending_orders();
			$data['completed_orders'] = $this->Service_Model->completed_orders();
			$data['order_placed'] = $this->Service_Model->order_placed();
			$data['sale_reports'] = $this->Service_Model->get_sale_reports();
			$data['ordersReportsCse'] = $this->Service_Model->get_sale_reports_cse(); // Fetch Only CSE Sales particular	 
			$data['users'] = $this->Service_Model->get_user_list();
			$data['country'] = $this->Administrator_Model->fetch_country();
			$data['total_sale'] = $this->Administrator_Model->total_sale();
			
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			
		   if($this->session->userdata('role_id')==1){
				$this->load->view('administrator/admin-leftbar');
				$this->load->view('administrator/'.$page, $data);
           }
           if($this->session->userdata('role_id')==2){
				$this->load->view('administrator/customer-support-leftbar');
				$this->load->view('administrator/customer-support-admin-dashboard',$data);
           }
           if($this->session->userdata('role_id')==3){
				$this->load->view('administrator/franchise-leftbar');
				$this->load->view('administrator/franchise-dashbaord',$data);
           }
           if($this->session->userdata('role_id')==4){
				$completed_sales = '5';
				$pending_sales = '1';
				$data['completed_sales'] = $this->Service_Model->get_orders($completed_sales);
				$data['pending_sales'] = $this->Service_Model->get_orders($pending_sales);
				$data['team_member'] = $this->Administrator_Model->team_member();
				//echo "<pre>"; print_r($data['team_member']); die;
				$this->load->view('administrator/customer-support-executive-leftbar');
				$this->load->view('administrator/customer-support-executive-dashbaord',$data);
           }
		  $this->load->view('administrator/footer');
		}

	 

	  // Log in Admin
		public function adminLogin(){
			$data['title'] = 'Admin Login';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				//$data['title'] = ucfirst($page);
				$this->load->view('administrator/header-script');
				//$this->load->view('administrator/header');
				//$this->load->view('administrator/header-bottom');
				$this->load->view('administrator/index', $data);
				$this->load->view('administrator/footer');
			}else{
				// get email and Encrypt Password
				$email = $this->input->post('email');
				$encrypt_password = md5($this->input->post('password'));

				$user_id = $this->Administrator_Model->adminLogin($email, $encrypt_password);
				$sitelogo = $this->Administrator_Model->update_siteconfiguration(1);

				if ($user_id) {
					//Create Session
					$get_role=$this->Administrator_Model->get_user_role($user_id->role_id);
					$user_data = array(
								'user_id' => $user_id->id,
				 				'username' => $user_id->username,
				 				'email' => $user_id->email,
				 				'login' => true,
				 				'role_id' => $get_role[0]['role_id'],
				 				'role' => $get_role[0]['role_name'],
				 			    'site_logo' => $sitelogo['logo_img']
				 	);

					$this->session->set_userdata($user_data);

					//Set Message
					$this->session->set_flashdata('success', 'Welcome to administrator Dashboard.');
					redirect('administrator/dashboard');
				}else{
					$this->session->set_flashdata('danger', 'Login Credential in invalid!');
					redirect('administrator/index');
				}
				
			}
		}

				// log admin out
		public function logout(){
			// unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('image');
			$this->session->unset_userdata('site_logo');

			//Set Message
			$this->session->set_flashdata('success', 'You are logged out.');
			redirect(base_url().'administrator/index');
		}

		public function forget_password($page = 'forget-password'){
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
				show_404();
			}
			$data['title'] = ucfirst($page);
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/'.$page, $data);
			$this->load->view('administrator/footer');
		}

      /*********User Profile ***************************/


		public function add_user_profile($page = 'add-user-profile'){
			
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create User';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['roles'] = $this->Administrator_Model->get_role();
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/users';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				$password = md5($this->input->post('password'));
				$this->Administrator_Model->add_user($post_image,$password);

				//Set Message
				$this->session->set_flashdata('success', 'User has been created Successfull.');
				redirect('administrator/users');
			}
			
		}

      /************ End here ***********************/
		/********** Add New User *************************/
		public function add_user($page = 'add-user'){
			//echo "<pre>"; print_r($this->session->userdata('role_id')); die;
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Create User';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			if($this->session->userdata('role_id')==1){
				$data['roles'] = $this->Administrator_Model->get_role();
				$data['franchise_role'] = $this->Administrator_Model->get_franchise();
				//echo "<pre>"; print_r($data['franchise_role']); die;
			}
			if($this->session->userdata('role_id')==2){
				$data['franchise_role'] = $this->Administrator_Model->get_franchise();
				$data['roles'] = $this->Administrator_Model->get_role_Sadmin();
			}
			$this->form_validation->set_rules('role', 'Role', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
			

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//echo "<pre>"; print_r($_POST); die;
					$this->Administrator_Model->add_user();

				//Set Message
				$this->session->set_flashdata('success', 'User has been created Successfull.');
				redirect('administrator/users');
			}
			
		}

	/****************** end heer *************************/
		

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

		public function users(){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Latest Users';
			if($this->session->userdata('role_id')==1){
				$data['roles'] = $this->Administrator_Model->get_role();
			}
			if($this->session->userdata('role_id')==2){
				$data['roles'] = $this->Administrator_Model->get_role_Sadmin();
			}
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['users'] = $this->Administrator_Model->get_users();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/users', $data);
			$this->load->view('administrator/footer');
		}

		public function delete(){
			
			$id =$this->input->post('userid');
			$this->Administrator_Model->user_delete($id);        
			echo 1;
		}

		public function enable($id){
			$table = base64_decode($this->input->get('table'));
			$this->Administrator_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Desabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id){
			$table = base64_decode($this->input->get('table'));
			$this->Administrator_Model->desable($id,$table);       
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}

		public function update_user($id = NULL){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['user'] = $this->Administrator_Model->get_user($id);
			
			if (empty($data['user'])) {
				show_404();
			}
			$data['title'] = 'Update User';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/update-user', $data);
			$this->load->view('administrator/footer');
		}

		public function view_user($id = NULL){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['viewuser'] = $this->Administrator_Model->get_user($id);
			if (empty($data['user'])) {
				show_404();
			}
			$data['title'] = 'View User';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		 $this->load->view('administrator/view-user-profile', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_user_data($page = 'update-user'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			$data['title'] = 'Update User';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				$this->Administrator_Model->update_user_data();
				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/users');
			}
			
		}

		public function multipleImageUpload($images,$dataID){
		$images == $_FILES['imgFiles'];
        $data = array();
        if(!empty($_FILES['imgFiles']['name'])){
            $filesCount = count($_FILES['imgFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['imgFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['imgFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['imgFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['imgFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['imgFiles']['size'][$i];

                $uploadPath = './assets/images/products_multiple/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                     $uploadData[$i]['product_id'] = $dataID;
                   /* $uploadData[$i]['created'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['modified'] = date("Y-m-d H:i:s");*/
                }
            }
            
            if(!empty($uploadData)){
                //Insert file information into the database
                $insert = $this->Administrator_Model->insertproductsmultipleImages($uploadData);
                return $insert;
               /* $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('success',$statusMsg);*/
            }
        }
    }
		


		//Site configuration
		public function get_siteconfiguration($page = 'site-configuration'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}

			$data['siteconfiguration'] = $this->Administrator_Model->get_siteconfiguration();

			$data['title'] = 'Site Configuration';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		$this->load->view('administrator/update-site-configuration', $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_siteconfiguration($id = NULL){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['siteconfiguration'] = $this->Administrator_Model->update_siteconfiguration($id);
			$data['title'] = 'Update Configuration';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		$this->load->view('administrator/update-site-configuration', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_siteconfiguration_data($page = 'update-site-configuration'){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }

			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			
			$data['title'] = 'Update Configuration';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('site_title', 'Site Title', 'required');
			$this->form_validation->set_rules('site_name', 'Site Name', 'required');
			
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{

				//Upload Image
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					$data['logo_imgs'] = $this->Administrator_Model->update_siteconfiguration($this->input->post('id'));
					$post_image = $data['logo_imgs']['logo_img'];
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}
				
				 $this->Administrator_Model->update_siteconfiguration_data($post_image);
				//Set Message
				$this->session->set_flashdata('success', 'site configuration Details has been Updated Successfull.');
				redirect('administrator/site-configuration/update/1');
			}
		}



		// pages content details start
		public function get_pagecontents($page = 'page-contents'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    	show_404();
		   	}
            $UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['pagecontents'] = $this->Administrator_Model->get_pagecontents();
			$data['title'] = 'List pages contents';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header', $UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		$this->load->view('administrator/'.$page, $data);
	  		$this->load->view('administrator/footer');
		}

		public function update_pagecontents($id = NULL){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['pagecontents'] = $this->Administrator_Model->update_pagecontents($id);
			$data['title'] = 'Update page contents';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		$this->load->view('administrator/update-page-contents', $data);
	  		$this->load->view('administrator/footer');
		}


		public function update_pagecontents_data($page = 'update-page-contents'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Update Page contents Details';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('page_name', 'Page Name', 'required');
			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				
				 $this->Administrator_Model->update_pagecontents_data();
				
				$this->session->set_flashdata('success', 'Page Contents Details has been Updated Successfull.');
				redirect('administrator/page-contents');
			}
		}


		

		public function get_admin_data(){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['changePassword'] = $this->Administrator_Model->get_admin_data();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['title'] = 'Change Password';
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		 $this->load->view('administrator/change-password', $data);
	  		$this->load->view('administrator/footer');
		}

		public function change_password($page = 'change-password'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			$data['title'] = 'Change password';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
			$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
				$this->Administrator_Model->change_password($this->input->post('new_password'));

				//Set Message
				$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
				redirect('administrator/change-password');
			}
			
		}
		// Check user name exists
		public function match_old_password($old_password){
			
			$this->form_validation->set_message('match_old_password', 'Current Password Does not matched, Please Try Again.');
			$password = md5($old_password);
			$que = $this->Administrator_Model->match_old_password($password);
			if ($que) {
				return true; 
			}else{
				return false;
			}
		}

		

		public function update_profile($page = 'update-profile'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			$data['title'] = 'Update Profile';
			$data['user'] = $this->Administrator_Model->update_profile();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['country'] = $this->Administrator_Model->fetch_country();
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/update-profile', $data);
		  		 $this->load->view('administrator/footer');
			}else{
				//Upload Image
				
				if($_FILES['userfile']['name']!=''){

					$config['upload_path'] = './assets/images/users';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '1000000';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
               
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						$post_image = 'noimage.jpg';
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$post_image = $_FILES['userfile']['name'];
					}
				}
				else{
					$post_image = $this->input->post('old_userfile');
				}
				

				$this->Administrator_Model->update_user_profile_data($post_image);

				//Set Message
				$this->session->set_flashdata('success', 'User has been Updated Successfull.');
				redirect('administrator/update-profile');
			}
			
		}


		//forget password functions start
		public function forget_password_mail(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

			//check if email is in the database
		$this->load->model('Administrator_Model');
		if($this->Administrator_Model->email_exists()){
			//$them_pass is the varible to be sent to the user's email
			$temp_pass = md5(uniqid());
			//send email with #temp_pass as a link
			$this->load->library('email', array('mailtype'=>'html'));
			$this->email->from('admin1234567@gmail.com', "Site");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Reset your Password");

			$message = "<p>This email has been sent as a request to reset our password</p>";
			$message .= "<p><a href='".base_url()."administrator/reset-password/$temp_pass'>Click here </a>if you want to reset your password,
						if not, then ignore</p>";
			$this->email->message($message);

			if($this->email->send()){
				$this->load->model('Administrator_Model');
				if($this->Administrator_Model->temp_reset_password($temp_pass)){
					echo "check your email for instructions, thank you";
				}
			}
			else{
				echo "email was not sent, please contact your administrator";
			}

		}else{
			echo "your email is not in our database";
		}
		}
		public function reset_password($temp_pass){
			$this->load->model('Administrator_Model');
			if($this->Administrator_Model->is_temp_pass_valid($temp_pass)){

				$this->load->view('reset-password');
			   //once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...

			}else{
				echo "the key is not valid";    
			}

		}
		public function update_password(){
			$this->load->library('form_validation');
				$this->form_validation->set_rules('password', 'Password', 'required|trim');
				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
					if($this->form_validation->run()){
					echo "passwords match";
					}else{
					echo "passwords do not match";  
					}
		}

		/* Servives Section Start Here*/

		public function add_services($page = 'add-services'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Add Services';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('name', 'Service Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
			   	$this->load->view('administrator/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/services';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					$uploaded_image = 'noimage.png';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->create_services($uploaded_image);

				//Set Message
				$this->session->set_flashdata('success', 'Service has been created.');
				redirect('administrator/services/view-service');
			}
			
		}



		public function list_services($offset = 0){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			//echo "<pre>"; print_r("here"); die;
			// Pagination Config
			$config['base_url'] = base_url(). 'administrator/team/';
			$config['total_rows'] = $this->db->count_all('services');
			//$config['per_page'] = 12;
			//$config['uri_segment'] = 12;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Services';
			$data['services'] = $this->Administrator_Model->listservice(FALSE);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/list-services', $data);
			$this->load->view('administrator/footer');
		}

		public function update_service($id){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Edit Services';
			$data['service'] = $this->Administrator_Model->listservice($id);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('name', 'Service Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
			   	$this->load->view('administrator/edit-service', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/services';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					$uploaded_image = $this->input->post('old-image-service');
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image = $_FILES['userfile']['name'];
				}
				$this->Administrator_Model->update_service_data($uploaded_image);
			    //Set Message
			    $this->session->set_flashdata('success', 'Services Updated Successfully.');
			    redirect('administrator/services/view-service');
			}
		}


/* Servives Section End Here*/




/* Jobs Section Start Here*/

		public function add_jobs($page = 'add-jobs'){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Add Jobs';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('job_name', 'Job Title', 'required');
			$this->form_validation->set_rules('job_description', 'Description', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
			   	$this->load->view('administrator/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image
				if($_FILES['userfile']['name']!=''){

					$config['upload_path'] = './assets/images/jobs';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '100000';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
               
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						$post_image = 'noimage.jpg';
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$post_image = $_FILES['userfile']['name'];
					}
				}
				$this->Administrator_Model->create_jobs($post_image);
				$this->session->set_flashdata('success', 'Job has been created Successfully.');
				redirect('administrator/jobslist');
			}
			
		}


/* Jobs Section End Here*/

		public function fetch_state(){
			  if($this->input->post('country_id'))
			  {
			   echo $this->Administrator_Model->fetch_state($this->input->post('country_id'));
			  }
			 }

		
		public function fetch_city()
			 {
			  if($this->input->post('state_id'))
			  {
			   echo $this->Administrator_Model->fetch_city($this->input->post('state_id'));
			  }
			 }	 

	/************** Ajax ************************/

	function change_role(){
	 $result = $this->Administrator_Model->change_role();
	 $this->session->set_flashdata('success', 'Role has been changed Successfully.');
	 echo $result;
	}


	function change_request_role(){
		$Role = $this->input->post('roles');
		$UserId = $this->input->post('userid');
		$frenchid = $this->input->post('frenchid');
	 $result = $this->Administrator_Model->change_request_role();
	 $this->session->set_flashdata('success', 'Role has been changed Successfully.');
	 echo $result;
	}
	/********** end here ****************/

	public function viewprofile($id = NULL){
	if(empty($this->session->userdata('user_id'))){
		redirect('administrator/index');
	}

	$data['user'] = $this->Administrator_Model->viewprofile($id);
		if (empty($data['user'])) {
			show_404();
		}
		$data['title'] = 'View User';
		$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
		$data['roles'] = $this->Administrator_Model->get_role();
		$this->load->view('administrator/header-script');
		 $this->load->view('administrator/header',$UserProfileImage);
		if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
		if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
		if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
		if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
		$this->load->view('administrator/'.$left_bar);
		 $this->load->view('administrator/view-user', $data);
		$this->load->view('administrator/footer');
	}


	
	public function assign_franchise(){

				//if($this->input->post('resume_id')){
				$this->Administrator_Model->fetch_franchise_model();
				$this->session->set_flashdata('success', 'Resumed Assigned.');
				//}
				//redirect('administrator/dashboard');

	}

	public function assignResume(){
				$resume_id = $this->input->post('resume_id');
				$status = $this->Administrator_Model->assign_resume($resume_id);
				if($status){
				echo 1;
				$this->session->set_flashdata('assignResume', 'Resume assigned to franchise successfully.');
				}

	}

	public function assign_cse(){
	
		$this->Administrator_Model->fetch_cse_model();
		$this->session->set_flashdata('success', 'Resumed Assigned to Customer Support Executive.');
	}

	public function change_status(){
				$this->Administrator_Model->change_status();
				$this->session->set_flashdata('success', 'Status Changed.');	
	}



	public function requeststatus(){
		//echo "<pre>"; print_r("Here"); die;
		$user_id = $this->input->post('id');
		$this->Administrator_Model->requeststatus();
		//echo "<pre>"; print_r($user_id); die;
	}

	public function request_to_fe(){
		$user_id = $this->input->post('id');
		$frenchise_id = $this->input->post('frenchise_id');
		$this->Administrator_Model->requesttofe();
	}

	public function request_to_sa(){
		$user_id = $this->input->post('id');
		$frenchise_id = $this->input->post('frenchise_id');
		$this->Administrator_Model->RequesttoSA();
	}


	public function cserequest(){
		if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Request to Franchise';
			$data['users'] = $this->Administrator_Model->cserequest();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/cserequestlist', $data);
			$this->load->view('administrator/footer');
	}


	public function cselist(){
		if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Request to Franchise';
			if($this->session->userdata('role_id')==1){
				$data['roles'] = $this->Administrator_Model->get_request_role();
			}
			$data['users'] = $this->Administrator_Model->cselist();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/cselist', $data);
			$this->load->view('administrator/footer');
	}

	public function getrequests(){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Request to Franchise';
			if($this->session->userdata('role_id')==1){
				$data['roles'] = $this->Administrator_Model->get_request_role();
			}
			$data['users'] = $this->Administrator_Model->getrequest();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/requestlist', $data);
			$this->load->view('administrator/footer');
		}



	public function get_resumes(){
	if(empty($this->session->userdata('user_id'))){
		redirect('administrator/index');
	}
		$data['resume_job'] = $this->Jobs_Model->get_all_resumes();
		if (empty($data['resume_job'])) {
			show_404();
		}
		$data['postData'] = $_POST;
		$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
		$data['title'] = 'List of Jobs Resume Report';
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/report-jobs-resume', $data);
			$this->load->view('administrator/footer');

	}

	public function accept_franchise(){
		$resume_id = $this->input->post('resume_id');
		$user_id = $this->input->post('user_id');
		$result = $this->Administrator_Model->accept_resume($resume_id,$user_id);
		if($result){
			echo 1;
			$this->session->set_flashdata('acceptFranchise', 'Resume has been accepted successfully.');
		}
		
	}


	public function reject_franchise($id){
		$this->Administrator_Model->reject_resume($id);
		$this->session->set_flashdata('success', 'Resumed Rejected.');
		redirect('administrator/resume');
		
	}


	public function getmessages(){
	if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
		$data['message_list'] = $this->Administrator_Model->get_all_messages();
		$data['title'] = 'List of Messages List';
		$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header',$UserProfileImage);
		if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
		if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
		if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
		if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
		$this->load->view('administrator/'.$left_bar);
		$this->load->view('administrator/messages-list', $data);
		$this->load->view('administrator/footer');
	}


	public function update_message($id){
        if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['title'] = 'Edit Messages';
			$data['messages'] = $this->Administrator_Model->listmessage($id);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('message', 'Message Name', 'required');			

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
			   	$this->load->view('administrator/edit-message', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				//Upload Image				
				$this->Administrator_Model->update_message_data($id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Messages Updated Successfully.');
			    redirect('administrator/getmessages');
			}
	}


	public function deletemessage($id)
		{
			$table = base64_decode($this->input->get('table'));	
			//echo "<pre>"; print_r($table); die;		
			$this->Administrator_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}


public function jobslist($offset = 0){
	if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			//echo "<pre>"; print_r("here"); die;
			// Pagination Config
			//$config['base_url'] = base_url(). 'administrator/team/';
			$config['total_rows'] = $this->db->count_all('services');
			//$config['per_page'] = 12;
			//$config['uri_segment'] = 12;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Jobs';
			$data['jobs'] = $this->Administrator_Model->listjobs(FALSE);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			//echo "<pre>"; print_r($data['jobs']); die;
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/list-jobs', $data);
			$this->load->view('administrator/footer');
		}

		public function deletejob(){
			$id =$this->input->post('userid');
			$this->Administrator_Model->delete_job($id);
			echo 1;   			
		}


		/************Delete Service ***************/

		public function deleteservice(){
			$id =$this->input->post('userid');
			$this->Administrator_Model->delete_service($id);
			echo 1;   			
		}


		
		/**************** Edit User Information *********/
		public function edituser($id = NULL,$page = 'edit-user'){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			if (!file_exists(APPPATH.'views/administrator/'.$page.'.php')) {
		    show_404();
		   }
			$data['title'] = 'Edit User';
			$data['editUser'] = $this->Administrator_Model->edit_user_info($id);
			//echo "<pre>"; print_r($data['editUser']); die;
			$data['roles'] = $this->Administrator_Model->get_role(); //Get Roles
			$data['franchise_role'] = $this->Administrator_Model->get_franchise(); // Get Franchise
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
			

			if($this->form_validation->run() === FALSE){
				 $this->load->view('administrator/header-script');
		 	 	 $this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
		   		 $this->load->view('administrator/'.$page, $data);
		  		 $this->load->view('administrator/footer');
			}else{
					$this->Administrator_Model->edit_user($id);

				//Set Message
				$this->session->set_flashdata('success', 'User has been updated Successfull.');
				redirect('administrator/users/viewusers');
			}
			
		}


		public function viewcontact(){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['title'] = 'List Contacts';
			$data['contact_list'] = $this->Administrator_Model->listcontacts(FALSE);
			//echo "<pre>"; print_r($data['contact_list']); die;
			$data['assign_franchise'] = $this->Administrator_Model->get_user_franchise(FALSE);
			$data['assign_cse'] = $this->Administrator_Model->get_user_cse(FALSE);
			$data['country'] = $this->Administrator_Model->fetch_country();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/list-contacts', $data);
			$this->load->view('administrator/footer');
		}

		public function contactview($id = NULL){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['contact_view'] = $this->Administrator_Model->contactview($id);
			$data['title'] = 'View Contact';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/view-contact', $data);
			$this->load->view('administrator/footer');
		}



	public function assignContact(){
		$contact_id = $this->input->post('message_id');
		$status = $this->Administrator_Model->assign_contact($contact_id);
		if($status){ echo 1; }
	}

	public function assign_message_cse(){
	
		$this->Administrator_Model->assign_message_cse();
		$this->session->set_flashdata('success', 'Service Enquiry Assigned to Customer Support Executive.');
	}


	public function accept_message_franchise(){
		$message_id = $this->input->post('message_id');
		$user_id = $this->input->post('user_id');
		$result = $this->Administrator_Model->accept_message_franchise($message_id,$user_id);
		if($result){  echo 1; }
	}
	

	public function reject_message_franchise($id){
		$this->Administrator_Model->reject_message_franchise($id);
		$this->session->set_flashdata('success', 'Contact Rejected.');
		redirect('administrator/viewcontact');
		
	}


	public function assignecontact(){
			//echo "I am here"; die;
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['title'] = 'View Assigned Contacts';
			$data['assigne_contact'] = $this->Administrator_Model->listAssigneContact(FALSE);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/assign-contact', $data);
			$this->load->view('administrator/footer');
	}


	public function contact_cse_status(){
		$status = $this->input->post('status');
		$contact_id = $this->input->post('contact_id');
		$this->Administrator_Model->contact_cse_status($status, $contact_id);
		$this->session->set_flashdata('success', 'Customer support executive '.$status);
    
	}


	public function resume_status(){
		$status = $this->input->post('status');
		$resume_id = $this->input->post('resume_id');
		$user_id = $this->input->post('user_id');
		$this->Administrator_Model->resume_status($status, $resume_id, $user_id);
		$this->session->set_flashdata('success', 'Franchise executive status is '.$status);
    	
	}

	public function update_job($id){
			// Check login
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['title'] = 'Edit Job';

			$data['editjobs'] = $this->Administrator_Model->listjob($id);
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			
			$this->form_validation->set_rules('job_name', 'Job Name', 'required');
			$this->form_validation->set_rules('keyskills', 'KeySkills', 'required');
				
			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header',$UserProfileImage);
				if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
				if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
				if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
				if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
				$this->load->view('administrator/'.$left_bar);
			   	$this->load->view('administrator/edit-job', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				
				if($_FILES['userfile']['name']!=''){

					$config['upload_path'] = './assets/images/jobs';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '100000';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
               
					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('userfile')){
						$errors =  array('error' => $this->upload->display_errors());
						
					}else{
						$data =  array('upload_data' => $this->upload->data());
						$post_image = $_FILES['userfile']['name'];
					}
				}else{
					$post_image = $this->input->post('old_job_image');
				}
				
				$this->Administrator_Model->update_job_data($post_image);
			   
			    $this->session->set_flashdata('success', 'Job Updated Successfully.');
			    redirect('administrator/jobs/view-jobs');
			}
		}
		public function user_enabled_disabled(){
		   
		  $result =$this->Administrator_Model->user_enabled_disabled(); 
		  if($result){ echo 1;}
		} 
		
		public function CreateAppointment(){
			//echo "<pre>"; print_r($_POST); die;
			//echo "<pre>"; print_r("I am in the function"); die;
		  $result =$this->Administrator_Model->CreateAppointment(); 
		  if($result){ echo 1;
			$this->session->set_flashdata('success', 'Appointment has been created successfully.');
		  }
		} 


		/*public function testapp(){
			echo "<pre>"; print_r("I am in the function"); die;
		} */

		public function deleteAppointment(){
		  $result =$this->Administrator_Model->deleteAppointment(); 
		  if($result){ echo 1;
			$this->session->set_flashdata('success', 'Appointment has been deleted successfully.');
		  }
		}
		
		public function editAppointment($id = NULL){
			$id = $this->input->post('appointment_id');	
			$result = $this->Administrator_Model->edit_appointment_info($id);
			echo json_encode($result);
		}

		public function UpdateAppointment(){
			
			$result = $this->Administrator_Model->update_appointment_data();
			if($result){
				echo 1;
			}
			
		}    
		
		public function team_member_user(){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['title'] = 'Team Member';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$data['users'] = $this->Administrator_Model->team_member();
			//echo "<pre>"; print_r($data['users']); die;
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/team-member', $data);
			$this->load->view('administrator/footer');
		}
		/************** notification_counter ***************/
		 public function get_notification(){
			 echo $data['get_notification'] = $this->Administrator_Model->total_admin_notifications(); 
		}
		public function read_notification(){
		  $result =$this->Administrator_Model->read_notification(); 
		  if($result){ echo 1;}
		}
		

		public function appointment(){
			if(empty($this->session->userdata('user_id'))){
				redirect('administrator/index');
			}
			$data['appointment']= $this->Administrator_Model->get_appointment();
			//echo "<pre>"; print_r($data['appointment']); die;
			$data['title'] = 'appointment';
			$data['service']= $this->Service_Model->get_services();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
	 	 	$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
	   		 $this->load->view('administrator/appointment', $data);
	  		$this->load->view('administrator/footer');
		}	
		/****** End here**************************/

	}
	




