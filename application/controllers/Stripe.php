<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Stripe extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
	   $this->load->model('Payment_Model');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $data['orders'] = $this->Payment_Model->get_orders_by_id();
        $data['paymentamount'] = $this->Payment_Model->get_payment_amount_by_id();
        $data['payment_amount'] = $this->Payment_Model->get_payment_amount();
		
		$this->load->view('administrator/header-script');
		$this->load->view('administrator/header');
		if($this->session->userdata('role_id')==1){$left_bar = 'admin-leftbar';}
		if($this->session->userdata('role_id')==2){$left_bar = 'customer-support-leftbar';}
		if($this->session->userdata('role_id')==3){$left_bar = 'franchise-leftbar';}
		if($this->session->userdata('role_id')==4){$left_bar = 'customer-support-executive-leftbar';}
		$this->load->view('administrator/'.$left_bar);
		$this->load->view('administrator/payment',$data);
		$this->load->view('administrator/footer');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
		
	    $order_id = base64_decode($this->input->post('order_id'));
		if(!empty($this->input->post('milestone_id'))){  $milestone_id = base64_decode($this->input->post('milestone_id')); }
		else{ $milestone_id = '';}
	   
		$data['orders'] = $this->Payment_Model->get_orders_id($order_id);
		$orders = json_decode($data['orders']['order_data']);
		
		$serviceID = $orders->serviceid;
		$planName  = $orders->Title;
		$email  = $orders->Email;
		$nickname  = $orders->Name;
		$interval_count  = $orders->Agreement_length;
		if($orders!=''){
			if($orders->Deposit!=''){
				$amount = $orders->Deposit;
			}else{
				$amount = 0;
			}
		}
		$amount  = $this->input->post('amount');
		require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
		if($serviceID==3){
			$plan = \Stripe\Plan::create(array(
		"product" => [
			"name" => $planName
		],
		"nickname" => $nickname,
		"interval" => "month",
		"interval_count" => $interval_count,
		"currency" => "EUR",
		"amount" => $amount * 100,
		));
		$customer = \Stripe\Customer::create([
			'email' => $email,
			'source'  =>$this->input->post('stripeToken'),
		]);
		$subscription = \Stripe\Subscription::create(array(
		"customer" => $customer->id,
		"items" => array(
		array(
		"plan" => $plan->id,
		),
		),
		));
		
		$subscriptionJson = $subscription->jsonSerialize();
		 if($subscriptionJson!==''){
		   $this->Payment_Model->add_payment($subscriptionJson,$amount); 
		    $orderID = base64_encode($order_id);		   
          redirect('administrator/orderview/'. $orderID);	   
		} 
			
		}
		//if($serviceID==2 || $serviceID==14){
			else {
			  $charge = \Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "EUR",
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment from Wowztech.com" ,
				 "metadata" => array("order_id" =>$order_id,'carduserName' => $this->input->post('userName'),'milestone_id' =>$milestone_id)
				]);
			   $chargeJson = $charge->jsonSerialize();
			 //  echo "<pre>"; print_r($chargeJson); die;
				   // echo "<pre>"; print_r(response); die;
			   // $this->session->set_flashdata('success', 'Payment made successfully.');
			   if($chargeJson!==''){
				   $this->Payment_Model->add_payment($chargeJson,$amount); 
				   //redirect('administrator/orderview/'.$this->input->post('order_id'));	
				   $orderID = base64_encode($order_id);	
					$this->session->set_flashdata('payment_success', 'Payment has been credited successfully.');				   
				   redirect('administrator/orderview/'. $orderID);		   
			   }  
		}
		
		
		
	    
          
        
    }
}