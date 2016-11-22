<?php
class SiteController{
    public function actionIndex() {
        require_once (ROOT.'/views/site/index.php'); 
        return true;
    }
    public function actionFeedback() {
        $result=false;
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $subject=$_POST['subject'];
            $text=$_POST['text'];
            $errors=false;
            if(!User::checkEmail($email)){
                $errors[]='Некоректный емейл';
            }
            if($errors==false){
                $adminEmail='ani-ani@i.ua';
                $message="Text: {$text}. From {$email}";
                //$result=mail($adminEmail, $subject, $message);
                $result=true;
            }
            
        }
        require_once (ROOT.'/views/site/feedback.php'); 
        return true;
    }
    
}

