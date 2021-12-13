<?php
 include('connection.php');
 session_start();
 if(isset($_POST["token"]) && password_verify("test",$_POST['token']))
 {

    $name =test_input($_POST['name']);
    $uid =test_input($_POST['uid']);
    $classid =test_input($_POST['classid']);

      $check = $db->prepare('INSERT INTO test_details(testname,uid,class_id) VALUES(?,?,?)');
      $data=array($name,$uid,$classid);
      $execute= $check->execute($data);
      if($execute)
      {
          echo 0 ;
      }
      else{
          echo 2;
      }
 }
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>