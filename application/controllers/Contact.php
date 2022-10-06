<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
		
		$this->load->view('templates/header');
		$this->load->view('pages/contactus',$data);
		$this->load->view('templates/footer');
		/*$this->load->view('pages/contactus');*/
	}

	public function conatct_add(){	

			$this->load->config('email');
        	$this->load->library('email');	
			
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');		
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');			

			if($this->form_validation->run() === FALSE){
				$data['pagename'] = str_replace('/parkers','',$_SERVER['REQUEST_URI']);
				$this->load->view('templates/header',$data);
				$this->load->view('pages/contactus',$data);
	  			$this->load->view('templates/footer');			   	
			}else{

				$name = $this->input->post('name');
	            $email = $this->input->post('email');
	            $contact_no = $this->input->post('phone');
	            $subject = $this->input->post('subject');
	            $comment = $this->input->post('message');
	            /*$to = $this->config->item('smtp_user');
					if(!empty($email)) {
                $message='';
                $bodyMsg = '<p style="font-size:14px;font-weight:normal;margin-bottom:10px;margin-top:0;">'.$comment.'</p>';   
                $delimeter = $name."<br>".$contact_no;
                $dataMail = array('topMsg'=>'Hi Team', 'bodyMsg'=>$bodyMsg, 'thanksMsg'=>'Best regards,', 'delimeter'=> $delimeter);
 
                //$this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from($email, $name);
                $this->email->to($to);
                $this->email->subject($subject);
                $message = $this->load->view('pages/emails/ContactTemplate', $dataMail, TRUE);
                $this->email->message($message);
                 if ($this->email->send()) {
			        	$this->session->set_flashdata('success', 'Your Email has successfully been sent.');
			        } else {
			            show_error($this->email->print_debugger());
			        }*/ 
			        $this->Contact_Model->create_contact();

					//Set Message
					$this->session->set_flashdata('success', 'Your service query has been submitted');
					redirect('contactus');
 
            }

					/*$from = $this->config->item('smtp_user');
			        $to = $this->input->post('email');
			        $subject = $this->input->post('subject');
			        //$message = $this->input->post('message');

			        $this->email->set_newline("\r\n");
			        $this->email->from($from);
			        $this->email->to($to);
			        $this->email->subject($subject);
			        $message = $this->load->view('pages/user-emails','',TRUE);
			        $this->email->message($message);
			        if ($this->email->send()) {
			        	$this->session->set_flashdata('success', 'Your Email has successfully been sent.');
			            //echo 'Your Email has successfully been sent.';
			        } else {
			        	//echo "<pre>"; print_r($this->email->print_debugger());
			            show_error($this->email->print_debugger());
			        }*/
				/*$this->Contact_Model->create_contact();

				//Set Message
				$this->session->set_flashdata('success', 'Your Contact Form has been submitted');
				redirect('contactus');*/
			}
		public function home_contact_form(){
		    $to = "harshkumar23@gmail.com";
            $subject = $_POST['form_subject'];
            
            $message ='<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width"/>
    </head>
    <body style="width:100%;height:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#efefef;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;color:#3E3E3E;font-family:Helvetica, Arial, sans-serif;line-height:1.65;margin:0;padding:0;">
            <tr>
                <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                        <tr>
                            <td valign="top" align="center" class="masthead" style="padding:20px 0;background:#03618c;color:white;">
                                <h1 style="font-size:32px;margin:0 auto;max-width:90%;line-height:1.25;">
                                    <a href="<?php echo site_url(); ?>" target="_blank" style="text-decoration:none;color:#ffffff;">PARKERS BUSINESS CONSULTANCY</a>
                                    <p style="margin-bottom:0;line-height:12px;font-weight:normal;margin-top:15px;font-size:18px;"></p>
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="content" style="background:white;padding:20px 35px 10px 35px;">
                                <h4 style="font-size:20px;margin-bottom:10px;line-height:1.25;">Hello Admin,</h4>
                               
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Name:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$_POST["form_name"].'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Email:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$_POST["form_email"].'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Phone No:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$_POST["form_phone"].'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Subject:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$_POST["form_subject"].'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
							<tr>
                            <td valign="top" style="display:block;clear:both;margin:0 auto;max-width:580px;">
                                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;">
                                    <tr>
                                       <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">Message:</p>
                                           
                                       </td>
									    <td valign="top" class="content thanksMsg" style="background:white;padding:10px 35px 20px 35px;">
                                            <p style="font-size:14px;font-weight:normal;margin-top:0;margin-bottom:5px;">'.$_POST["form_message"].'</p>
                                           
                                       </td>
                                    </tr>                                    
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
        </table>
    </body>
</html>';


            
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // More headers
            $headers .= 'From: <harshkumar23@gmail.com>' . "\r\n";
           
            
            $sendmail = mail($to,$subject,$message,$headers);
            if($sendmail){
                echo 1;
            }else{
                echo 0;
            }
		    
		}




}
