<?php
	class Administrator_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function adminLogin($email, $encrypt_password){
			//Validate
			$this->db->where('email', $email);
			$this->db->where('password', $encrypt_password);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->row(0);
			}else{
				return false;
			}
		}

		public function get_posts($slug = FALSE)
		{
			if($slug === FALSE){
				$query = $this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}

		public function create_post()
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function delete_job($id)
		{
			$this->db->where('job_id', $id);
			return $this->db->delete('jobs');
			
		}



		public function delete_service($id)
		{
			$this->db->where('id', $id);
			return $this->db->delete('services');
			
		}

		
		public function get_categories(){
			$this->db->order_by("id", "DESC");
			$query = $this->db->get('categories');
			return $query->result_array();
		}

	public function add_user(){
			//echo "<pre>"; print_r($_POST); die;
		  $password = md5($this->input->post('password'));
			$data = array(
							'email' => $this->input->post('email'),
							'password' => $password,
							'username' => $this->input->post('username'),
							'role_id' => $this->input->post('role'),
							'status' => 1,
							'plain_password' => $this->input->post('password'),
							'country' => $this->input->post('country'),
							'state' => $this->input->post('state'),
							'zipcode' => $this->input->post('zipcode'),
							'franchise_id' => $this->input->post('franchise'),
							'register_date' => date("Y-m-d H:i:s"),
							'created_by'=> $this->session->userdata('user_id')
							

						  );
			//echo "<pre>"; print_r($data); 
			$this->db->insert('users', $data);
			$user_id = $this->db->insert_id();
			$profile_data = array(
							'user_id' => $user_id,
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('surname'),
							'gender' => $this->input->post('gender'),
							'dob' => $this->input->post('dob'),
							'created_date' => date("Y-m-d H:i:s")

						  );
			//echo "<pre>"; print_r($profile_data); die;
			$this->db->insert('user_profile', $profile_data);
			$Usernames =  $this->Service_Model->get_user_info();
			$UserRole =  $this->Administrator_Model->get_user_role($this->input->post('role'));
			$message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been assigned (<span class="role-class"><b>'.$UserRole[0]['role_name'].'</b></span>)';
			
			
			 $MessageData = array(
							'order_id' => $order_id,
							'from_id' => $this->session->userdata('user_id'),
							'to_id' => $user_id,
							'message' => $message,
							'created_at' => date("Y-m-d H:i:s")
							);
							
		
			return $this->db->insert('notification_message', $MessageData);	
		}

		/*public function get_users(){
				$this->db->select('users.id,users.email,users.username,users.role_id,users.status,users.status,users.country,users.state,users.zipcode,users.register_date,users.created_by,role.role_name,user_profile.*');
				$this->db->order_by('users.id', 'DESC');
				$this->db->join('role', 'role.role_id = users.role_id');
				$this->db->join('user_profile', 'user_profile.user_id = users.id');
				$ids = array(1);
				$query = $this->db->where_not_in('role.role_id',$ids)->get('users');
				return $query->result_array(); 
		}*/
		public function get_users(){
			
			$FE_ID= $this->session->userdata('user_id');
			$this->db->select('id,country,state')->where("users.id", $FE_ID);
			$queryState= $this->db->get('users');
			$queryState = $queryState->row_array();
			$StateID = $queryState['state'];	
			$franchiseID = $queryState['id'];	
			
			$role_id = $this->uri->segment(4);
			$this->db->select('users.id,users.email,users.username,users.role_id,users.status,users.status,users.country,users.state,users.zipcode,users.register_date,users.created_by,role.role_name,user_profile.*,states.name as statesName');
			$this->db->order_by('users.id', 'DESC');
			$this->db->join('role', 'role.role_id = users.role_id');
			$this->db->join('user_profile', 'user_profile.user_id = users.id');
			$this->db->join('states', 'states.id = users.state');
			if($this->session->userdata('role_id')==1){
				$ids = array(1);
				if($role_id!=''){
					$role_id = base64_decode($role_id);
					$this->db->where('role.role_id',$role_id);	
				}else{ 
					$this->db->where_not_in('role.role_id',$ids); 
				}
			}
			if($this->session->userdata('role_id')==2){
				$ids = array(1,2);
				if($role_id!=''){
				$role_id = base64_decode($role_id);
				$this->db->where('role.role_id',$role_id);	
				}else{ $this->db->where_not_in('role.role_id',$ids); }
			}
			if($this->session->userdata('role_id')==3){
				if($role_id!=''){
					$role_id = base64_decode($role_id);
					//echo "<pre>"; print_r($role_id); die;
					$this->db->where('role.role_id',$role_id);	
					$this->db->where('users.franchise_id',$franchiseID);	
					//$this->db->where('users.state',$StateID);	
				}
			}
			$query = $this->db->get('users');
			return $query->result_array(); 
		}


		public function get_users_Sadmin(){
			$this->db->select('users.id,users.email,users.username,users.role_id,users.status,users.status,users.country,users.state,users.zipcode,users.register_date,users.created_by,role.role_name,user_profile.*');
				$this->db->order_by('users.id', 'DESC');
				$this->db->join('role', 'role.role_id = users.role_id');
				$this->db->join('user_profile', 'user_profile.user_id = users.id');
				 $ids = array(1,2);
				$query = $this->db->where_not_in('role.role_id',$ids)->get('users');
				return $query->result_array(); 
		}

		public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}

		public function get_user($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('id' => $id));
			return $query->row_array();
		}



       	public function update_user_data($post_image)
		{ 

			$get_profile = $this->db->where('user_id', $this->input->post('id'))
					->get('user_profile');
			$countrow = $get_profile->num_rows();
			if($countrow==0){
					$data = array(
						    'user_id' => $this->input->post('id'),
							'first_name' => $this->input->post('first_name'),
							'last_name' => $this->input->post('last_name'),
							'city' => $this->input->post('city'),
							
							'address' => $this->input->post('address'),
							'address1' => $this->input->post('address1'),
							'gender' => $this->input->post('gender'),
							'image' => $post_image,
							'created_date' => date("Y-m-d H:i:s")
						  );

			
			$this->db->insert('user_profile', $data);

			}else{
				$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'city' => $this->input->post('city'),
						'address' => $this->input->post('address'),
						'address1' => $this->input->post('address1'),
						'gender' => $this->input->post('gender'),
						'image' => $post_image,
						'created_date' => date("Y-m-d H:i:s")
					  );

				$this->db->where('user_id', $this->input->post('id'));
				$d = $this->db->update('user_profile', $data);

			}
		
		}

		/************ Update User Profile Information **************/
		public function update_user_profile_data($post_image){ 
			$user_id = $this->session->userdata('user_id');
			$userData = array(
							'country' =>$this->input->post('country'),
							'state' =>$this->input->post('state'),
							'zipcode' =>$this->input->post('zipcode'),
							'created_by'=> $this->session->userdata('user_id')
						);
			$this->db->where('id',$user_id);
			$this->db->update('users', $userData);
             			
			$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'city' => $this->input->post('city'),
						'address' => $this->input->post('address'),
						'address1' => $this->input->post('address1'),
						'gender' => $this->input->post('gender'),
						'image' => $post_image,
						'created_date' => date("Y-m-d H:i:s")
					  );

			$this->db->where('user_id', $user_id);
			$this->db->update('user_profile', $data);
        }
		/*********** End Here ***************************/

		public function create_product_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'product',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function product_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'product');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_product_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_product_category($id = FALSE)
		  {
		   if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		   }

		   $query = $this->db->get_where('categories', array('id' => $id));
		   return $query->row_array();
		  }


		  public function create_product($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'sku' => $this->input->post('sku'),
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'user_id' => $this->session->userdata('user_id'),
							'quantity' => $this->input->post('quantity'),
							'color' => $this->input->post('color'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'size' => $this->input->post('size'),
							'status' => $this->input->post('status'),
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->insert('products', $data);
			 return  $insert_id = $this->db->insert_id();
		}

		public function insertproductsmultipleImages($data = array()){
       	 $insert = $this->db->insert_batch('product_images',$data);
       	 return $insert?true:false;
    	}

		// Check Product SKU exists
		public function check_sku_exists($sku){
			$query = $this->db->get_where('products', array('sku' => $sku));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		public function get_products($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('products');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function update_products($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('products');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('products', array('id' => $id));
			return $query->row_array();
		}

		public function product_images($productId = FALSE){
			$this->db->order_by('id','desc');
			$this->db->where('product_id', $productId);
			$query = $this->db->get('product_images');
			return $query->result_array();
		}

		public function update_products_data($post_image)
		{
			$data = array('name' => $this->input->post('name'), 
							'save_price' => $this->input->post('save_price'),
							'price' => $this->input->post('price'),
							'user_id' => $this->session->userdata('user_id'),
							'quantity' => $this->input->post('quantity'),
							'color' => $this->input->post('color'),
							'tag' => $this->input->post('tag'),
							'short_description' => $this->input->post('short_description'),
							'cat_id' => $this->input->post('cat_id'),
							'size' => $this->input->post('size'),
							'status' => $this->input->post('status'),
							'description' => $this->input->post('description'),
							'meta_title' => $this->input->post('meta_title'),
							'meta_desc' => $this->input->post('meta_desc'),
							'meta_tag' => $this->input->post('meta_tag'),
							'image' => $post_image,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('products', $data);
		}

		public function create_faq_category()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'type' => 'faq',
				'status' => $this->input->post('status'),
				'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('categories', $data);
		}

		public function faq_categories(){
			$this->db->order_by('id','desc');
			$this->db->where('type', 'faq');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function update_faq_category_data()
		{
			$data = array('name' => $this->input->post('name'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('categories', $data);
		}

		public function update_faq_category($id = FALSE)
		 {
		   	if($id === FALSE){
		    $query = $this->db->get('categories');
		    return $query->result_array(); 
		}
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row_array();
		}


		//faq models functions start

		 public function create_faq()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			return $this->db->insert('faqs', $data);
		}


		public function get_faqs()
		{
			$this->db->select('categories.name catName, faqs.id as faqId,faqs.question,faqs.answer,faqs.datetime,faqs.status as faqStatus');
			$this->db->from('faqs');
			$this->db->join('categories', 'categories.id = faqs.faq_cat_id');
				
				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function update_faqs($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('faqs');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('faqs', array('id' => $id));
			return $query->row_array();
		}

		public function update_faq_data()
		{
			$data = array('question' => $this->input->post('question'), 
							'answer' => $this->input->post('answer'),
							'faq_cat_id' => $this->input->post('faq_cat_id'),
							'status' => 1,
							'datetime' => date("Y-m-d H:i:s")
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('faqs', $data);
		}

		//sco pages details start
		public function get_scopages($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sco');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sco', array('id' => $id));
			return $query->row_array();
		}

		public function update_scopages($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sco');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sco', array('id' => $id));
			return $query->row_array();
		}

		public function update_scopages_data($id = FALSE)
		{
			$data = array('title' => $this->input->post('title'), 
							'keywords' => $this->input->post('keywords'),
							'description' => $this->input->post('description')
						);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sco', $data);
		}

		//social links
		public function get_sociallinks($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sociallinks');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function update_sociallinks($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sociallinks');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sociallinks', array('id' => $id));
			return $query->row_array();
		}

		public function update_sociallinks_data($id = FALSE)
		{
			$data = array('link' => $this->input->post('link'));
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sociallinks', $data);
		}

		//slider
		public function create_slider($post_image)
		{
			$data = array('title' => $this->input->post('title'), 
							'image' => $post_image,
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status')
						  );
			return $this->db->insert('sliders_img', $data);
		}

		public function get_sliders($id = false)
		{
			if($id === FALSE){
				$query = $this->db->get('sliders_img');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sliders_img', array('id' => $id));
			return $query->row_array();
		}

		public function get_slider_data($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('sliders_img');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('sliders_img', array('id' => $id));
			return $query->row_array();
		}

		public function update_slider_data($post_image)
		{
			$data = array('title' => $this->input->post('title'), 
							'image' => $post_image,
							'description' => $this->input->post('description'),
							'status' => $this->input->post('status')
						  );

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('sliders_img', $data);
		}

		// blogs models functions starts
		public function create_blog($post_image)
		{
			$slug = url_title($this->input->post('title'), "dash", TRUE);

			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id'),
			    'post_image' => $post_image,
			    'user_id' => $this->session->userdata('user_id')
			    );
			return $this->db->insert('posts', $data);
		}

		public function listblogs($blogId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($blogId === FALSE){
				$this->db->order_by('posts.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('posts', array('id' => $blogId));
			return $query->row_array();
		}

	
		public function update_blog_data($post_image){
			$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'title' => $this->input->post('title'), 
			    'slug' => $slug,
			    'body' => $this->input->post('body'),
			    'category_id' => $this->input->post('category_id'),
			    'post_image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

		public function list_blog_comments()
		{
			$this->db->select('comments.username, comments.email, comments.comment, comments.id as commentId, comments.created_at createdAt, comments.status as commentStatus, posts.title as blogTitle');
			$this->db->from('comments');
			$this->db->join('posts', 'posts.id = comments.post_id');
			$this->db->where('comments.comment_type', 'blog');

				$query=$this->db->get();
				return $data=$query->result_array();
		}

		public function view_blog_comments($id = FALSE)
		{

			if($id === FALSE){
				$query = $this->db->get('comments');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('comments', array('id' => $id));
			return $query->row_array();		
		}


		public function view_users($id = FALSE)
		{

			if($id === FALSE){
				$query = $this->db->get('comments');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('comments', array('id' => $id));
			return $query->row_array();		
		}



		//social links
		public function get_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('site_config');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('site_config', array('id' => $id));
			return $query->row_array();
		}

		public function update_siteconfiguration_data($post_image)
		{
			$data = array('site_title' => $this->input->post('site_title'),
						  'site_name' => $this->input->post('site_name'),
						  'logo_img' => $post_image
						);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('site_config', $data);
		}

		//Page Content pages details start
		public function get_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents($id = FALSE)
		{
			if($id === FALSE){
				$query = $this->db->get('page_content');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('page_content', array('id' => $id));
			return $query->row_array();
		}

		public function update_pagecontents_data($id = FALSE){
			$data = array('page_name' => $this->input->post('page_name'), 
							'content' => $this->input->post('content'),
							'updated_datetime' => date("Y-m-d H:i:s")
						);
						
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('page_content', $data);
		}

		public function get_galleries_images(){
			$this->db->order_by('id','desc');
			$query = $this->db->get('galleries');
			return $query->result_array();
		}

		/*public function create_team($team_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $team_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('teams', $data);
		}

		public function listteams($teamId = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($teamId === FALSE){
				$this->db->order_by('teams.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id');
				$query = $this->db->get('teams');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('teams', array('id' => $teamId));
			return $query->row_array();
		}

		public function update_team_data($post_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'designation' => $this->input->post('designation'),
			    'description' => $this->input->post('description'),
			    'image' => $post_image
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('teams', $data);
		}*/

		public function create_testimonial($uploaded_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('testimonials', $data);
		}

		public function listtestimonial($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				$this->db->order_by('testimonials.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('testimonials');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('testimonials', array('id' => $id));
			return $query->row_array();
		}

		public function update_testimonial_data($uploaded_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 
			    'domain' => $this->input->post('domain'),
			    'description' => $this->input->post('description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('testimonials', $data);
		}

		public function update_profile(){
			$id = $this->session -> userdata('user_id');
			$this->db->select('users.*,user_profile.*');
			$this->db->from('users');
			$this->db->join('user_profile', 'user_profile.user_id = users.id');
			$query=$this->db->where('id',$id)->get();
			$data=$query->row_array();
			$data['statelist'] = $this->Administrator_Model->fetch_state_by_country($data['country']);
			return $data;
 
		}
		public function change_password($new_password){

			$data = array(
				'password' => md5($new_password)
			    );
			$this->db->where('id', $this->session->userdata('user_id'));
			return $this->db->update('users', $data);
		}

		public function match_old_password($password)
		{
			$id = $this->session -> userdata('user_id');
			if($id === FALSE){
				$query = $this->db->get('users');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('users', array('password' => $password));
			return $query->row_array();

		}

		// function start fron forget password

		public function email_exists(){
    $email = $this->input->post('email');
    $query = $this->db->query("SELECT email, password FROM users WHERE email='$email'");    
    if($row = $query->row()){
        return TRUE;
    }else{
        return FALSE;
    }
}
public function temp_reset_password($temp_pass){
    $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$temp_pass);
                $email = $data['email'];

    if($data){
        $this->db->where('email', $email);
        $this->db->update('users', $data);  
        return TRUE;
    }else{
        return FALSE;
    }

}
public function is_temp_pass_valid($temp_pass){
    $this->db->where('reset_pass', $temp_pass);
    $query = $this->db->get('users');
    if($query->num_rows() == 1){
        return TRUE;
    }
    else return FALSE;
}


/*********** Get Role Date****************/

function get_role(){
 
   $ids = array(1,5,6);
	$query = $this->db->where_not_in('role_id',$ids)->get('role');
	//echo $this->db->last_query();
	//die();
	return $query->result_array(); 
	//$result = $query->result_array();
	//echo "<pre>"; print_r($result); die; 
}



function get_request_role(){
 
   $ids = array(1,2,4,5,6);
	$query = $this->db->where_not_in('role_id',$ids)->get('role');
	//echo $this->db->last_query();
	//die();
	return $query->result_array(); 
	//$result = $query->result_array();
	//echo "<pre>"; print_r($result); die; 
}

function get_franchise(){
 
   //$ids = array(3);
	$query = $this->db->where('role_id',3)->get('users');
	//echo $this->db->last_query();
	//die();
	return $query->result_array(); 
}

function get_role_Sadmin(){
 
   $ids = array(1,2,5,6);
	$query = $this->db->where_not_in('role_id',$ids)->get('role');
	//echo $this->db->last_query();
	//die();
	return $query->result_array(); 
}
function get_user_role($roleid){
 
   
	$query = $this->db->where('role_id',$roleid)->get('role');
    return $query->result_array(); 
}



/* Services Section Start Here*/


public function create_services($uploaded_image)
		{

			$data = array(
				'name' => $this->input->post('name'), 			    
			    'description' => $this->input->post('description'),
			    'short_description' => $this->input->post('short_description'),			   
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('services', $data);
		}

		public function listservice($id = FALSE)
		{
			if($id === FALSE){
				$this->db->order_by('services.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('services');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('services', array('id' => $id));
			return $query->row_array();
		}

		public function update_service_data($uploaded_image){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'name' => $this->input->post('name'), 			    
			    'description' => $this->input->post('description'),
			    'short_description' => $this->input->post('short_description'),
			    'image' => $uploaded_image,
			    'status' => $this->input->post('status')
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('services', $data);
		}


/* Services Section End Here*/


/* Jobs Section Start Here*/


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


	public function create_jobs($job_image){
		if(isset($job_image) && $job_image!=''){ $job_image = $job_image; }else{ $job_image ='noimage.jpg';}
		$user_id = $this->session->userdata('user_id');
		$job_data = array(
			'job_name' => $this->input->post('job_name'), 							 
			'service_id' => $this->input->post('service_id'), 							 
			'keyskills' => $this->input->post('keyskills'), 							 
			'location' => $this->input->post('location'), 							 
			'job_type' => $this->input->post('job_type'), 							 
			'user_id' => $user_id,
			'created_by' => $user_id,
			'job_description' => $this->input->post('job_description'),
			'job_amount' => $this->input->post('job_amount'),						   
			'job_image' => $job_image,						   
			'created_date' => date("Y-m-d H:i:s")

		);
		return $this->db->insert('jobs', $job_data);
	}


		public function listjobs(){
			
			
		$this->db->select('jobs.*,services.name as serviceName');
		$this->db->order_by('jobs.job_id','desc');
		$this->db->join('services', 'services.id = jobs.service_id');
		$query = $this->db->get('jobs');
		return $query->result_array();
		}



/* Jobs Section End Here*/


		public function fetch_country(){
		  $this->db->order_by("name", "ASC");
		  $query = $this->db->get("countries");
		  return $query->result();
		 }

		public function fetch_state($country_id)
		 {
		  $this->db->where('country_id', $country_id);
		  $this->db->order_by('name', 'ASC');
		  $query = $this->db->get('states');
		  $output = '<option value="">Select State</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		  }
		  return $output;
		 }



		public function fetch_city($state_id)
		 {
		  $this->db->where('state_id', $state_id);
		  $this->db->order_by('name', 'ASC');
		  $query = $this->db->get('cities');
		  $output = '<option value="">Select City</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		  }
		  return $output;
		 } 


		function change_role(){
		 
		   $userid = $this->input->post('userid');
		   $roleid = $this->input->post('roles');
			$data = array(
						'role_id' => $roleid
					  
					    );
					$this->db->where('id', $userid);
		   return $this->db->update('users', $data);
		}

		function change_request_role(){
		 
		   $userid = $this->input->post('userid');
		   $frenchid = $this->input->post('frenchid');
		   $roleid = $this->input->post('roles');
			$data = array(
						'role_id' => $roleid,
						'switch_fe_status' => '',
						'franchise_id' => '0',
						'created_by' => $frenchid
					    );
					$this->db->where('id', $userid);
		   $this->db->update('users', $data);
		}


		function viewprofile($id = NULL){
			$id = base64_decode($id);
			$this->db->select('users.*,user_profile.*,role.*,countries.name as countryName,states.name as stateName');
			$this->db->join('role', 'role.role_id = users.role_id');
			$this->db->join('countries', 'countries.id = users.country','left');
			$this->db->join('states', 'states.id = users.state','left');
			$this->db->join('user_profile', 'user_profile.user_id  = users.id','left');
			$query = $this->db->where('users.id',$id)->get('users');
			return $query->row_array();  
		}

	public function get_user_franchise(){
					$this->db->where("role_id", "3");
					$query = $this->db->get('users');
					return $query->result_array();
				}
		
		public function get_selected_franchise(){
			//echo "here"; die;
			$this->db->select('t1.*,t3.username,t3.username');
	     $this->db->from('apply_job as t1');
	     //$this->db->where('t1.id', $id);
	     $this->db->join('users as t3', 't1.user_id = t3.role_id', 'LEFT');
		 
	     $query = $this->db->get();
	     return $query->row_array();
	     //$data = $query->row_array();
		//echo "<pre>"; print_r($data); die;
		}	
		
		public function change_status(){
			$change_data = array(
				//'user_id' => $this->input->post('user_id'),
				'franch_status' => $this->input->post('status'),
			);
			$this->db->where('id', $this->input->post('resume_id'));
			return $this->db->update('apply_job', $change_data);
		}

		public function requeststatus(){
			//$user_id = $this->input->post('id');
			$change_data = array(
				'switch_fe_status' => 1,
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('users', $change_data);
		}


		public function requesttofe(){
			$change_requset_data = array(
				'switch_fe_status' => 2,
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->where('franchise_id', $this->input->post('frenchise_id'));
			return $this->db->update('users', $change_requset_data);
		}

		public function RequesttoSA(){
			$change_requset_data = array(
				'switch_fe_status' => 1,
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->where('franchise_id', $this->input->post('frenchise_id'));
			return $this->db->update('users', $change_requset_data);
		}

		public function getrequest(){
			$this->db->where("switch_fe_status", "1");
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function cserequest(){
			$franchise_id = $this->session->userdata('user_id');
			$this->db->select('users.*,franchise_user.username as franchise_user');
			$this->db->from('users');
			$this->db->join('users as franchise_user','franchise_user.id = users.franchise_id','left');
			$this->db->where('users.franchise_id',$franchise_id);
			$query = $this->db->get();
			return $data = $query->result_array();
		}


		public function cselist(){
			$CSE_id = $this->session->userdata('user_id');
			$this->db->select('users.*,franchise_user.username as franchise_user');
			$this->db->from('users');
			$this->db->join('users as franchise_user', 'franchise_user.id = users.franchise_id','left');
			$this->db->where('users.id',$CSE_id);
			$query = $this->db->get();
			return $data = $query->result_array();
			//echo "<pre>"; print_r($data); die;
		}


		public function assign_resume($resume_id){
				$array_admin_user = array('1','2'); 

				$id = $this->session -> userdata('user_id');
				if (in_array($this->session->userdata('role_id'), $array_admin_user)){ 
				$apply_data = array(
					'french_id' => $this->input->post('user_id'),
					'user_id' => $id,		
				 );
				}
				if ($this->session->userdata('role_id')==3){ 
				$apply_data = array(
					'cse_id' => $this->input->post('user_id'),
					
				 );
				}
				
				$this->db->where('id', $resume_id);
				$this->db->update('apply_job', $apply_data);
								/* Use code to get Single Message using Id */
				$this->db->select('apply_job.title');
				$query = $this->db->where('id',$resume_id)->get('apply_job');
				$resumes = $query->row_array();								
				//echo "<pre>"; print_r($resumes); die;
				$logged_user = $this->session->userdata('user_id');

				$this->db->select('users.username,role.role_name');
				$this->db->join('role', 'role.role_id = users.role_id');
				$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
				$Usernames = $query->row_array();
				 $message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been assigned new Resume <b>'.$resumes['title'].'</b>';


				/* Submitted array to database table */
				$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $this->input->post('user_id'),
				'resume_id' => $this->input->post('resume_id'),
				'message' => $message,
				'created_at' => date("Y-m-d H:i:s")
			 );
				//echo "<pre>"; print_r($notification_data); die;

			return $this->db->insert('notification_message', $notification_data);

	
		}


		public function fetch_franchise_model(){
			
				$id = $this->session -> userdata('user_id');
				$apply_data = array(
					'french_id' => $this->input->post('user_id'),
					'user_id' => $id,
					//'status' => 'active',				
				 );
				
				$this->db->where('id', $this->input->post('resume_id'));
				$this->db->update('apply_job', $apply_data);

				/* Use code to get Single Message using Id */

				$logged_user = $this->session->userdata('user_id');

				$this->db->where("id", "1");
				$query = $this->db->get('messages');
				$data =  $query->row_array();
				$message_id = $data['id']; 
				$message = $data['message']; 
					
				/* Submitted array to database table */
				$notification_data = array(
				'user_id' => $logged_user,
				'french_id' => $this->input->post('user_id'),
				'resume_id' => $this->input->post('resume_id'),
				'status' => '',
				'message' => '#admin '.$message.' #franchise',
				//'message' => '#admin Resume Assigned to #franchise',
				'message_id' => $message_id,
				'created_at' => date("Y-m-d H:i:s")
			 );
				//echo "<pre>"; print_r($notification_data); die;

			return $this->db->insert('notification_message', $notification_data);

	
		}	


		public function fetch_cse_model(){
			$id = $this->session -> userdata('user_id');

				$cse_data = array(
							'cse_id' => $this->input->post('cse_id') 
							
				);
			$this->db->where('id', $this->input->post('resume_id'));
			$this->db->update('apply_job', $cse_data);


			$logged_user = $this->session->userdata('user_id');

			$this->db->where("id", "4");
			$query = $this->db->get('messages');
			$data =  $query->row_array();
			$msg_id = $data['id']; 
			$message = $data['message'];

			$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $this->input->post('cse_id'),
				'resume_id' => $this->input->post('resume_id'),
				'message' => '(Franchise) Resume Assigned to',
				//'message' => '#franchise '.$message.' #cse',
				//'message_id' => $message_id,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);
		}


		public function get_user_cse(){
			$this->db->where("role_id", "4");
			$query = $this->db->get('users');
			return $query->result_array();
		}	


		public function reject_resume($id){
			//echo "<pre>"; print_r($id); die;
			$resume_id = $id;
			$reject_data = array(
				'french_id' => '',
				'franch_status' => '',
				'cse_id' => '',
				'user_id' => ''
			);
			$this->db->where('id',$resume_id);
			$this->db->update('apply_job',$reject_data);
			$logged_user = $this->session->userdata('user_id');

			$this->db->where("id", "3");
			$query = $this->db->get('messages');
			$data =  $query->row_array();
			$message_id = $data['id']; 
			$message = $data['message'];

			$notification_data = array(
				'from_id' => $logged_user,
				'resume_id' => $resume_id,
				//'message' => '#franchise '.$message.'',
				'message' => '(franchise) Resume Rejected',
				'message_id' => $message_id,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);


		}
	


		public function accept_resume($resume_id,$user_id){	
			$to_id = $user_id;
			$accept_data = array(
					'franch_status' => 'accepted',								
				 );
				$this->db->where('id', $resume_id);
				$this->db->update('apply_job', $accept_data);

				$logged_user = $this->session->userdata('user_id');
				
				$this->db->select('apply_job.title,serve.name');
				$this->db->join('services as serve', 'apply_job.service_id = serve.id');
				$query = $this->db->where('apply_job.id',$resume_id)->get('apply_job');
				$accept_data = $query->row_array();
				//echo "<pre>"; print_r($accept_data); die;

				$logged_user = $this->session->userdata('user_id');

				$this->db->select('users.username,role.role_name');
				$this->db->join('role', 'role.role_id = users.role_id');
				$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
				$Usernames = $query->row_array();
				 $message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) Resume has been accepted <b>'.$accept_data['title'].'</b>';

				$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $to_id,
				'resume_id' => $resume_id,
				'message' => $message,
				//'message' => '#franchise '.$message.'',
				//'message_id' => $message_id,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);

		}


		public function get_all_messages(){
			$query = $this->db->get('messages');
			return $query->result_array();
		}

		public function listmessage($id = FALSE)
		{
			if($id === FALSE){
				$this->db->order_by('messages.id', 'DESC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('messages');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('messages', array('id' => $id));
			return $query->row_array();
		}


		public function update_message_data($id){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'message' => $this->input->post('message')
			    );
			//echo "<pre>"; print_r($data); die;
			$this->db->where('id', $id);
			return $this->db->update('messages', $data);
		}

		public function total_message(){
					//$this->db->where("role_id", "2");
					$query = $this->db->get('notification_message');
					return $query->result_array();
				}	

		public function fetch_state_by_country($country_id){
		  $this->db->order_by("name", "ASC");
		  $query = $this->db->where('country_id',$country_id)->get("states");
		  return $query->result();
		 }
	/********************* Edit User Information **************/
		 
		 public function edit_user_info($id){ 
			$user_id = base64_decode($id);
			
			$this->db->select('users.id,users.plain_password,users.franchise_id,users.email,users.username,users.role_id,users.status,users.status,users.country,users.state,users.zipcode,users.register_date,users.created_by,user_profile.*');
			$this->db->order_by('users.id', 'DESC');
			$this->db->join('user_profile', 'user_profile.user_id = users.id');
			$query = $this->db->where('users.id',$user_id)->get("users");
			$data=$query->row_array();
			$data['statelist'] = $this->Administrator_Model->fetch_state_by_country($data['country']);
			return $data;
        }

		
			public function edit_user($id){ 
			$user_id = base64_decode($id);
			
			$userData = array(
							'username' =>$this->input->post('username'),
							'country' =>$this->input->post('country'),
							'state' =>$this->input->post('state'),
							'zipcode' =>$this->input->post('zipcode'),
							'role_id' => $this->input->post('role'),
							'franchise_id' => $this->input->post('franchise'),
							'created_by' => $this->session->userdata('user_id')
						);
						
			if(!empty($this->input->post('password'))){
				
				$userData['password'] = md5($this->input->post('password'));
				$userData['plain_password'] = $this->input->post('password');
			}
			
			$this->db->where('id',$user_id);
			$this->db->update('users', $userData);
			
			$data = array(
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('surname'),
						'gender' => $this->input->post('gender'),
						'dob' => $this->input->post('dob')
						
					  );

				$this->db->where('user_id', $user_id);
			return  $this->db->update('user_profile', $data);
			
		}
		public function user_delete($id){
			 $this->db->where('id', $id)->delete('users');
			return $this->db->where('user_id', $id)->delete('user_profile');
			
		}
		/********** End here *****************/		 


		public function listcontacts(){
			
            $id = $this->session->userdata('user_id');
			$this->db->select('t1.*,t3.username, adminuser.username as assignedby,t4.name as service_name,t5.username as cse_assigned');
	     	$this->db->from('contact_us as t1');
	     	if($this->session->userdata('role_id')==3){ $this->db->where('t1.french_id', $id); }
	     	if($this->session->userdata('role_id')==4){ $this->db->where('t1.cse_id', $id); }			
		    $this->db->join('users as t3', 't1.french_id = t3.id', 'LEFT');
		    $this->db->join('users as adminuser', 't1.assigned_by = adminuser.id', 'LEFT');		    
		    $this->db->join('services as t4', 't1.service_id = t4.id', 'LEFT');
		    $this->db->join('users as t5', 't1.cse_id = t5.id', 'LEFT');		    
		    $query = $this->db->get();
		    return $query->result_array();	
		}	



		public function contactview($id){
		 $this->db->select('t1.*, t2.name as Service_name,t3.username,adminuser.username as assignedby');
	     $this->db->from('contact_us as t1');
	     $this->db->where('t1.id', $id);
	     $this->db->join('services as t2', 't1.service_id = t2.id', 'LEFT');
	     $this->db->join('users as t3', 't1.french_id = t3.id', 'LEFT');
	     $this->db->join('users as adminuser', 't1.assigned_by = adminuser.id', 'LEFT');
	     $query = $this->db->get();	     
		  return $query->row_array();

		}


		public function assign_contact($contact_id){
				$array_admin_user = array('1','2');
				$id = $this->session -> userdata('user_id');
				if (in_array($this->session->userdata('role_id'), $array_admin_user)){ 
				$apply_data = array(
					'french_id' => $this->input->post('user_id'),
					'assigned_by' => $id,
					//'status' => 'active',				
				 );
				}
				if ($this->session->userdata('role_id')==3){ 
				$apply_data = array(
					'cse_id' => $this->input->post('user_id'),
					
				 );
				}
				//echo "<pre>"; print_r($apply_data); die;
				$this->db->where('id',$contact_id);
				$this->db->update('contact_us', $apply_data);

				/* Use code to get Single Message using Id */

				//$logged_user = $this->session->userdata('user_id');

				$this->db->select('contact_us.id,serve.name');
				$this->db->join('services as serve', 'contact_us.service_id = serve.id');
				$query = $this->db->where('contact_us.id',$contact_id)->get('contact_us');
				$contact_data = $query->row_array();								
				//echo "<pre>"; print_r($contact_data); die;
				$logged_user = $this->session->userdata('user_id');

				$this->db->select('users.username,role.role_name');
				$this->db->join('role', 'role.role_id = users.role_id');
				$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
				$Usernames = $query->row_array();
				 $message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been assigned new Service <b>'.$contact_data['name'].'</b>';

					
				/* Submitted array to database table */
				$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $this->input->post('user_id'),
				'contact_id' => $contact_id,
				'message' => $message,
				'created_at' => date("Y-m-d H:i:s")
			 );
				

			return $this->db->insert('notification_message', $notification_data);

	
		}	



		public function assign_message_cse(){
			$id = $this->session -> userdata('user_id');

				$cse_data = array(
							'cse_id' => $this->input->post('cse_id'),
				);

			$this->db->where('id', $this->input->post('message_id'));
			$this->db->update('contact_us', $cse_data);


			$logged_user = $this->session->userdata('user_id');

			$this->db->where("id", "4");
			$query = $this->db->get('messages');
			$data =  $query->row_array();
			$msg_id = $data['id']; 
			$message = $data['message'];

			$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $this->input->post('cse_id'),
				'contact_id' => $this->input->post('message_id'),
				//'message_id' => $msg_id,
				//'message' => '#franchise '.$message.' #cse',
				'message' => 'Service enquiry assigned to ',
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);
		}


		public function accept_message_franchise($message_id,$user_id){	
			$to_user = $user_id;
			$accept_data = array(
					'franch_status' => 'accepted',								
				 );
				$this->db->where('id', $message_id);
				$this->db->update('contact_us', $accept_data);

				$logged_user = $this->session->userdata('user_id');

				$this->db->select('contact_us.id,serve.name');
				$this->db->join('services as serve', 'contact_us.service_id = serve.id');
				$query = $this->db->where('contact_us.id',$message_id)->get('contact_us');
				$contact_data = $query->row_array();	
				$logged_user = $this->session->userdata('user_id');

				$this->db->select('users.username,role.role_name');
				$this->db->join('role', 'role.role_id = users.role_id');
				$query = $this->db->where('id',$this->session->userdata('user_id'))->get('users');
				$Usernames = $query->row_array();
				 $message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) has been accepted service for <b>'.$contact_data['name'].'</b>';

				$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $to_user,
				'contact_id' => $message_id,
				'message' => $message,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);

		}





		public function reject_message_franchise($id){
			//echo "<pre>"; print_r($id); die;
			$message_id = $id;
			$reject_data = array(
				'french_id' => '',
				'franch_status' => '',
				'cse_id' => '',
				'assigned_by' => ''
			);
			$this->db->where('id',$message_id);
			$this->db->update('contact_us',$reject_data);

			$logged_user = $this->session->userdata('user_id');

				$this->db->where("id", "3");
				$query = $this->db->get('messages');
				$data =  $query->row_array();
				$msg_id = $data['id']; 
				$message = $data['message'];


				$notification_data = array(
				'from_id' => $logged_user,
				'contact_id' => $message_id,
				'message' => 'Reject Service Enquiry ',
				//'message' => '#franchise '.$message.'',
				//'message_id' => $msg_id,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data);
			


		}


		public function listAssigneContact(){
			$this->db->select('contact_us.*,users.username as assignedby,frenchuser.username as french_user,cseuser.username as cse_user,t2.name as Service_name');
			$this->db->from('contact_us');
			$this->db->join('users', 'contact_us.assigned_by = users.id', 'LEFT');
			$this->db->join('users as frenchuser', 'contact_us.french_id = frenchuser.id', 'LEFT');
			$this->db->join('users as cseuser', 'contact_us.cse_id = cseuser.id', 'LEFT');
			$this->db->join('services as t2', 'contact_us.service_id = t2.id', 'LEFT');
			$query = $this->db->get();	
			return $query->result_array();
		}


		public function total_admin_notifications(){
			if($this->input->post('postData')==1){
				$notification_array =  array();
				$this->db->order_by("id", "desc");
				$this->db->where("status", "unread");
				$query = $this->db->get('notification_message');
				$result =$query->result_array();
				$counter = count($result);
				$notification_array['counter'] = '<span class="badge" id="notification-count">'.$counter.'</span>';
				$base_url = base_url();
				$html ='<ul class="show-notification" id="notification-data">
						<li>
							<h6>Notifications</h6>
							<label class="label label-danger">New</label>
						</li>';
						$messagecount = 0;
				foreach($result as $notification){
				if(!empty($notification['contact_id'])) {
				$url ='administrator/viewcontact?msg='.$notification['id'].'"';
				}
				else if(($notification['order_id'])) {
				$url ='administrator/orderview/'.base64_encode($notification['order_id']).'"';
				}
				else{
				$url ='administrator/resume?msg='.$notification['id'].'"';

				}
				if($messagecount==5){ break; }
				$ahreflink = $base_url.$url;
				$html .='<li>
				<div class="media">
				<img class="d-flex align-self-center" src="'.$base_url.'admintemplate/assets/images/user.png" alt="Generic placeholder image"><p class="notification-msg"><a onclick="read_notification('.$notification['id'].')" href="'.$ahreflink.'" class="cls-unread">'.$notification['message'].'</a></p></div></div></li>'; 
				$messagecount = $messagecount  +1;
				}
				$html .='</ul>'; 
				$notification_array['notification_data'] = $html; 
				return json_encode($notification_array);
			}else{
				$Role_ID = $this->session->userdata('role_id');
				if($Role_ID==3 || $Role_ID==4){
				$this->db->where("to_id", $this->session->userdata('user_id'));
				}
				$this->db->order_by("id", "desc");
				$this->db->where("status", "unread");
				$query = $this->db->get('notification_message');
				return $result = $query->result_array();
			}
			
		 }

			public function updatestatus($id){
				$message_id = $id;
			$update_data = array(
				'status' => 'read',				
			);
			$this->db->where('id',$message_id);
			return $this->db->update('notification_message',$update_data);
			}


			public function contact_cse_status($status, $contact_id){
				$updatestatus = array(
					'cse_status' => $status
				);
				$this->db->where('id',$contact_id);
				return $this->db->update('contact_us',$updatestatus);
			}

			public function resume_status($status, $resume_id ,$user_id){
				$to_id = $user_id;
				$updatestatus = array(
					'resume_status' => $status
				);
				$this->db->where('id',$resume_id);
				$this->db->update('apply_job',$updatestatus);

				$logged_user = $this->session->userdata('user_id');
				$this->db->select('users.username,role.role_name');
				$this->db->join('role', 'role.role_id = users.role_id');
				$query = $this->db->where('id',$logged_user)->get('users');
				$Usernames = $query->row_array();
				$message ='<b>'.$Usernames['username'].'</b>(<span class="role-class"><b>'.$Usernames['role_name'].'</b></span>) Resume Status <b>'.$status.'</b>';

				$notification_data = array(
				'from_id' => $logged_user,
				'to_id' => $to_id,
				'message' => $message,
				'created_at' => date("Y-m-d H:i:s")
			 );


			return $this->db->insert('notification_message', $notification_data); 


			}
			


			public function listjob($id = FALSE)
			{
				if($id === FALSE){
					$this->db->order_by('jobs.id', 'DESC');
					//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
					$query = $this->db->get('jobs');
					return $query->result_array(); 
				}

				$query = $this->db->get_where('jobs', array('job_id' => $id));
				return $query->row_array();
			}

			public function update_job_data($post_image){
				//$slug = url_title($this->input->post('title'), "dash", TRUE);
				$data = array(
					'service_id' => $this->input->post('service_id'), 			    
					'job_name' => $this->input->post('job_name'),
					'keyskills' => $this->input->post('keyskills'),
					'location' => $this->input->post('location'),
					'job_description' => $this->input->post('job_description'),
					'job_amount' => $this->input->post('job_amount'),
					'job_image' => $post_image,
					'job_type' => $this->input->post('job_type')
					);
				$this->db->where('job_id', $this->input->post('id'));
				return $this->db->update('jobs', $data);
			}
			/********** count User **************************/
		public function total_user(){
			$CSA = 2;
			$FE =3;
			$CSC = 4;
			$Client = 6;
			$array =  array();
			if($CSA==2){
				$this->db->where("role_id", "2");
				$result = $this->db->get('users');
				$customer_support_admin = $result->num_rows();
				$array['Customer_Support_Admin']=$customer_support_admin;
			}
			if($FE==3){
				$this->db->where("role_id", "3");
				$result = $this->db->get('users');
				$customer_support_admin = $result->num_rows();
				$array['Franchise_Executives']=$customer_support_admin;
				//echo "<pre>"; print_r($array['Franchise_Executives']); die;
			}
			if($CSC==4){
				
				$Role_ID= $this->session->userdata('role_id');

				if($Role_ID==3){
					$FE_ID= $this->session->userdata('user_id');
					//echo "<pre>"; print_r($FE_ID); die;
					$this->db->select('id,country,state,')->where("id", $FE_ID); //added id in code
				    $query = $this->db->get('users');
					$query =  $query->row_array();
					//echo "<pre>"; print_r($query); die;
					$stateID = $query['state'];
					$franchiseID = $query['id'];
					$this->db->where("role_id", "4");
					$this->db->where("franchise_id", $franchiseID); // added franchise_id in code
					//$this->db->where("users.state", $stateID);
					$result = $this->db->get('users');
					$customer_support_executives = $result->num_rows();
					$array['Customer_Support_Executives']=$customer_support_executives;
					
				}
				else{
					$this->db->where("role_id", "4");
					$result = $this->db->get('users');
					$customer_support_executives = $result->num_rows();
					$array['Customer_Support_Executives']=$customer_support_executives;
					//echo "<pre>"; print_r($array['Customer_Support_Executives']); die; 
				}
			}
			if($Client==6){
				$Role_ID= $this->session->userdata('role_id');
				//echo "<pre>"; print_r($Role_ID); die;
				if($Role_ID==3){
					$FE_ID= $this->session->userdata('user_id');
					$this->db->select('country,state')->where("id", $FE_ID);
				    $query = $this->db->get('users');
					$query =  $query->row_array();
					$stateID = $query['state'];
					$this->db->where("role_id", "6");
					$this->db->where("users.state", $stateID);
					$result = $this->db->get('users');
					$Client = $result->num_rows();
					$array['Client']=$Client;
					
				}
				else{
					$this->db->where("role_id", "6");
					$result = $this->db->get('users');
					$Client = $result->num_rows();
					$array['Client']=$Client;
				}
			}
			return $array;
		}
		
		/************* Count Apply Job *************************/
		public function total_apply_job(){
			 $id = $this->session->userdata('user_id');
			if($this->session->userdata('role_id')==3){ $this->db->where('french_id', $id); }
			$result = $this->db->get('apply_job');
			return $result->num_rows();
			
		}
		/************* End here*******************/
       public function user_profile_image(){
		$id = $this->session->userdata('user_id');
		$this->db->select('image')->where("user_id", $id);
		$query = $this->db->get('user_profile');
		return $query->row_array();
	   }
      
	  public function user_enabled_disabled(){
		$id = $this->input->post('user_id');  
		$userstatus = $this->input->post('userstatus');  
		if($userstatus=='disabled'){
			$data = array(
					'status' => 0
					);
				
		}
		if($userstatus=='enabled'){
			$data = array(
					'status' => 1
					);
				
		}
		$this->db->where('id', $id);
		$result = $this->db->update('users', $data);
		if($result){ return 1;}
		  
	  }
	  
	public function CreateAppointment(){ 
		
		//echo "<pre>"; print_r($_POST); die;
	$time_Appointment = $this->input->post('AppointmentHours').':'.$this->input->post('AppointmentMintus');
		$data = array(
		'clientName' => $this->input->post('clientName'),
		'businessName' => $this->input->post('businessName'),
		'businessNumber' => $this->input->post('businessNumber'),
		'mobileNumber' => $this->input->post('mobileNumber'),
		'Address' =>$this->input->post('address'),
		'serviceID' => $this->input->post('serviceID'),
		'appointmentDate' =>$this->input->post('appointmentDate'),
		'AppointmentHours' => $time_Appointment,
		'AppointmentTime' => $this->input->post('AppointmentTime'),
		'meetinglocation' =>$this->input->post('meetinglocation'),
		'notes' => $this->input->post('notes'),
		'created_by'=> $this->session->userdata('user_id'),
		'created_date' => date("Y-m-d H:i:s")
		);
		return $this->db->insert('appointment', $data);
	}
	
	public function edit_appointment_info($id){ 
			//$id = base64_decode($id);		
			//$id = $this->input->post('appointment_id');		
			$query = $this->db->where('appointmentID',$id)->get("appointment");
			return $query->row_array();
    		
        }
	
	public function update_appointment_data(){

		
    	$time_Appointment = $this->input->post('AppointmentHours').':'.$this->input->post('AppointmentMintus');
    	//echo "<pre>"; print_r($time_Appointment); die;
		$data = array(
		'clientName' => $this->input->post('clientName'),
		'businessName' => $this->input->post('businessName'),
		'businessNumber' => $this->input->post('businessNumber'),
		'mobileNumber' => $this->input->post('mobileNumber'),
		'Address' =>$this->input->post('address'),
		'serviceID' => $this->input->post('serviceID'),
		'appointmentDate' =>$this->input->post('appointmentDate'),
		'AppointmentHours' => $time_Appointment,
		//'AppointmentMintus' => $this->input->post('AppointmentMintus'),
		'AppointmentTime' => $this->input->post('AppointmentTime'),
		'meetinglocation' =>$this->input->post('meetinglocation'),
		'notes' => $this->input->post('notes'),
		'created_by'=> $this->session->userdata('user_id'),
		'created_date' => date("Y-m-d H:i:s")
		);
		//echo "<pre>"; print_r($data); die;
		$this->db->where('appointmentID', $this->input->post('appointmentID'));
		return $this->db->update('appointment', $data);
    }
	
	
	 public function get_appointment(){
	 	$array_appointment_user = array('1','2');
	 	if(in_array($this->session->userdata('role_id'), $array_appointment_user)){
	 	//if($this->session->userdata('role_id')==1){
		$this->db->select('appointment.*,services.name,users.username,role.*');
		$this->db->join('users', 'users.id = appointment.created_by');
		$this->db->join('services', 'services.id = appointment.serviceID');
		$this->db->join('role', 'role.role_id = users.role_id');
		$query = $this->db->get('appointment');
		return $query->result_array();
		}else{
			$this->db->select('appointment.*,services.name,users.username,role.*');
			$this->db->join('users', 'users.id = appointment.created_by');
			$this->db->join('services', 'services.id = appointment.serviceID');
			$this->db->join('role', 'role.role_id = users.role_id');
			$this->db->where('role.role_id',$this->session->userdata('role_id'));
			//$this->db->where('role.role_id',$this->session->userdata('role_id'));
			$query = $this->db->get('appointment');
			return $query->result_array();
		}
	}
	public function deleteAppointment(){
		$appointmentID = $this->input->post('appointmentID');
		$this->db->where('appointmentID', $appointmentID );
		return $this->db->delete('appointment');
	}
	
	public function team_member(){
		$cse_id = $this->session->userdata('user_id');
		$this->db->select('usersb.email,usersb.username,user_profile.*,usersb.id,franchise_user.username as franchise_user');
		$this->db->join('users as usersb', 'users.state = usersb.state');
		$this->db->join('users as franchise_user', 'franchise_user.id = usersb.franchise_id','left');
		$this->db->join(' user_profile', ' user_profile.user_id = usersb.id');
		$this->db->where('usersb.role_id','4');
		$this->db->where('users.id' ,$cse_id);
		$query=$this->db->get('users');
		return $GetUserState = $query->result_array();
	}
	public function read_notification(){
		$id = $this->input->post('id');
		$data = array('status' => 'read');
		$this->db->where('id', $id);
		return $this->db->update('notification_message', $data);
	
		}
		
	public function total_sale(){
	$this->db->where('order_Status', '5');
    $result = $this->db->get('orders');
   return $result->num_rows();
	
	}
/********** End here *****************/

}