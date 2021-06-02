<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');


if(isset($_POST['updatemember']))
{
    
    
   
    $mem_id=$_POST['mem_id'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];


    $query="update members set firstName='$firstName',lastName='$lastName',email='$email' where mem_id='$mem_id' ";
    $query_run= mysqli_query($con,$query);
        
    if($query_run)
    {
        echo '<scripts> alert("Data saved"); </scripts>';
         header('Location: members.php');

    }
    else{
        echo '<script> alert("Data Not Saved"); </script>';

    }
    



}
?>