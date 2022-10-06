<?php
	class Payment_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}


		public function get_orders_by_id()
		{
			$id = base64_decode($this->uri->segment(3));
			$query = $this->db->get_where('orders', array('order_id' => $id));
			return $query->row_array();	
		
		}
		public function get_orders_id($order_id)
		{
			$query = $this->db->get_where('orders', array('order_id' => $order_id));
			return $query->row_array();	
		
		}
		
		public function add_payment($chargeJson,$amount)
		{
			$Update_order_array = array();
			$order_id  = $chargeJson['metadata']['order_id'];
			
			$query = $this->db->get_where('orders', array('order_id' => $order_id));
			$getorder  = $query->row_array();
			
			
			
			$userName  = $chargeJson['metadata']['carduserName'];
			$payment_details  = json_encode($chargeJson['payment_method_details']);
			$transaction_id  = $chargeJson['balance_transaction'];
			$amount  = $amount;
			
			/******* Get User Name from Users table *****************/
			$this->db->select('users.username,role.role_name');
			$this->db->join('role', 'role.role_id = users.role_id');
			$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
			$Usernames = $query->row_array();
			
			if(!empty($chargeJson['metadata']['milestone_id'])){
				$data = array(
				'userName' => $userName,
				'transaction_id' => $transaction_id,
				 'payment_status' => 'complete'
				);
				$this->db->where('payment_id', $chargeJson['metadata']['milestone_id']);
				$this->db->update('payment', $data);
				
				
				/************* Update Amount Order Table ******************/
				$order_data = json_decode($getorder['order_data']);
				$serviceid = $order_data->serviceid;
				$Service_Amount = $order_data->Service_Amount;
				$Deposit = $order_data->Deposit;
				if($Service_Amount > 0 ){
					$DepositAmount = $Deposit + $amount;
				}
				$order_data->Deposit = $DepositAmount;
				$orderData = json_encode($order_data);
				$UpdateorderData = array(
						'order_data' => $orderData,
						'payment_status' => 'complete'
				);
				$this->db->where('order_id', $order_id);
				$this->db->update('orders', $UpdateorderData);
				
			
			/************** End Here **************************/ 
			 
			 $message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been credited  amount (€ '.$amount.') for this <b>Order No. '.$order_id.'</b>';
			 $MessageData = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => 1,
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
							);
			$this->db->insert('notification_message', $MessageData);
				/*************** end here******************************/
				
				

			}else{
				
				$UpdateorderData = array(
						'payment_status' =>'complete'
				);
				$this->db->where('order_id', $order_id);
				$this->db->update('orders', $UpdateorderData);
				$data = array(
				'order_id' => $order_id, 
				'userName' => $userName, 
			    'amount' => $amount,
			    'transaction_id' => $transaction_id,
			    'payment_details' => $payment_details,
			    'payment_status' => 'complete',
			    'milestones_date' => date("Y-m-d H:i:s"),
			    'created_date' => date("Y-m-d H:i:s")
				
			    );
				$this->db->insert('payment', $data);
			
				$message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been created New Sale  amount (€ '.$amount.') for this <b>Order No. '.$order_id.'</b>';
			 $MessageData = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => 1,
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
							);
			$this->db->insert('notification_message', $MessageData);
				
				
				
				$message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been credited  amount (€ '.$amount.') for this <b>Order No. '.$order_id.'</b>';
				$MessageData = array(
					'order_id' => $order_id,
					'from_id' => $this->session->userdata('user_id'),
					'to_id' => 1,
					'message' => $message,
					'created_at' => date("Y-m-d H:i:s")
				);
				return  $this->db->insert('notification_message', $MessageData);
			}			
			
		
		}
		public function get_payment_amount_by_id(){
			$id = base64_decode($this->uri->segment(3));
			$this->db->order_by("payment_id", "desc");
			$query = $this->db->get_where('payment', array('order_id' => $id));
			return $query->num_rows();	
		}
		
		public function create_milestones(){
			  
			
			$order_id  =base64_decode($this->input->post('orderid'));
			$amount  = $this->input->post('amount');
			$milestones_date  = $this->input->post('DateMilestones');
			$data = array(
				'order_id' => $order_id, 
				'amount' => $amount,
				'milestones_date' => $milestones_date,
			    'payment_status' => 'Pending',
			    'created_date' => date("Y-m-d H:i:s")
				);
				
		   $this->db->insert('payment', $data);
			/******* Get User Name from Users table *****************/
			$this->db->select('users.username,role.role_name');
			$this->db->join('role', 'role.role_id = users.role_id');
			$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
			$Username = $query->row_array(); 
			/************** End Here **************************/
		  
		   $message ='<b>'.$Username['username'].'</b>(<span class="role-class"><b>'.$Username['role_name'].'</b></span>) has been created new milestones amount (€ '.$amount.') for this <b>Order No. '.$order_id.'</b>';
		   $MessageData = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => 1,
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
							);
			$this->db->insert('notification_message', $MessageData);
		   return 1;
		}
		public function get_payment_amount(){
			$id = base64_decode($this->uri->segment(4));
			$query = $this->db->get_where('payment', array('payment_id' => $id));
			return $query->row_array();	
		}


		
	}