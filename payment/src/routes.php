<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// $app->get('/user/', function($request,$response,$args)
// {
//   $data = $this->db->prepare("SELECT * FROM user");
//   $data->execute();
//   $user=$data->fetchAll();
//   return $this->response->withJson($user);
//
// });
//
// $app->get('/users/', function($request, $response, $args)
// {
//   $data = $this->db->prepare("SELECT * FROM users");
//   $data->execute();
//   $users= $data->fetchAll();
//   return $this->response->withJson($users);
//
// });
//
// //Get Login in User / Login User IntlChar
// $app->get('/login/{email}/{password}', function($request, $response, $args)
// {
//   $email =$request->getAttribute('email');
//   $password= $request->getAttribute('password');
//   $status='authorized';
// $data = $this->db->prepare("SELECT * FROM users WHERE email='". $email ."' AND status='". $status ."'");
// $data->execute();
// $user_data=$data->fetchObject();
// $salt = $user_data -> salt;
// $db_encrypted_password = $user_data -> encrypted_password;
// $hash=getHash($password);
// $encrypted_password = $hash["encrypted"];
// // $result_data;
// // $result_data=$user_date;
// // $result_data['response']="success";
//  $error= array('status' => 'failure');
// if($db_encrypted_password!=$encrypted_password)
// {
// return $this->response->withJson($user_data);
// }
// else {
//   return $this->response->withJson($error);
// }
//
//
//
// });
//
//
// //Create User known as Administrator Account
// $app->post('/createuser', function($request,$response)
// {
// try{
//   $input =$request->getParsedBody();
//   $password = password_hash($input['password'], PASSWORD_DEFAULT);
//   $firstname =$input['firstname'];
//   $lastname = $input['lastname'];
//   $username = $input['username'];
//   //$password = password_hash($input['password'], PASSWORD_DEFAULT);
//
//  $query = $this->db->prepare("INSERT INTO user(firstname,lastname,username,password)VALUES('". $firstname ."','". $lastname . "', '". $username ."', '". $password ."')");
//
//  $query->execute();
//
//   return $response->withJson(array('status' => $input), 200);
// }
// catch(Exception $ex)
// {
//     return $response->withJson(array('error' => $ex->getMessage()),422);
// }
//
// });
//
//
// // Create Users also known as Member/User
// $app->post('/createusers/', function($request,$response)
// {
// try{
//   $input =$request->getParsedBody();
//   $name =$input['name'];
//   $email =$input['email'];
//   $reg_no=$input['reg_no'];
//   $created=date("Y-m-d H:i:s");
//   $status ="authorized";
//   $unique_id=uniqid('',true);
//    $hash=getHash($input['password']);
//    $encrypted_password = $hash["encrypted"];
//    $salt = $hash["salt"];
//
//  $query = $this->db->prepare("INSERT INTO users(unique_id,name,email,regno,status, encrypted_password, salt, created_at)VALUES('". $unique_id ."', '". $name ."', '". $email ."', '". $reg_no ."', '". $status ."', '". $encrypted_password ."', '". $salt ."', '". $created ."')");
//
//  $q=$query->execute();
//  if($q){
//      // $response=array("error" => false,
//      //                 "message" => "Registration Successful",
//      //                 "user" => $input
//      //                 );
//   return $response->withJson(array("error" => false,
//                   "message" => "Registration Successful",
//                   "user" => $input
//                   ), 200);
//  }
// }
// catch(Exception $ex)
// {
//     // $response= array("error" => true,
//     //                  "message" => "Registration Fail",
//     //                  "user" => $input);
//     return $response->withJson(array("error" => true,
//                      "message" => "Registration Fail",
//                      "user" => $input),422);
// }
//
// });
//
// function getHash($password) {
//
//      $salt = sha1(rand());
//      $salt = substr($salt, 0, 10);
//      $encrypted = password_hash($password.$salt, PASSWORD_DEFAULT);
//      $hash = array("salt" => $salt, "encrypted" => $encrypted);
//
//      return $hash;
//
// }
