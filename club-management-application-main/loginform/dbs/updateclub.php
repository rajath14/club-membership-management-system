<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');

if(isset($_POST['updateclub']))
{
    $club_id=$_POST['club_id'];
    $club_name=$_POST['club_name'];
    $club_type=$_POST['club_type'];
    $clubname=$_POST['club_name'];
    

    $query="update clubs set club_name='$club_name',club_type='$club_type' where club_id='$club_id' ";
    $query_run= mysqli_query($con,$query);
    
    if($query_run)
    {
        echo '<scripts> alert("Data saved"); </scripts>';
        header('Location: clubs.php');

    }
    else{
        echo '<script> alert("Data Not Saved"); </script>';

    }

  

}
?>