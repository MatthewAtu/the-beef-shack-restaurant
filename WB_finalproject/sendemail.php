<?php 
ini_set();
    if(isset($_POST['email']) && $_POST['email'] != ''){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $subject = "Job Notifications";
            $notificationemail = "You have succesfully signed up to the newsletter and thank you for showing intresst in a career at The beef shack";
            
            $to = $_POST['email'];
            $body = $notificationemail. "\r\n";

            header("Location: careers.html");
            mail($to, $subject, $body);
            
        }
    }

?>