<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("displayuni",$_POST['token']))
{  
   $check = $db->prepare('SELECT * FROM uni_details');
   $data = array();
   $execute = $check->execute($data);
   ?>
   <table class= "table table-dark table-hover table-bordered">
       <tr>
           <td>id</td>
           <td>University Name</td>
       </tr>
       <?php
       while($datarow = $check->fetch())
       {
        ?>
        <tr>
           <td><?php echo $datarow['uid'] ?></td>
           <td><?php echo $datarow['uname'] ?></td>
       </tr>
         <?php
        }?>
   </table>
 <?php 
}?>