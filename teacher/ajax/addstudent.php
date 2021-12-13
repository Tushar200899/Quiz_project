<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("student",$_POST['token']))
{
    $name = $_POST['name'];
    $email= $_POST['email'];
    $uid = test_input($_POST['uid']);
    $classid = test_input($_POST['classid']);

    $query = $db->prepare('SELECT * FROM students where email=?');
    $data=array($email);
    $execute=$query->execute($data);
    if($query->rowcount()>0)
    {
        echo"teacher already added";
    }
    else{
        
        $password1_hash=password_hash(substr($name,0,4)."@2021",PASSWORD_DEFAULT);
        $query = $db->prepare('INSERT INTO students(name,email,password,cls_id,uid) VALUES(?,?,?,?,?)');
        $data=array($name,$email,$password1_hash,$classid,$uid);
        $execute=$query->execute($data);
        if($execute)
        {
            echo"student added successfully";
        }
        else{
            echo"wrong input";
        }
    }
}function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
