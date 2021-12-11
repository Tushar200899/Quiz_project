<?php
 include('connection.php');
 session_start();
 if(isset($_POST["token"]) && password_verify("class",$_POST['token']))
 {

    $name =test_input($_POST['name']);
    $uid =test_input($_POST['uid']);

      $check = $db->prepare('INSERT INTO cls_details(cname,uid) VALUES(?,?)');
      $data=array($name,$uid);
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