<?php 
require 'vendor/autoload.php';

class SendEmail{
    public static function SendMail($to,$subject,$content){
        $key='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';
        $email= new \SendGrid\Mail\Mail();
        $email->setFrom("waynethomas098@gmail.com","Wayne Williams");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain");

        $sendgrid= new \SendGrid($key);
        try{
            $response=$sendgrid->send($email);
            return $response;
            }
            catch(Exception $e){
            echo 'Email exception Caught :' . $e->getMessage. "\n";
            return false;
            }
    
    }
    
    }

?>