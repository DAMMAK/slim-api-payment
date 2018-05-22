<?php
class PaymentOperation
{
  function __construct()
   {
       require_once dirname(__FILE__) . '/DBConnection.php';
       $db = new DbConnect();
       $this->con = $db->connect();
   }

   function registerUser($name, $email, $pass, $reg_no)
   {
       if (!$this->isUserExist($email)) {
           $password = md5($pass);
           $status ="unauthorized";
           $salt = sha1(rand());
           $salt = substr($salt, 0, 10);
           $unique_id=uniqid('',true);
           $created=date("Y-m-d H:i:s");
           $status ="authorized";
           $stmt = $this->con->prepare("INSERT INTO users(unique_id,name,email,regno,status, encrypted_password, salt, created_at)VALUES('". $unique_id ."', '". $name ."', '". $email ."', '". $reg_no ."', '". $status ."', '". $password ."', '". $salt ."', '". $created ."')");
          // $stmt->bind_param("ssss", $unique_id,$name, $email, $reg_no, $password, $salt,$created,$status );
           if ($stmt->execute())
               return USER_CREATED;
           return USER_CREATION_FAILED;
       }
       return USER_EXIST;
   }
   function getUserByEmail($email)
  {
           $stmt = $this->con->prepare("SELECT * FROM users WHERE email = ?");
           $stmt->bind_param("s", $email);
           $stmt->execute();
           $result =$stmt->get_result();
           $user= array();
           while($row = $result->fetch_object()){
               array_push($user, $row);
           }

           return $user;
  }
  function getAllUsers(){
          $stmt = $this->con->prepare("SELECT * FROM users");
          $stmt->execute();
          $result =$stmt->get_result();
          $users = array();
          while($row = $result->fetch_object()){
              array_push($users, $row);
          }
          return $users;
      }

  function isUserExist($email)
   {
       $stmt = $this->con->prepare("SELECT * FROM users WHERE email = ?");
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $stmt->store_result();
       return $stmt->num_rows > 0;
   }

   //Method for user login
      function userLogin($email, $pass)
      {
          $password = md5($pass);
          $stmt = $this->con->prepare("SELECT * FROM users WHERE email = ? AND encrypted_password = ?");
          $stmt->bind_param("ss", $email, $password);
          $stmt->execute();
          $stmt->store_result();
          return $stmt->num_rows > 0;
      }


}

?>
