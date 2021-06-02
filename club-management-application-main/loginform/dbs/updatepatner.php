<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');

if(isset($_POST['updatepatner']))
{
    $update_id=$_POST['update_id'];
    $patner_name=$_POST['patner_name'];
    $patner_service=$_POST['patner_service'];


    $query="update patners set patner_name='$patner_name',patner_service='$patner_service' where patner_id='$update_id' ";
    $query_run= mysqli_query($con,$query);
    
    if($query_run)
    {
        echo '<scripts> alert("Data saved"); </scripts>';
        header('Location: patners.php');

    }
    else{
        header('Location: patners.php?e=1');

    }



}
?>