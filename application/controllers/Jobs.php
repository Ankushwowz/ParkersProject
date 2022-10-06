<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
	public function index(){
		
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		$data['services'] = $this->Jobs_Model->get_services_on_applyForm();
		$data['jobs'] = $this->Jobs_Model->get_jobs();
		$data['job_count']= $this->Jobs_Model->all_jobs();
		$this->load->view('templates/header',$data);
		$this->load->view('pages/apply-jobs');
	  	$this->load->view('templates/footer');
	}


	public function business_consultation(){
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		$data['services'] = $this->Jobs_Model->get_services();
		$data['get_business_consultation'] = $this->Jobs_Model->get_business_consultation();
		$data['jobs'] = $this->Jobs_Model->get_jobs();
		$data['job_count']= $this->Jobs_Model->all_jobs();
		$this->load->view('templates/header',$data);
		$this->load->view('pages/business-consultation');
	  	$this->load->view('templates/footer');
	}


	public function jobslist($id = NULL){
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		$data['jobs'] = $this->Jobs_Model->get_jobs_list($id);
		$data['services'] = $this->Jobs_Model->get_services_on_applyForm();
		$this->load->view('templates/header',$data);
		$this->load->view('pages/joblist',$data);
	  	$this->load->view('templates/footer');
	}


	public function apply_form($id = NULL){
		
		if(!empty($_FILES['userfile'])){
			$ext = pathinfo($_FILES['userfile']["name"]);
			$fileName = rand().'-'.time().'.'.$ext['extension'];
			$_FILES['userfile']["name"]= $fileName;
			
		}
		if(!empty($_FILES['userfile2'])){
			$ext1 = pathinfo($_FILES['userfile2']["name"]);
			$fileName1 = rand().'-'.time().'.'.$ext1['extension'];
			$_FILES['userfile2']["name"]= $fileName1;
		}
		$data['services'] = $this->Jobs_Model->get_services_on_applyForm();
		$data['jobid'] = $this->uri->segment(4);
		$job_id = base64_decode($this->uri->segment(4));
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		$data['id'] = $id;
		$data['jobsName'] = $this->Jobs_Model->get_job_title();
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('pincode', 'Job Title', 'required');
		$this->form_validation->set_rules('email', 'Address', 'required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('pages/apply-jobs-form',$data);
	  		$this->load->view('templates/footer');			   	
		}else{
			//Upload Image
			
				$config['upload_path'] = './assets/images/jobs';
				$config['allowed_types'] = 'docx|doc|DOC|DOCX|pdf|PDF|jepg|png|jpg';
				$config['max_size'] = '2048000';
				//$config['max_width'] = '20000';
				//$config['max_height'] = '20000';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('userfile')){
					$errors =  array('error' => $this->upload->display_errors());
					$uploaded_image = $errors;
					
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image = $_FILES['userfile']['name'];
				}
				if(!$this->upload->do_upload('userfile2')){
					$errors =  array('error' => $this->upload->display_errors());
					$uploaded_image2 = $errors;
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image2 = $_FILES['userfile2']['name'];
				}
				$this->Jobs_Model->create_jobs($uploaded_image,$uploaded_image2,$id);

				//Set Message
				$this->session->set_flashdata('success', 'You have applied for '.$this->input->post('job_title'));
				redirect('jobs');
		}
		
		
	}

	/*public function create($id =  NULL){
		
 
		$data['title'] = 'Add Jobs';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			//$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');			
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('pincode', 'Job Title', 'required');
			$this->form_validation->set_rules('email', 'Address', 'required');
			//$this->form_validation->set_rules('email', 'Address', 'required');

			if($this->form_validation->run() === FALSE){
				$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
				$this->load->view('templates/header',$data);
				$this->load->view('pages/apply-jobs-form',$data);
	  			$this->load->view('templates/footer');			   	
			}else{
				//Upload Image
				$config['upload_path'] = './assets/images/jobs';
				$config['allowed_types'] = 'doc|docx|pdf';
				$config['max_size'] = '20048';
				$config['max_width'] = '20000';
				$config['max_height'] = '20000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors =  array('error' => $this->upload->display_errors());
					$uploaded_image = '';
					$uploaded_image2 = '';
				}else{
					$data =  array('upload_data' => $this->upload->data());
					$uploaded_image = $_FILES['userfile']['name'];
					$uploaded_image2 = $_FILES['userfile2']['name'];
				}
				$this->Jobs_Model->create_jobs($uploaded_image,$uploaded_image2,$id);

				//Set Message
				$this->session->set_flashdata('success', 'You have applied for '.$this->input->post('job_title'));
				redirect('jobs');
			}
	}*/



	public function listresume(){
		if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
		 	$data['title'] = 'List of Jobs Resume';
			$data['resume_job'] = $this->Jobs_Model->listjobResume(FALSE);
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
			$this->load->view('administrator/list-jobs-resume', $data);
			$this->load->view('administrator/footer');
	}


	public function resumereport(){
		if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
		 	$data['title'] = 'List of Jobs Resume Report';
		 	if(!empty($_POST)){
		 			 $data['resume_job'] = $this->Jobs_Model->get_all_resumes();
		 			  $data['postData'] = $_POST;
		 	}
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
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


	public function viewresume($id = NULL){
		if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['view_resume'] = $this->Jobs_Model->viewresume($id);
			$data['title'] = 'View Resume';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/view-resume', $data);
			$this->load->view('administrator/footer');
	}
	


	public function deleteresume($id){
			$table = base64_decode($this->input->get('table'));	
			$this->Jobs_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}


		public function assigneresume(){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['resume_job'] = $this->Jobs_Model->listAssigneResume(FALSE);
			$data['title'] = 'View Resume';
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/assign-resume', $data);
			$this->load->view('administrator/footer');
		}

		public function viewjob($id = NULL){
			$data['viewjob'] = $this->Jobs_Model->get_jobs_lists($id);
			$data['services'] = $this->Jobs_Model->get_services_on_applyForm();
			$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
			$data['title'] = 'View Job';
			$this->load->view('templates/header',$data);
			$this->load->view('pages/view-job', $data);
			$this->load->view('templates/footer');
		}

}
