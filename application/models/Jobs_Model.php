<?php
	class Jobs_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_jobs(){
			$this->db->order_by("job_id", "ASC");
			//$this->db->where('service_id', $id);
			$query = $this->db->get('jobs');
			return $query->result_array();
		}

		public function get_jobs_list($id){
			$id = base64_decode($id);
			//$this->db->order_by("job_id", "ASC");
			$this->db->where('service_id', $id);
			$query = $this->db->get('jobs');
			return $query->result_array();
		}


		public function get_jobs_lists($id){
			$id = base64_decode($id);
			//$this->db->order_by("job_id", "ASC");
			$this->db->where('service_id', $id);
			$query = $this->db->get('jobs');
			return $query->row_array();
		}

		public function get_services(){
			$this->db->select('COUNT(jobs.service_id) as totalcount,services.id,services.name');
			 $this->db->group_by('services.id'); 
			$this->db->from('services');
			$this->db->join('jobs', 'services.id = jobs.service_id','left');
			$query = $this->db->get();
			return $getdata = $query->result_array();
		}





		public function all_jobs(){

			/*$this->db->select('*');
			$this->db->from('services');
			$this->db->join('jobs', 'services.id = jobs.service_name');
			$this->db->where('services.id', 'jobs.service_name');

			$query = $this->db->get();*/

			$service_name = $this->db->query("SELECT `id` FROM services")->result_array();

			 $this->db->where('job_id',1);
			$query = $this->db->get('jobs');
			return $query->num_rows();
			/*$query = $this->db->query("SELECT * FROM jobs");
			return $query->num_rows();*/ 
		}


		public function count_jobs($id){
			echo $id;
			die();
		}
		public function create_jobs($uploaded_image,$uploaded_image2,$id){
			$id = base64_decode($id);
			$job_id = $this->uri->segment(4);
			$jobid = base64_decode($job_id);
			//echo "<pre>"; print_r($jobid); die;
			$job_data = array(
							'job_id' => $jobid, 							 
							'service_id' => $id, 							 
							'title' => $this->input->post('title'), 							 
							'full_name' => $this->input->post('full_name'), 							 
							'address' => $this->input->post('address'),
							'country' => $this->input->post('country'), 							 
														 
							'city' => $this->input->post('city'), 							 
							'pincode' => $this->input->post('pincode'), 							 
							'email' => $this->input->post('email'), 							 
							'phone' => $this->input->post('phone'), 							 
							'job_title' => $this->input->post('job_title'), 							 
							'start_date' => $this->input->post('start_date'), 							 
							'image' => $uploaded_image, 							 
							'image2' => $uploaded_image2,
												 
							'hear_about_us' => $this->input->post('hear_about_us'),
							'created_at' => date("Y-m-d H:i:s")
						  );
			
						 $this->db->insert('apply_job', $job_data);
						 $resume_id = $this->db->insert_id();

						$this->db->select('apply_job.title,serve.name as servicename');
						 $this->db->join('services as serve', 'apply_job.service_id = serve.id');
						$query = $this->db->where('apply_job.id',$resume_id)->get('apply_job');
						$resumes = $query->row_array();
						//echo "<pre>"; print_r($resumes); die;
						$message = 'New resume has been uploaded for <b>'.$resumes['servicename'].'</b>'; 	
						$notification_data = array(				
							'to_id' => '1',
							'resume_id' => $resume_id,
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
						 );


				return $this->db->insert('notification_message', $notification_data);
					}

			
		public function listjobResume(){
			/*if($this->session->userdata('role_id')==1){

			 $this->db->select('t1.*, t2.name as Service_name,t3.username,t4.name as city_name, adminuser.username as assignedby');
	     	 $this->db->from('apply_job as t1');
		     //$this->db->where('t1.id', $id);
		     $this->db->join('services as t2', 't1.service_id = t2.id', 'LEFT');
		     $this->db->join('users as t3', 't1.french_id = t3.id', 'LEFT');
		     $this->db->join('users as adminuser', 't1.user_id = adminuser.id', 'LEFT');
		     $this->db->join('cities as t4', 't1.city = t4.id', 'LEFT');
		     $query = $this->db->get();	
		     
			return $query->result_array();
			}elseif($this->session->userdata('role_id')==3){
			$id = $this->session->userdata('user_id');
			
			$this->db->select('t1.*, t2.name as Service_name,t3.username,t4.name as city_name, adminuser.username as assignedby');
	     	 $this->db->from('apply_job as t1');
			$this->db->where('t1.french_id', $id);
		     
		     $this->db->join('services as t2', 't1.service_id = t2.id', 'LEFT');
		     $this->db->join('users as t3', 't1.french_id = t3.id', 'LEFT');
		     $this->db->join('users as adminuser', 't1.user_id = adminuser.id', 'LEFT');
		     $this->db->join('cities as t4', 't1.city = t4.id', 'LEFT');
		     $query = $this->db->get();
		     return $query->result_array();	
			}*/
            $id = $this->session->userdata('user_id');
			$this->db->select('t1.*, t2.name as Service_name,t3.username, adminuser.username as assignedby,t5.username as cse_assigned');
	     	$this->db->order_by('t1.id','desc');
	     	$this->db->from('apply_job as t1');
	     	if($this->session->userdata('role_id')==3){ $this->db->where('t1.french_id', $id); }
	     	if($this->session->userdata('role_id')==4){ $this->db->where('t1.cse_id', $id); }
			$this->db->join('services as t2', 't1.service_id = t2.id', 'LEFT');
		    $this->db->join('users as t3', 't1.french_id = t3.id', 'LEFT');
		    $this->db->join('users as t5', 't1.cse_id = t5.id', 'LEFT');
		    $this->db->join('users as adminuser', 't1.user_id = adminuser.id', 'LEFT');
		    //$this->db->join('cities as t4', 't1.city = t4.id', 'LEFT');
		    $query = $this->db->get();
		    return $query->result_array();	
		}



		public function listAssigneResume(){
			$this->db->select('apply_job.*,users.username as assignedby,frenchuser.username as french_user,cities.name as city_name,services.name as Service_name,cseuser.username as cse_user');
			$this->db->from('apply_job');
			$this->db->join('services', 'apply_job.service_id = services.id', 'LEFT');
			$this->db->join('users', 'apply_job.user_id = users.id', 'LEFT');
			$this->db->join('users as frenchuser', 'apply_job.french_id = frenchuser.id', 'LEFT');
			$this->db->join('users as cseuser', 'apply_job.cse_id = cseuser.id', 'LEFT');
			$this->db->join('cities', 'apply_job.city = cities.id', 'LEFT');
			$query = $this->db->get();	
			$data = $query->result_array();

			return $query->result_array();
		
		}



		
		public function viewresume($id){
			$vid = base64_decode($id);

		 $this->db->select('t1.*, t2.name as Service_name,t3.username,adminuser.username as assignedby');
	     $this->db->from('apply_job as t1');
	     $this->db->where('t1.id', $vid);
	     $this->db->join('services as t2', 't1.service_id = t2.id', 'LEFT');
	     $this->db->join('users as t3', 't1.french_id = t3.id', 'LEFT');
	     $this->db->join('users as adminuser', 't1.user_id = adminuser.id', 'LEFT');
		 //$this->db->join('cities as t4', 't1.city = t4.id', 'LEFT');
	     $query = $this->db->get();
	     return $query->row_array();

		}			


		public function delete($id,$table)
		{
			//$id = base64_decode($id);
			//echo "Here"; die;
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
		}

		

		public function get_job_title(){
			$jobid = $this->uri->segment(4);
			$job_id = base64_decode($jobid);
			$this->db->where('job_id',$job_id);
			$query =  $this->db->get('jobs');
			return $query->row_array();
		}

		public function get_requruitment(){
			//$jobid = $this->uri->segment(4);
			//$job_id = base64_decode($jobid);
			$this->db->where('id',12);
			$query =  $this->db->get('services');
			return $query->row_array();
		}			

		public function get_business_consultation(){
			//$jobid = $this->uri->segment(4);
			//$job_id = base64_decode($jobid);
			$this->db->where('id',11);
			$query =  $this->db->get('services');
			return $query->row_array();
		}

		public function get_all_resumes(){
			$FromDate = $this->input->post('fromDate');
			$ToDate = $this->input->post('toDate');
			$Status= $this->input->post('Rcategory');

			//if(!empty($Status)){  if($Status!='all') { $statusdata = ' and status='.$Status; }else{$statusdata='';} }
			if(!empty($Status)){  if($Status!='all') { $statusdata = ' and franch_status="'.$Status.'"'; }else{$statusdata='';} }
			if(!empty($FromDate) && !empty($ToDate)){
				$dataCheck = "and start_date  between  '".$FromDate."' AND  '".$ToDate."'";
			}else{
				$dataCheck = '';
			}
			
			$Sql ="select * from apply_job where 1=1 ".$statusdata.$dataCheck;
			//echo "<pre>"; print_r($Sql); die;
			$query = $this->db->query($Sql);
			return $query->result_array();
		}
		/****************** Get Service on Apply Form Page where job count greater than zero***********/
		public function get_services_on_applyForm(){
			$this->db->select('COUNT(jobs.service_id) as totalcount,services.id,services.name');
			$this->db->group_by('services.id'); 
			$this->db->having('totalcount > 0'); 
			$this->db->from('services');
			$this->db->join('jobs', 'services.id = jobs.service_id','left');
			$query = $this->db->get();
			return $getdata = $query->result_array();
			
		}
		/***********************************/

	}