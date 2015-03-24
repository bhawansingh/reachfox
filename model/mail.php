<?php 
class mail{
	
	public static function sendMail($to,$subject,$message){
		mail($to, $subject, $message,
        "From: no-reply@reachfox.com" . "\r\n" . "Content-Type: text/plain; charset=utf-8",
        "-f bhawan@codezyn.com");
	}	

}

?>