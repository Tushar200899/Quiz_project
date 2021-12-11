<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("displayteacher",$_POST['token']))
{
$query=$db->prepare('SELECT * FROM teachers JOIN cls_details ON teachers.cls_id=cls_details.cls_id
JOIN uni_details ON cls_details.uid=uni_details.uid;');
$data=array();
$execute=$query->execute($data);
?>
<table class= "table table-dark table-hover table-bordered">
<tr>
<td>SR. NO.</td>
<td>NAME</td>
<td>CLASS</td>
<td>UNIVERSITY</td>
<td>DELETE</td>
</tr>
<?php
$srno=1;
while($datarow=$query->fetch())
{
?>
<tr>
<td><?php echo $srno ?></td>
<td><?php echo $datarow['name'] ?></td>
<td><?php echo $datarow['cname'] ?></td>
<td><?php echo $datarow['uname'] ?></td>
<td><button onclick="deleted('<?php echo $datarow['id']?>');" class="btn btn-danger">DELETE</button></td>
</tr>
<?php
$srno++;
}
?>
</table>
<?php
}
?>