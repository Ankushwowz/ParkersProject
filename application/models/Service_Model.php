<?php
	class Service_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_services(){
			$this->db->order_by("id", "ASC");
			$query = $this->db->get('services');
			return $query->result_array();
		}

      public function get_aboutus(){
			//$this->db->order_by("id", "ASC");
			$query = $this->db->get_where('page_content', array('id' => 1));
			return $query->row_array();
			//$query = $this->db->get('services');
			//return $query->result_array();
		}

		

		public function delete_post($id)
		{
			$image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
			$cwd = getcwd(); // save the current working directory
			$image_file_path = $cwd."\\assets\\images\\posts\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // Restore the previous working directory
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}

		
		public function view_service($id = FALSE)
		{
			$id = base64_decode($id);
			$query = $this->db->get_where('services', array('id' => $id));
			return $query->row_array();		
		}


		public function delete($id,$table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
		}
		
/******* Add form of service*******************/
	public function addform(){
		
	
		$id = base64_decode($this->input->post('service_id'));
		$data = array(
						'form_data' => json_encode($this->input->post('form_data')),
						'preview_data' => json_encode($this->input->post('preview_data')),
					);
						
		$this->db->where('id', $id);
		return $this->db->update('services', $data);
	}
	public function get_service()
		{
			$id = base64_decode($this->uri->segment(3));
			$query = $this->db->get_where('services', array('id' => $id));
			return $query->row_array();	
		
		}
  /******************** end here *********************************/
		public function service_list(){
			$query = $this->db->get('services');
			return $query->result_array();
		}
		function random_password() 
		{
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$password = array(); 
			$alpha_length = strlen($alphabet) - 1; 
			for ($i = 0; $i < 8; $i++) 
			{
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
			}
			return implode($password); 
		}
		public function sale_service(){
			
			$Post_Array =  array();
			$Post_Array =  $_POST;
			$Post_Array['Title'] =  $this->input->post('Title');
			$Post_Array['Name'] =  $this->input->post('Name');
			$Post_Array['Occupation'] =  $this->input->post('Occupation');
			$Post_Array['Company_Name'] =  $this->input->post('Company_Name');
			$Post_Array['Address'] =  $this->input->post('Address');
			$Post_Array['Telephone'] =  $this->input->post('Telephone');
			$Post_Array['Email'] =  $this->input->post('Email');
			
			/*********Digital marketing Form*************/
			$Post_Array['Website_Address'] =  $this->input->post('Website_Address');
			/********** End here *****************************/
			/************ SMO Form *************************/
			$Post_Array['Company_Website'] =  $this->input->post('Company_Website');
			$Post_Array['Set-up_Cost'] =  $this->input->post('Set-up_Cost');
			$Post_Array['Smo_monthly_management_Charge'] =  $this->input->post('Smo_monthly_management_Charge');
			/********** End here *****************************/
		
			/************ Website design Form *************************/
			$Post_Array['Complete_Website_Cost'] =  $this->input->post('Complete_Website_Cost');
			$Post_Array['Maintenance_Charge'] =  $this->input->post('Maintenance_Charge');
			/********** End here *****************************/
			/******************Graphic Design Form******************/
			$Post_Array['Graphic_Design'] =  $this->input->post('Graphic_Design');

			/********************* SEO Form *************************/
			$Post_Array['SEO_Monthly_Cost'] =  $this->input->post('SEO_Monthly_Cost');
			
			$Post_Array['Service_Amount'] =  $this->input->post('Service_Amount');
			$Post_Array['Agreement_length'] =  $this->input->post('Agreement_length');
			$Post_Array['Deposit'] =  $this->input->post('Deposit');
			$Post_Array['Date'] =  $this->input->post('Date');
			$Post_Array['Comment'] =  $this->input->post('Comment');
			$Post_Array['serviceid'] =  $this->input->post('serviceid');
			$country = $this->input->post('country');
			$state = $this->input->post('state');
			
		
			unset($Post_Array['submit']);
			unset($Post_Array['base_url']);
			unset($Post_Array['country']);
			unset($Post_Array['state']);
			
			
			if(!empty($_FILES['image']['name'])){
				$filesCount = count($_FILES['image']['name']);
				for($i = 0; $i < $filesCount; $i++){
					
					$_FILES['userFile']['name'] = $_FILES['image']['name'][$i];
					$_FILES['userFile']['type'] = $_FILES['image']['type'][$i];
					$_FILES['userFile']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
					$_FILES['userFile']['error'] = $_FILES['image']['error'][$i];
					$_FILES['userFile']['size'] = $_FILES['image']['size'][$i];

					$uploadPath = './assets/images/orderfiles/';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = 'gif|jpg|png|docx|pdf|xlsx';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('userFile')){
					 $fileData = $this->upload->data();
					 $uploadData[$i]['file_name'] = $fileData['file_name'];
					}else{
						$errors =  array('error' => $this->upload->display_errors());
					}
				}	
			}
			 if(!empty($uploadData)){
				 $uploadData = $uploadData;
			 }else{
				 $uploadData ='';
			 }
			$password = $this->random_password();
			$userData = array(
			'email' => $this->input->post('Email'), 
			'username' => $this->input->post('Name'), 
			'country' => $country,
			'state' => $state,
			'password' => md5($password), 
			'plain_password' => $password, 
			'role_id' => 6,
			'register_date' => date("Y-m-d H:i:s")
			);
			
			$this->db->where('email',$this->input->post('Email'));
			$result = $this->db->get('users');
            $usercheck = $result->num_rows();
			if ($usercheck == 1) {
				$getdata = $result->row_array();
				$user_id = $getdata['id'];
			}else{
				$this->db->insert('users', $userData);
				$user_id = $this->db->insert_id();
				$profile_data = array(
							'user_id' => $user_id,
							'first_name' => $this->input->post('Name'),
							'created_date' => date("Y-m-d H:i:s")

						  );
			    $this->db->insert('user_profile', $profile_data);
				
			}
			
			
			
			
			$data = array(
							'service_id' => $this->input->post('serviceid'),
							'client_id' => $user_id,
							'country' => $country,
							'state' => $state,
							'created_by' => $this->session->userdata('user_id'),
							'order_data' => json_encode($Post_Array),
							'order_upload_data' => json_encode($uploadData),
							'created_at' => date("Y-m-d H:i:s")
							);
			$this->db->insert('orders', $data);
			$order_id = $this->db->insert_id();
			
			
			//ASSIGN franchise_id ON ASSIGN table//
			$get_user_role = $this->session->userdata('role_id');
			if($get_user_role==4){
				$this->db->select('franchise_id')->where('id',$this->session->userdata('user_id'));
			    $result_franchise = $this->db->get('users');
				$franchise_User= $result_franchise->row_array();
				if(!empty($franchise_User['franchise_id'])){
					
					$dataAssign = array(
							'order_ID' => $order_id ,
							'assigned_By' => '',
							'assigned_To' => $franchise_User['franchise_id'],
							'cse_id' => $this->session->userdata('user_id'),
							'created_date' => date("Y-m-d H:i:s")
							);
		
					     $this->db->insert('assign_sale', $dataAssign);
					}
					
				}
			
			//
			return  $order_id;
			
		}
		public function get_orders($order_Status){
			$CSEUserArray = array();
			if($this->session->userdata('role_id')==3){
				 $query = $this->db->select('id')->where('franchise_id',$this->session->userdata('user_id'))->get('users');
			     $GetUserData = $query->result_array();
			}
			foreach( $GetUserData as  $GetUserDataInfo){ $CSEUserArray[] = $GetUserDataInfo['id']; }
			$CSEUserArray = array_push($CSEUserArray, $this->session->userdata('user_id'));
			$this->db->select(
								'orders.*,
								services.name,
								users.id,users.username,
								users_created_by.username as created_by_user,
								role.*,
								assign_sale.*,
								assign_sale_To_user.username as sale_assign_to_user,
								assign_sale_By_user.username as sale_assign_by_user,
								role_assign_sale_To_user.role_name as role_assign_sale_to_user,
								role_assign_sale_By_user.role_name as role_assign_sale_by_user,
								assign_sale_cse_user_name.username as cse_user_name,
								countries.name as countryName,
								 states.name as statesName
								'
								
							);
			$this->db->from('orders');
			$this->db->join('services', 'services.id = orders.service_id');
			$this->db->join('users', 'users.id = orders.client_id');
			$this->db->join('users as users_created_by', 'users_created_by.id = orders.created_by');
			$this->db->join('role', 'role.role_id = users_created_by.role_id');
			$this->db->join('assign_sale as assign_sale', 'assign_sale.order_ID = orders.order_id','left');
			$this->db->join('users as assign_sale_By_user', 'assign_sale_By_user.id = assign_sale.assigned_By','left');
			$this->db->join('users as assign_sale_To_user', 'assign_sale_To_user.id = assign_sale.assigned_To','left');
			$this->db->join('role as role_assign_sale_To_user', 'role_assign_sale_To_user.role_id = assign_sale_To_user.role_id','left');
			$this->db->join('role as role_assign_sale_By_user', 'role_assign_sale_By_user.role_id = assign_sale_By_user.role_id','left');
			$this->db->join('users as assign_sale_cse_user_name', 'assign_sale_cse_user_name.id = assign_sale.cse_id','left');
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			
			
			//$this->db->where('orders.payment_status', 'complete');
			$this->db->order_by('orders.order_id','desc');
			$this->db->where('orders.order_Status', $order_Status);
			
			
			if($this->session->userdata('role_id')==3){
				//$this->db->where('assign_sale.assigned_To', $this->session->userdata('user_id'));
				$this->db->where_in('orders.created_by',$CSEUserArray);
			}
			if($this->session->userdata('role_id')==4){
				$where ='(assign_sale.cse_id="'.$this->session->userdata('user_id').'" OR orders.created_by="'.$this->session->userdata('user_id').'")';
				$this->db->where($where);
				
			}
			$query=$this->db->get();
			return $result = $query->result_array();
		
			
		}
		public function get_order_by_id(){
			$id = $this->input->post('order_id');
			$query = $this->db->where('order_id',$id)->get('orders');
			$getdata = $query->row_array();
			$html="";
			$orderData = json_decode($getdata['order_data']);
			$order_upload_data = json_decode($getdata['order_upload_data']);
			foreach($orderData as $key=>$value){
				if($key!='submit' && $key!='serviceid'){
					$key = str_replace("_"," ",$key);
				$html .='<div class="form-group row"><label class="col-sm-4 col-form-label"><b>'.ucfirst($key).'</b></label> <div class="col-sm-8"><span class="text_style">'.$value.'</span></div></div>';
				
				}
			}
			$html .='<div class="file-cls">';
			foreach($order_upload_data as $key=>$value){
				foreach($value as $key1=>$value1){
					$ext = pathinfo($value1, PATHINFO_EXTENSION);
					if($ext=='pdf'){
						$keyname = 'pdf.png';
					}
					if($ext=='docx'){
						$keyname = 'word.png';
					}
					
					$html .='<div class="form-group row"><label class="col-sm-4 col-form-label"><b><img width="30" height="30" src="'.base_url().'/assets/images/orderfiles/'.$keyname.'"></b></label> <div class="col-sm-8"><span class="text_style"><a target="_blank" href="'.base_url().'/assets/images/orderfiles/'.$value1.'">'.$value1.'</a></span></div></div>';
				}
			}
			$html .='</div>';
			echo $html;
		}
		
		public function orderview($id){
			$query = $this->db->where('order_id',$id)->get('orders');
			$result = $query->row_array();
			
			if($result['payment_status']=='pending'){
				$order_data = json_decode($result['order_data']);
				
			    $order_data->Deposit = "0";
				$order_new_data = json_encode($order_data);
				
				$data = array(
					'order_data' => $order_new_data
				);
				
				
			$this->db->where('order_id', $id);
			$this->db->update('orders', $data);
			}
			$query = $this->db->where('order_id',$id)->get('orders');
			return $result = $query->row_array();
			
			
		}
		
		public function paymentview($id){
			$query = $this->db->where('order_id',$id)->get('payment');
			return $query->result_array();
			
		}
		public function service_list_by_id($id){
			$query = $this->db->where('id',$id)->get('services');
			return $query->row_array();
		}
		
		public function service_price($id){
			$query = $this->db->where('service_id',$id)->get('service_form_package_price');
			return $query->result_array();
			
		}
		public function deletemilestones()
		{
			$id = $this->input->post('id');
			$this->db->where('payment_id', $id);
			return $this->db->delete('payment');
			
		}
		public function order_Status($order_id){
			/********Get Data from Order Table************/
			$query = $this->db->select('created_by')->where('order_id',$order_id)->get('orders');
			$createdBy = $query->row_array();
			$created_by_user = $createdBy['created_by'];
			
			/*********** End here*********************/
			
			$order_status = $this->input->post('order_status');
			if($order_status =='active'){
				$data = array(
					'orderstatus' => 0
				);
			}
			if($order_status =='deactive'){
				$data = array(
					'orderstatus' => 1
				);
			}
			$this->db->where('order_id', $order_id);
			$this->db->update('orders', $data);
			$dataOrder = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => $created_by_user,
							'order_reason' => $this->input->post('reasonTxt'),
							'created_at' => date("Y-m-d H:i:s")
			);
			return $this->db->insert('order_status_message', $dataOrder);
		}
		public function get_user(){
			$query = $this->db->where('role_id','3')->get('users');
			return $query->result_array();
		}
		public function assign_Sale($order_id ){
			$array_admin_user = array('1','2'); 
			
			$query = $this->db->select('order_ID')->where('order_ID',$order_id)->get('assign_sale');
			$getOrderID = $query->num_rows();
			if($getOrderID > 0){
				if(in_array($this->session->userdata('role_id'), $array_admin_user)){
					
					$data_array = array(
						
						'assigned_By' => $this->session->userdata('user_id'),
						'assigned_To' => $this->input->post('user_id'),
						'cse_id' => ''
					);
					$this->db->where('order_ID', $order_id);
					$result = $this->db->update('assign_sale', $data_array);
				}else{
					
					$updatedata = array(
						'cse_id' => $this->input->post('user_id')
					);
					$this->db->where('order_ID', $order_id);
					$result = $this->db->update('assign_sale', $updatedata);
				}
			}
			else{
			$data = array(
							'order_ID' => $order_id ,
							'assigned_By' => $this->session->userdata('user_id'),
							'assigned_To' => $this->input->post('user_id'),
							'created_date' => date("Y-m-d H:i:s")
							);
		
			$result = $this->db->insert('assign_sale', $data);
			}

			/******* Get User Name from Users table *****************/
			$Usernames =  $this->Service_Model->get_user_info();
			$message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been assigned new Sale <b>Order No. '.$order_id.'</b>';
			 $MessageData = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => $this->input->post('user_id'),
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
							);
							
		
			return $this->db->insert('notification_message', $MessageData);	
       }
		
	
		
		
		public function get_cse_user(){
			$query = $this->db->select('id,username')->where('role_id','4')->get('users');
			return $query->result_array();
		}
		
		public function get_sale_reports(){
				$user_id = $this->input->post('user_id');
				
			if(!empty($user_id)){
				
				$CSEUserArray = array();
				
				 $query = $this->db->select('id,franchise_id,role_id')->where('id',$user_id)->get('users');
				 $GetUserData = $query->row_array();
			
				 if($GetUserData['role_id']==3){
					$query = $this->db->select('id')->where('franchise_id',$GetUserData['id'])->get('users');
				    $GetUserDataCsE = $query->result_array();
					if(count($GetUserDataCsE) >0){
					 foreach( $GetUserDataCsE as  $GetUserDataInfo){ $CSEUserArray[] = $GetUserDataInfo['id']; }
					}else{
						$CSEUserArray[] =$GetUserData['id'];
					}
				 }
				 if($GetUserData['role_id']==4 || $GetUserData['role_id']==1 || $GetUserData['role_id']==2){
					$CSEUserArray[] =$GetUserData['id'];
					
				 }
				 
				}
				
			
				//print_r($CSEUserArray);
				
			
			if($this->session->userdata('role_id')==3){
				$CSEUserArray = array();
				$query = $this->db->select('id')->where('franchise_id',$this->session->userdata('user_id'))->get('users');
				    $GetUserDataCsE = $query->result_array();
					if(count($GetUserDataCsE) >0){
					 foreach( $GetUserDataCsE as  $GetUserDataInfo){ $CSEUserArray[] = $GetUserDataInfo['id']; }
					}else{
						$CSEUserArray[] =$GetUserData['id'];
					}
				
			}
		
			$FromDate = $this->input->post('fromDate');
			$ToDate = $this->input->post('toDate');
		
			$country = $this->input->post('country');
			$state = $this->input->post('state');
			$order_Status = $this->input->post('order_Status');
			//$this->db->where('users_created_by.id = orders.created_by');
			$this->db->select(
								'orders.*,
								services.name,
								users.id,users.username,
								users_created_by.username as created_by_user,
								role.*,
								assign_sale.*,
								assign_sale_To_user.username as sale_assign_to_user,
								assign_sale_By_user.username as sale_assign_by_user,
								role_assign_sale_To_user.role_name as role_assign_sale_to_user,
								role_assign_sale_By_user.role_name as role_assign_sale_by_user,
								assign_sale_cse_user_name.username as cse_user_name,
								countries.name as countryName,
								states.name as statesName
								'
							);
			$this->db->from('orders');
			$this->db->join('services', 'services.id = orders.service_id');
			$this->db->join('users', 'users.id = orders.client_id');
			$this->db->join('users as users_created_by', 'users_created_by.id = orders.created_by');
			$this->db->join('role', 'role.role_id = users_created_by.role_id');
			$this->db->join('assign_sale as assign_sale', 'assign_sale.order_ID = orders.order_id','left');
			$this->db->join('users as assign_sale_By_user', 'assign_sale_By_user.id = assign_sale.assigned_By','left');
			$this->db->join('users as assign_sale_To_user', 'assign_sale_To_user.id = assign_sale.assigned_To','left');
			$this->db->join('role as role_assign_sale_To_user', 'role_assign_sale_To_user.role_id = assign_sale_To_user.role_id','left');
			$this->db->join('role as role_assign_sale_By_user', 'role_assign_sale_By_user.role_id = assign_sale_By_user.role_id','left');
			$this->db->join('users as assign_sale_cse_user_name', 'assign_sale_cse_user_name.id = assign_sale.cse_id','left');
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');

			//$this->db->where('orders.payment_status', 'complete');
			
			if(!empty($FromDate) && !empty($ToDate)){
				$where = "orders.created_at  between  '".$FromDate."' AND  '".$ToDate."'";
				$this->db->where($where);
			}
			if(!empty($user_id)){
				//$where = "orders.created_by ='".$user_id."'";
				//$this->db->where($where);
				if(!empty($CSEUserArray)){
				 $this->db->where_in('orders.created_by',$CSEUserArray);
				}
			}
			if(!empty($country)){
				$where = "orders.country ='".$country."'";
				$this->db->where($where);
			}
			if(!empty($state)){
				$where = "orders.state ='".$state."'";
				$this->db->where($where);
			}
			if(!empty($order_Status)){
				$where = "orders.order_Status ='".$order_Status."'";
				$this->db->where($where);
			}
			if($this->session->userdata('role_id')==3){
				if(!empty($CSEUserArray)){
				 $this->db->where_in('orders.created_by',$CSEUserArray);
				}
			}
		
			if($this->session->userdata('role_id')==4){
				
				//$this->db->where('assign_sale.cse_id', $this->session->userdata('user_id'));
				
				if(!empty($CSEUserArray)){
				 $this->db->where_in('orders.created_by',$CSEUserArray);
				}
			}
			$query=$this->db->get();
			return  $result = $query->result_array();
			 //echo $this->db->last_query();
			
		}
		public function get_user_list(){
			$ids =array(2,4);
			$query = $this->db->select('id,username')->where_in('role_id',$ids)->get('users');
			return $query->result_array();
		}
		public function order_Change_Status($order_id){
			
			$data = array(
					'order_Status' => $this->input->post('ChangeStatus')
				);
			
			$this->db->where('order_id', $order_id);
			$this->db->update('orders', $data);
			/******* Get User Name from Users table *****************/
			if($this->input->post('ChangeStatus')==1){ $orderStatus = 'Pending';}
			if($this->input->post('ChangeStatus')==2){ $orderStatus = 'Processing';}
			if($this->input->post('ChangeStatus')==3){ $orderStatus = 'On Hold';}
			if($this->input->post('ChangeStatus')==4){ $orderStatus = 'Dispute';}
			if($this->input->post('ChangeStatus')==5){ $orderStatus = 'Completed';}
			/****************** Send Notification****************/
			$Usernames =  $this->Service_Model->get_user_info();
			$message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been changed Status ('.$orderStatus.') for <b>Order No. '.$order_id.'</b>';
			 $MessageData = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => '1',
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
							);
							
		
			return $this->db->insert('notification_message', $MessageData);	
			
			
		}
			
		
		public function team_member(){
		
			$cse_id = $this->session->userdata('user_id');
			$query = $this->db->select('assigned_To')->get_where('assign_sale', array('cse_id' => $cse_id));
			$GetData = $query->row_array();
			$Franchise_id = $GetData['assigned_To'];
			if(!empty($Franchise_id)){
				$query_Cse = $this->db->distinct()->select('cse_id')->where_not_in('cse_id',$cse_id)->get_where('assign_sale', array('assigned_To' => $Franchise_id));
			    return $Cse_user = $query_Cse->result_array();
				
			}
		}
		public function get_user_info(){
			$this->db->select('users.username,role.role_name');
			$this->db->join('role', 'role.role_id = users.role_id');
			$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
			return $query->row_array();
		}		
		
		
        /************** Get Service for only Service page and business-consultation page**********/
		public function fetch_services(){
			$ids =array(11,12);
			$this->db->order_by("id", "ASC");
			$query = $this->db->where_not_in('id',$ids)->get('services');
			return $query->result_array();
		}


	    public function pending_orders(){
			$order_Status ='1';
			$this->db->select(
								'orders.*,
								services.name,
								users.id,users.username,
								users_created_by.username as created_by_user,
								role.*,
								assign_sale.*,
								assign_sale_To_user.username as sale_assign_to_user,
								assign_sale_By_user.username as sale_assign_by_user,
								role_assign_sale_To_user.role_name as role_assign_sale_to_user,
								role_assign_sale_By_user.role_name as role_assign_sale_by_user,
								assign_sale_cse_user_name.username as cse_user_name,
								countries.name as countryName,
								states.name as statesName
								'
							);
			$this->db->from('orders');
			$this->db->order_by('orders.order_id','desc');
			$this->db->join('services', 'services.id = orders.service_id');
			$this->db->join('users', 'users.id = orders.client_id');
			$this->db->join('users as users_created_by', 'users_created_by.id = orders.created_by');
			$this->db->join('role', 'role.role_id = users_created_by.role_id');
			$this->db->join('assign_sale as assign_sale', 'assign_sale.order_ID = orders.order_id','left');
			$this->db->join('users as assign_sale_By_user', 'assign_sale_By_user.id = assign_sale.assigned_By','left');
			$this->db->join('users as assign_sale_To_user', 'assign_sale_To_user.id = assign_sale.assigned_To','left');
			$this->db->join('role as role_assign_sale_To_user', 'role_assign_sale_To_user.role_id = assign_sale_To_user.role_id','left');
			$this->db->join('role as role_assign_sale_By_user', 'role_assign_sale_By_user.role_id = assign_sale_By_user.role_id','left');
			$this->db->join('users as assign_sale_cse_user_name', 'assign_sale_cse_user_name.id = assign_sale.cse_id','left');
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('orders.order_Status', $order_Status);
			if($this->session->userdata('role_id')==3){
				$this->db->where('assign_sale.assigned_To', $this->session->userdata('user_id'));
			}
			if($this->session->userdata('role_id')==4){
				$where ='(assign_sale.cse_id="'.$this->session->userdata('user_id').'" OR orders.created_by="'.$this->session->userdata('user_id').'")';
				$this->db->where($where);
			}
			$query=$this->db->get();
			return $result = $query->result_array();
		}
		public function completed_orders(){
			$CSEUserArray = array();


			if($this->session->userdata('role_id')==3){
				 $query = $this->db->select('id')->where('franchise_id',$this->session->userdata('user_id'))->get('users');
			     $GetUserData = $query->result_array();
			
			}
			
			foreach( $GetUserData as  $GetUserDataInfo){ 
				$CSEUserArray[] = $GetUserDataInfo['id'];
				 }
			$CSEUserArray = array_push($CSEUserArray, $this->session->userdata('user_id'));
			$order_Status ='5';
			$this->db->select(
								'orders.*,
								services.name,
								users.id,users.username,
								users_created_by.username as created_by_user,
								role.*,
								assign_sale.*,
								assign_sale_To_user.username as sale_assign_to_user,
								assign_sale_By_user.username as sale_assign_by_user,
								role_assign_sale_To_user.role_name as role_assign_sale_to_user,
								role_assign_sale_By_user.role_name as role_assign_sale_by_user,
								assign_sale_cse_user_name.username as cse_user_name,
								countries.name as countryName,
								states.name as statesName
								'
							);
			$this->db->from('orders');
			$this->db->order_by('orders.order_id','desc');
			$this->db->join('services', 'services.id = orders.service_id');
			$this->db->join('users', 'users.id = orders.client_id');
			$this->db->join('users as users_created_by', 'users_created_by.id = orders.created_by');
			$this->db->join('role', 'role.role_id = users_created_by.role_id');
			$this->db->join('assign_sale as assign_sale', 'assign_sale.order_ID = orders.order_id','left');
			$this->db->join('users as assign_sale_By_user', 'assign_sale_By_user.id = assign_sale.assigned_By','left');
			$this->db->join('users as assign_sale_To_user', 'assign_sale_To_user.id = assign_sale.assigned_To','left');
			$this->db->join('role as role_assign_sale_To_user', 'role_assign_sale_To_user.role_id = assign_sale_To_user.role_id','left');
			$this->db->join('role as role_assign_sale_By_user', 'role_assign_sale_By_user.role_id = assign_sale_By_user.role_id','left');
			$this->db->join('users as assign_sale_cse_user_name', 'assign_sale_cse_user_name.id = assign_sale.cse_id','left');
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('orders.order_Status', $order_Status);
			if($this->session->userdata('role_id')==3){
				//$this->db->where('assign_sale.assigned_To', $this->session->userdata('user_id'));
				$this->db->where_in('orders.created_by',$CSEUserArray);
			}
			if($this->session->userdata('role_id')==4){
				$where ='(assign_sale.cse_id="'.$this->session->userdata('user_id').'" OR orders.created_by="'.$this->session->userdata('user_id').'")';
				$this->db->where($where);
			}
			$query=$this->db->get();
			return $result = $query->result_array();
			//$result = $query->result_array();
			//echo "<pre>"; print_r($result); die;
		}
		public function order_placed(){
			$order_Status ='2';
			$this->db->select(
								'orders.*,
								services.name,
								users.id,users.username,
								users_created_by.username as created_by_user,
								role.*,
								assign_sale.*,
								assign_sale_To_user.username as sale_assign_to_user,
								assign_sale_By_user.username as sale_assign_by_user,
								role_assign_sale_To_user.role_name as role_assign_sale_to_user,
								role_assign_sale_By_user.role_name as role_assign_sale_by_user,
								assign_sale_cse_user_name.username as cse_user_name,
								countries.name as countryName,
								states.name as statesName
								'
							);
			$this->db->from('orders');
			$this->db->order_by('orders.order_id','desc');
			$this->db->join('services', 'services.id = orders.service_id');
			$this->db->join('users', 'users.id = orders.client_id');
			$this->db->join('users as users_created_by', 'users_created_by.id = orders.created_by');
			$this->db->join('role', 'role.role_id = users_created_by.role_id');
			$this->db->join('assign_sale as assign_sale', 'assign_sale.order_ID = orders.order_id','left');
			$this->db->join('users as assign_sale_By_user', 'assign_sale_By_user.id = assign_sale.assigned_By','left');
			$this->db->join('users as assign_sale_To_user', 'assign_sale_To_user.id = assign_sale.assigned_To','left');
			$this->db->join('role as role_assign_sale_To_user', 'role_assign_sale_To_user.role_id = assign_sale_To_user.role_id','left');
			$this->db->join('role as role_assign_sale_By_user', 'role_assign_sale_By_user.role_id = assign_sale_By_user.role_id','left');
			$this->db->join('users as assign_sale_cse_user_name', 'assign_sale_cse_user_name.id = assign_sale.cse_id','left');
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('orders.order_Status', $order_Status);
			if($this->session->userdata('role_id')==3){
				$this->db->where('assign_sale.assigned_To', $this->session->userdata('user_id'));
			}
			if($this->session->userdata('role_id')==4){
				$where ='(assign_sale.cse_id="'.$this->session->userdata('user_id').'" OR orders.created_by="'.$this->session->userdata('user_id').'")';
				$this->db->where($where);
			}
			$query=$this->db->get();
			return $result = $query->result_array();
		}

		public function get_all_user(){
			//echo "<pre>"; print_r($this->session->userdata('role_id')); die;
			if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==2){

				$role_id =array(3,4);
				$this->db->where_in('role.role_id',$role_id);
				$this->db->select('users.id,users.username,role.role_name');
				$this->db->from('users');
				$this->db->join('role','role.role_id = users.role_id');
				$query =$this->db->get();
				return $query->result_array();
			}else{
				
				$role_id =array(6,5);
				$query = $this->db->where_not_in('role_id',$role_id)->select('id,username')->get('users');
				
				return $query->result_array();
			}
			
	
		
		
		}
		public function get_user_data($id){
			
			$query = $this->db->select('id,country,state')->where('id',$id)->get('users');
			return $ResultData = $query->row_array();
			
		}



		public function fetch_sale_reports(){
			$FromDate = $this->input->post('fromDate');
			$ToDate = $this->input->post('toDate');
			$order_Status = $this->input->post('order_Status');
			$this->db->select('orders.*,orders.payment_status as OrderPayment,users.id,users.username,franchise_user.username as franchise_user,role.*,countries.name as countryName,states.name as statesName');
			$this->db->from('orders');			
			$this->db->join('users', 'users.id = orders.created_by');
			$this->db->join('users as franchise_user', 'franchise_user.id = users.franchise_id','left');
			$this->db->join('role', 'role.role_id = users.role_id');			
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('role.role_id',4);
			if(!empty($FromDate) && !empty($ToDate)){
				$where = "orders.created_at  between  '".$FromDate."' AND  '".$ToDate."'";
				$this->db->where($where);
			}
			if(!empty($order_Status)){
				$where = "orders.order_Status ='".$order_Status."'";
				$this->db->where($where);
			}

			$query=$this->db->get();
			return $result = $query->result_array();
			//echo "<pre>"; print_r($result); die;
			

			/*$this->db->select('*');
			$this->db->from('users');
			$this->db->where('role_id',3);
			$result = $this->db->get()->result_array();
			foreach ($result as $reports) {
				echo "<pre>"; print_r($reports['id']);
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('')



				$this->db->select('orders.*,role.*,	
								created_by_user.username,created_by_user.id,created_by_user.franchise_id,franchise_user.username as franchise_user');
				$this->db->from('orders');
				$this->db->join('users as created_by_user', 'created_by_user.id = orders.created_by');
				$this->db->join('users as franchise_user', 'franchise_user.id = created_by_user.franchise_id','left');
				$this->db->join('role', 'role.role_id = created_by_user.role_id');
				$this->db->where('created_by_user.franchise_id !=',0);
				$query=$this->db->get();
				//return $result = $query->result_array();
				$results = $query->result_array();
				echo "<pre>"; print_r($results);
			}
			die;*/







			/*$this->db->select(
								'orders.*,	
								created_by_user.username,created_by_user.id,created_by_user.franchise_id,franchise_user.username as franchise_user,countries.name as countryName,
								states.name as statesName,
								role.*',
							);
			$this->db->from('orders');
			$this->db->join('users as created_by_user', 'created_by_user.id = orders.created_by');
			$this->db->join('users as franchise_user', 'franchise_user.id = created_by_user.franchise_id','left');
			$this->db->join('role', 'role.role_id = created_by_user.role_id');
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('franchise_user.id!=','0');
			//$this->db->group_by('franchise_user');
			$this->db->group_by('created_by_user.franchise_id');

			//$this->db->where('created_by_user.franchise_id = 71');
			
			$query=$this->db->get();
			//return $result = $query->result_array();
			$result = $query->result_array();
			$ArrayResult =  array();
			foreach ($result as $key => $results) {
				
				$id =$results['created_by'];
				$franchise_id =$results['franchise_id'];
				//Pending
				$this->db->where('orders.order_Status', 1);
				$this->db->where('orders.created_by', $id);
				$queryPending = $this->db->get('orders');
			    $pending =  $queryPending->num_rows();
			    $result[$key]['pending']  = $pending;				

			    //End

			    //Processing
			    $this->db->where('orders.order_Status', 2);
				$this->db->where('orders.created_by', $id);
				$queryProcessing = $this->db->get('orders');
			    $processing =  $queryProcessing->num_rows();
			    $result[$key]['processing']  = $processing;
			    //End
			    //On Hold
			    $this->db->where('orders.order_Status', 3);
				$this->db->where('orders.created_by', $id);
				$queryOnhold = $this->db->get('orders');
			    $onhold =  $queryOnhold->num_rows();
			    $result[$key]['onhold']  = $onhold;
			    //End
			    //On Dispute
			    $this->db->where('orders.order_Status', 4);
				$this->db->where('orders.created_by', $id);
				$queryDispute = $this->db->get('orders');
			    $dispute =  $queryDispute->num_rows();
			    $result[$key]['dispute']  = $dispute;
			    //End

			    //On Completed
			    $this->db->where('orders.order_Status', 5);
				$this->db->where('orders.created_by', $id);
				$queryCompleted = $this->db->get('orders');
			    $completed =  $queryCompleted->num_rows();
			    $result[$key]['completed']  = $completed;
			    //End

			}

			return $result;*/
			/*echo"<pre>";
			print_r($result);
			die;*/
           
		}




		public function get_sale_reports_cse(){
			$FromDate = $this->input->post('fromDate');
			$ToDate = $this->input->post('toDate');
			$order_Status = $this->input->post('order_Status');	


			$this->db->select('orders.*,orders.payment_status as OrderPayment,users.id,users.username,franchise_user.username as franchise_user,role.*,countries.name as countryName,states.name as statesName');
			$this->db->from('orders');			
			$this->db->join('users', 'users.id = orders.created_by');
			$this->db->join('users as franchise_user', 'franchise_user.id = users.franchise_id','left');
			$this->db->join('role', 'role.role_id = users.role_id');			
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('users.id', $this->session->userdata('user_id'));	


			if(!empty($FromDate) && !empty($ToDate)){
				$where = "orders.created_at  between  '".$FromDate."' AND  '".$ToDate."'";
				$this->db->where($where);
			}
			if(!empty($order_Status)){
				$where = "orders.order_Status ='".$order_Status."'";
				$this->db->where($where);
			}


			$query=$this->db->get();
			return $result = $query->result_array();
			//echo "<pre>"; print_r($result); die;	
			
		}


		public function get_sale_reports_cse_count(){
			$this->db->select('orders.*,
				 orders.payment_status as OrderPayment,users.id,users.username,franchise_user.username as franchise_user,role.*,countries.name as countryName,states.name as statesName,COUNT(case when ors.order_Status = 1 then 1 end) AS Pending,COUNT(case when ors2.order_Status = 2 then 1 end) AS Processsing,COUNT(case when ors3.order_Status = 3 then 1 end) AS Hold,COUNT(case when ors5.order_Status = 5 then 1 end) AS Completed');
			$this->db->from('orders');			
			$this->db->join('orders as ors', 'ors.order_id = orders.order_id');
			$this->db->join('orders as ors2', 'ors2.order_id = orders.order_id');
			$this->db->join('orders as ors3', 'ors3.order_id = orders.order_id');
			$this->db->join('orders as ors5', 'ors5.order_id = orders.order_id');
			$this->db->join('users', 'users.id = orders.created_by');
			$this->db->join('users as franchise_user', 'franchise_user.id = users.franchise_id','left');
			$this->db->join('role', 'role.role_id = users.role_id');			
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('users.id', $this->session->userdata('user_id'));
			//$this->db->where('users.id = orders.created_by');
			//$this->db->where('ors.order_Status',1);
			//$this->db->where('ors2.order_Status',2);
			$query=$this->db->get();
			return  $result = $query->result_array();
			//$result = $query->result_array();
			//echo "<pre>"; print_r($result); die;
		}



		public function get_sale_reports_count(){
			$this->db->select('orders.*,
				 orders.payment_status as OrderPayment,users.id,users.username,franchise_user.username as franchise_user,role.*,countries.name as countryName,states.name as statesName,COUNT(case when ors.order_Status = 1 then 1 end) AS Pending,COUNT(case when ors2.order_Status = 2 then 1 end) AS Processsing,COUNT(case when ors3.order_Status = 3 then 1 end) AS Hold,COUNT(case when ors5.order_Status = 5 then 1 end) AS Completed');
			$this->db->from('orders');			
			$this->db->join('orders as ors', 'ors.order_id = orders.order_id');
			$this->db->join('orders as ors2', 'ors2.order_id = orders.order_id');
			$this->db->join('orders as ors3', 'ors3.order_id = orders.order_id');
			$this->db->join('orders as ors5', 'ors5.order_id = orders.order_id');
			$this->db->join('users', 'users.id = orders.created_by');
			$this->db->join('users as franchise_user', 'franchise_user.id = users.franchise_id','left');
			$this->db->join('role', 'role.role_id = users.role_id');			
			$this->db->join('countries', 'countries.id = orders.country','left');
			$this->db->join('states', 'states.id = orders.state','left');
			$this->db->where('users.id = orders.created_by');
			
			$this->db->where('role.role_id',4);			
			$this->db->group_by('users.franchise_id');
			$query=$this->db->get();
			return  $result = $query->result_array();

		}





		public function getsalereports($id){
			$this->db->select('orders.*,created_by_user.id,created_by_user.franchise_id');
			$this->db->from('orders');
			$this->db->join('users as created_by_user', 'created_by_user.id = orders.created_by');
			$this->db->where('created_by_user.franchise_id',$id);
			$query=$this->db->get();
			return $result = $query->result_array();
			// $result = $query->result_array();
			//echo "<pre>"; print_r($result); die;
		}


	
		/******************* End here********************************/	
			
		
	}