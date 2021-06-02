<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');

if(isset($_POST['deletepatner']))
{
    $did=$_POST['did'];
    


    $query="delete from patners where patner_id='$did'";
    $query_run= mysqli_query($con,$query);
    
    if($query_run)
    {
        echo '<scripts> alert("Data Deleted"); </scripts>';
        header('Location: patners.php');

    }
    else{
        echo '<script> alert("Data Not Deleted"); </script>';

    }



}
?>