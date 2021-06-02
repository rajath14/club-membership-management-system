<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');
$ename=$_POST['ename'];
$items="select * from events where ename='$ename'";
$item_run=mysqli_query($con,$items);
if(mysqli_num_rows($item_run)>0){
    
    $_SESSION=['status'];
    
    header("location: events.php?success=1");
    
}
else{

    if(isset($_POST['insertevent']))
    {
        $club=$_POST['club_id'];
        $patner=$_POST['patner_id'];
        $ename=$_POST['ename'];
        $edate=$_POST['edate'];


        $query="insert into events (ename,edate,club_id,patner_id) values ('$ename','$edate','$club','$patner')";
        $query_run= mysqli_query($con,$query);
        
        if($query_run)
        {
            echo '<scripts> alert("Data saved"); </scripts>';
            header('Location: events.php?s=1');

        }
        else{
            echo '<script> alert("Data Not Saved"); </script>';

        }



    }
}
?>