<?php
// session_start();

   if(isset($_POST['btn-send'])){
    //   echo'working';
    $username = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $textmsg = $_POST['textmsg'];

    if(empty($username) || empty($email) ||empty($subject) || empty($textmsg) ){
        header('location:contact_login.php?error');
    }else{
        $to = "princemahato1211@gmail.com";
        if(mail($to,$subject,$msg,$email)){
            header('location:contact_login.php?success');
        }
    }
   }
   else{
    header("location:contact_login.php");
   }


?>