<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getcls",$_POST['token']))
{  
   $uid = $_POST['uid'];
   $check = $db->prepare('SELECT * FROM cls_details where uid = ?');
   $data = array($uid);
   $execute = $check->execute($data);
   ?>
   <select name="Class" id="class" style="width:100%;color:#000;height:34px;" >
       <?php
       while($datarow = $check->fetch())
       {
           ?>
           <option value="<?php echo $datarow['cls_id'];?>"> <?php echo $datarow['cname'];?> </option>
         <?php
        }?>
   </select>
 <?php 
}?>