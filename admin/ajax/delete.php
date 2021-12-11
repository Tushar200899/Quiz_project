<?php
 include('connection.php');
 session_start();
 if(isset($_POST["token"]) && password_verify("deleteteaher",$_POST['token']))
 {

    $id =test_input($_POST['i']);


    $query = $db->prepare('DELETE FROM teachers WHERE id=?');
    $data = array($id);
    $execute =  $query->execute($data);
      if($execute)
      {
          echo 0 ;
      }
      else{
          echo 3;
      }
 }
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>