<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest", $_POST['token']))
{
        $query=$db->prepare('SELECT * FROM test_details');

        $data=array();

        $execute=$query->execute($data);
?>
<select name="test" id="test" class="form-control">
    <option value="0">SELECT TEST NAME</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['test_id'];?>"><?php echo $datarow['testname']?></option>
    <?php } ?>
</select>
<?php

    }

?>