<?php

require_once 'includes/constants.php';

class Mysql {
    
    private $connection;
    
    function __construct() {
        $this->connection = new mysqli (DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
                      die('There was a problem connecting to the database.');
    }
    
    function verify_email_and_password($email, $password) {
        
       
     
        $query = "SELECT *
                    FROM members 
                    WHERE email = ? AND password = ?";
                    
                      
                    
        
        //the prepare function returns a STATEMENT OBJECT OR FALSE if an error occurred.
        //Since the echo statement inside the if statement doesn't run, that means $statement is being assigned false.
        if($statement = $this->connection->prepare($query)) {
            $statement->bind_param('ss', $email, $password);
            $statement->execute();
            $fetch = $statement->fetch();
    
            if($fetch) {
                $statement->close();
                return true;
            }
        }
    }
    
    function verify_email($email) {
        
        $query = "SELECT *
                    FROM members 
                    WHERE email = ?";
                    
                      
                    
        
        //the prepare function returns a STATEMENT OBJECT OR FALSE if an error occurred.
        //Since the echo statement inside the if statement doesn't run, that means $statement is being assigned false.
        if($statement = $this->connection->prepare($query)) {
            $statement->bind_param('s', $email);
            $statement->execute();
            $fetch = $statement->fetch();
    
            if($fetch) {
                $statement->close();
                return false;
            } else{
                return true;
            }
        }
    }
    
    function put_user_in_db($firstname, $lastname, $email, $password, $birthmonth, $birthday, $birthyear, $gender) {
        
       
     
        $query = "INSERT INTO members
                        (
                            firstname,
                            lastname,
                            email,
                            password,
                            birthday,
                            gender
                        )
                    VALUES (?,?,?,?,?,?)";
                    
        $birthtime = $birthyear . "-" . $birthmonth . "-" . $birthday;
                    
        
        //the prepare function returns a STATEMENT OBJECT OR FALSE if an error occurred.
        //Since the echo statement inside the if statement doesn't run, that means $statement is being assigned false.
        if($statement = $this->connection->prepare($query)) {
            $statement->bind_param('ssssss', $firstname, $lastname, $email, $password, $birthtime, $gender);
            $statement->execute();
            $statement->close();
        }
    }
    
    
    
}