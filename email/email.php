<?

      $mailto="harshkumar283@gmail.com";  //Enter recipient email address here

       $subject = "Test Email";

       $from="info@wowztech.com";          //Your valid email address here

       $message_body = "This is a test email from Webmaster.";

      $send =  mail($mailto,$subject,$message_body,"From:".$from);
   if($send){
       echo "Your email has been sent successfully";
   }else{
	     echo "Not Send Email";
   }

?>
