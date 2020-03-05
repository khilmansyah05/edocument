<?php 


	function send_mail($email_name, $email_from, $to, $subject, $content, $attach1 = '',$attach2 = '') {
		 $api_key="key-0b06b56ba3fabc0702d15882c423fcff";/* Api Key got from https://mailgun.com/cp/my_account */
		 
		 $domain ="sanjiwanialkes.com";/* Domain Name you given to Mailgun */
		 
		 $send_array = array(
			  'from' => "$email_name <$email_from>",
			  'to' => $to,
			  'subject' => $subject,
			  'html' => $content
		 );
		 
		 if($attach1 != '') {
			 $send_array['attachment[0]'] = '@'.$attach1;
		 }
		 if($attach2 != '') {
			 $send_array['attachment[1]'] = '@'.$attach2;
		 } 
		 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		 curl_setopt($ch, CURLOPT_USERPWD, 'api:'.$api_key);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		 curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/'.$domain.'/messages');
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $send_array);
		 $result = curl_exec($ch);
		 curl_close($ch);
		 return $result;
   }
?>