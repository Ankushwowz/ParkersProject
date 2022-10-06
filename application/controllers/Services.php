<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

 public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
	   $this->load->model('Payment_Model');
	   $this->load->model('Service_Model');
    }
	public function index(){
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		$data['services'] = $this->Service_Model->get_services();
		$this->load->view('templates/header',$data);
		$this->load->view('pages/services');
	  	$this->load->view('templates/footer');
	}

	public function single_service($id = NULL){
		$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		$data['services'] = $this->Service_Model->get_services();
		$data['viewservices'] = $this->Service_Model->view_service($id);
		$data['title'] = 'View Service';
		$this->load->view('templates/header',$data);	  		 
		$this->load->view('pages/service-single',$data);
		$this->load->view('templates/footer');
	}


		public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));			
			//echo "<pre>"; print_r($table); die;
			$this->Service_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}


		public function service_form(){
		if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }	
		$data['service_data'] = $this->Service_Model->get_service();
		$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header',$UserProfileImage);
		$this->load->view('administrator/admin-leftbar');
		$this->load->view('administrator/service-form',$data);
		$this->load->view('administrator/footer');
		}


		public function apply_jobs()
		{
			$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
			$this->load->view('templates/header', $data);	  		 
	   		$this->load->view('pages/apply-jobs');
	  		$this->load->view('templates/footer');
		}
		/*************** Add Form Filed in Service form***************/
		public function addform(){
			$this->Service_Model->addform();  
			$this->session->set_flashdata('success', 'Service form has been created Successfully.');
			redirect('administrator/services/list');
		}	
		
		public function saleservices(){
			$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
			$data['services'] = $this->Service_Model->service_list();
			$this->load->view('templates/header',$data);
			$this->load->view('pages/saleservices');
			$this->load->view('templates/footer');
		}
		
		public function addservices(){
			
			$GetOrderId =$this->Service_Model->sale_service();
			if(!empty($GetOrderId)){
				$order_id = base64_encode($GetOrderId);
				//$this->session->set_flashdata('neworder', 'New Order has been created Successfully.');
				redirect('administrator/payment/'.$order_id);
			}
		}
		
		public function viewsales(){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$order_Status = 1;
			$data['orders'] = $this->Service_Model->get_orders($order_Status);
			$data['country'] = $this->Administrator_Model->fetch_country();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){ $left_bar = 'admin-leftbar';  }
			if($this->session->userdata('role_id')==2){ $left_bar = 'customer-support-leftbar';
			
			}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';
			$data['users'] = $this->Service_Model->get_cse_user();
			}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/viewsales',$data);
			$this->load->view('administrator/footer');
		}
		
		public function orderview($id = NULL){
		if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }	
		$id = base64_decode($id);
		$data['orders'] = $this->Service_Model->orderview($id);
		$data['payment'] = $this->Service_Model->paymentview($id);
		$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header',$UserProfileImage);
		if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
		if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
		if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
		if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
		$this->load->view('administrator/'.$left_bar);
		$this->load->view('administrator/orderview',$data);
		$this->load->view('administrator/footer');
			
		}
		public function get_order_by_id(){
			echo $gt = $this->Service_Model->get_order_by_id();
			
		}
	public function buyservices($id = NULL){
		if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }	
		$serviceId = base64_decode($id);
		$data['services'] = $this->Service_Model->service_list_by_id($serviceId);
		$data['serviceslist'] = $this->Service_Model->service_list();
		$data['country'] = $this->Administrator_Model->fetch_country();
		if($serviceId==3 || $serviceId==6){ $data['serviceprice'] = $this->Service_Model->service_price($serviceId);}
		$this->load->view('templates/header');

		$filename = strtolower(str_replace(' ','_',str_replace('/','_',$data['services']['name'])));
		$this->load->view('pages/service_form/'.$filename,$data);

		$this->load->view('templates/footer');
	}
       
		public function create_milestones(){
			$gt =$this->Payment_Model->create_milestones();
			if($gt==1){ echo 1;
			$this->session->set_flashdata('create_milestones', 'New milestones has been created Successfully.');
			}else{ echo 0; }
			
		}
		
		public function deletemilestones()
		{
			$delete = $this->Service_Model->deletemilestones();   
			if($delete){
				echo 1;
			}		
			
		}
		/*********** Enable And Disabled Status of Order *************/
		public function orderStatus(){
			$order_id = base64_decode($this->input->post('order_id'));
			$status = $this->Service_Model->order_Status($order_id);  
			$order_status = $this->input->post('order_status');
			if($status){
				echo 1;
				if($order_status=='active'){ $order_status='deactive';} else { $order_status='active'; }
				$this->session->set_flashdata('success', 'Sale status has been '.$order_status.' successfully');
			}
			
		}
		public function assignSale(){
			$order_id = base64_decode($this->input->post('order_id'));
			$status = $this->Service_Model->assign_Sale($order_id); 
		if($status){
				echo 1;
				$this->session->set_flashdata('success', 'Sale has been assigned successfully');
			}
			
		}
		public function salereports(){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$data['orders'] = $this->Service_Model->get_sale_reports();
			//echo "<pre>"; print_r($data['orders']); die;
		    $data['ordersReports'] = $this->Service_Model->fetch_sale_reports(); // Fetch Sales Report any cse in CSA
		    $data['ordersReportsCount'] = $this->Service_Model->get_sale_reports_count();	// Fetch Only CSE Sales particular
			$data['ordersReportsCse'] = $this->Service_Model->get_sale_reports_cse();	// Fetch Only CSE Sales particular	  
		    //echo "<pre>"; print_r($data['ordersReportsCount']); die;
			$data['ordersReportsCseCount'] = $this->Service_Model->get_sale_reports_cse_count();// Fetch Only CSE Sales particular
			
		    $data['users'] = $this->Service_Model->get_all_user();
		    //echo "<pre>"; print_r($data['users']); die;
			$data['country'] = $this->Administrator_Model->fetch_country();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){ $left_bar = 'admin-leftbar'; $file_name = 'sale-reports'; }
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar'; $file_name = 'sale-reports-generate';}
			//if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar'; $file_name = 'sale-reports-generate';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar'; $file_name = 'sale-reports';}
			//if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar'; $file_name = 'sale-reports';}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar'; $file_name = 'sale-reports-generate_cse';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/'.$file_name,$data);
			$this->load->view('administrator/footer');
		}


		public function getsalereports($id){

			$data['salereport1'] = $this->Service_Model->getsalereports($id);
		}



		public function assign_user(){
		$array_admin_user = array('1','2'); 
		$state_id= $this->input->post('state_id');
		$country_id= $this->input->post('country_id');
			
		  $this->db->select('id,username');
		  $this->db->where('state', $state_id);
		  $this->db->where('country', $country_id);
		  if (in_array($this->session->userdata('role_id'), $array_admin_user)){ 
			$this->db->where('role_id', '3');
		  }else{
				$this->db->where('role_id', '4'); 
		  }
		  $this->db->order_by('username', 'ASC');
		  $query = $this->db->get('users');
		   if (in_array($this->session->userdata('role_id'), $array_admin_user)){ 
			$output = '<option value="">Select Franchise Executive</option>';
		   }else{
			   $output = '<option value="">Select Customer Support Executive</option>';
		   }
		  
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->id.'">'.$row->username.'</option>';
		  }
		  echo $output;
		 }  
		 
		  public function orderChangeStatus(){

			$order_id = base64_decode($this->input->post('order_id'));
			$status = $this->Service_Model->order_Change_Status($order_id);  
			if($status){
				echo 1;
				$this->session->set_flashdata('orderChangeStatus', 'Sale status has been changed successfully.');
			}
		  }
		  
		  public function completedsales(){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$order_Status ='5';
			$data['orders'] = $this->Service_Model->get_orders($order_Status);
			$data['country'] = $this->Administrator_Model->fetch_country();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){  $left_bar = 'admin-leftbar'; }
			if($this->session->userdata('role_id')==2){ $left_bar = 'customer-support-leftbar'; }
			if($this->session->userdata('role_id')==3){ $left_bar = 'franchise-leftbar';
				$data['users'] = $this->Service_Model->get_cse_user();
			}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/completedsales',$data);
			$this->load->view('administrator/footer');
		}
		 public function orderplaced(){
			if(empty($this->session->userdata('user_id'))){ redirect('administrator/index'); }
			$order_Status ='2';
			$data['orders'] = $this->Service_Model->get_orders($order_Status);
			$data['country'] = $this->Administrator_Model->fetch_country();
			$UserProfileImage['UserProfileImage']= $this->Administrator_Model->user_profile_image();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header',$UserProfileImage);
			if($this->session->userdata('role_id')==1){  $left_bar = 'admin-leftbar'; }
			if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
			if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';
			$data['users'] = $this->Service_Model->get_cse_user();
			}
			if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
			$this->load->view('administrator/'.$left_bar);
			$this->load->view('administrator/orderplaced',$data);
			$this->load->view('administrator/footer');
		}
		
		 public function get_user_data(){

			$user_id = $this->input->post('user_id');
			$status = $this->Service_Model->get_user_data($user_id);  
			echo json_encode($status);
			
		  }
		/************ End here *****************************/
		/************** notification_counter ***************/
				

}
