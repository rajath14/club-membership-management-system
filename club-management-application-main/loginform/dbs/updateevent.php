<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');

if(isset($_POST['updateevent']))
{
    $eid=$_POST['eid'];
    $ename=$_POST['ename'];
    $edate=$_POST['edate'];
    
    $club=$_POST['club_id'];
    $patner=$_POST['patner_id'];


    $query="update events set ename='$ename',edate='$edate',club_id='$club',patner_id='$patner' where eid='$eid' ";
    $query_run= mysqli_query($con,$query);
    
    if($query_run)
    {
        
        header('Location: events.php?u=1');

    }
    else{
        echo '<script> alert("Data Not Saved"); </script>';

    }



}
?>