<?php

require 'mysql.php';

class member {
    
    function validate_user($email, $password) {
        $mysql = new Mysql(); 
        $ensure_credentials = $mysql->verify_email_and_password($email, hash('sha512', $password));
        
        if($ensure_credentials) {
            $_SESSION['status'] = 'authorized';
            $_SESSION['user'] = $email;
            header("location: home.php");
        }   else return "incorrect email or password";
        
    }
    
    function create_user($firstname, $lastname, $email, $password, $birthmonth, $birthday, $birthyear, $gender) {
        $mysql = new Mysql(); 
        $ensure_email = $mysql->verify_email($email);
        
        if($ensure_email) {
            $mysql->put_user_in_db($firstname, $lastname, $email, hash('sha512', $password), $birthmonth, $birthday, $birthyear, $gender);
            $_SESSION['status'] = 'authorized';
            $_SESSION['user'] = $email;
            header("location: home.php");
        }   else return "email already taken";
        
    }
    
}