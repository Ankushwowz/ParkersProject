<?php
	class Contact_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		
		public function create_contact(){
			//echo "here i am"; die;

			$contact_data = array( 							 
							'name' => $this->input->post('name'), 							 
							'email' => $this->input->post('email'), 							 
							'phone' => $this->input->post('phone'), 							 
							'subject' => $this->input->post('subject'),	
							'message' => $this->input->post('message'),
							'service_id' => $this->input->post('service_name'),
							'created_at' => date("Y-m-d H:i:s")
						  );

			$this->db->insert('contact_us', $contact_data);
			$contact_id = $this->db->insert_id();


			$this->db->select('contact_us.id,serve.name');
			$this->db->join('services as serve', 'contact_us.service_id = serve.id');
			$query = $this->db->where('contact_us.id',$contact_id)->get('contact_us');
			$contact_data = $query->row_array();
			//echo "<pre>"; print_r($contact_data); die;
			$message = 'New service query for <b>'.$contact_data['name'].'</b>';
			$notification_data = array(				
				'to_id' => '1',
				'contact_id' => $contact_id,
				'message' => $message,
				//'message' => '#franchise '.$message.'',
				//'message_id' => $msg_id,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);


		}

	}