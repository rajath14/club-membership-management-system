<?php
    
$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');
$memname=$_POST['mem_id'];
$club_id = $_POST['club_id'];
$items="select * from groups where club_id='$club_id' and mem_id='$memname'";
$item_run=mysqli_query($con,$items);
if(mysqli_num_rows($item_run)>0){
    
    
    
    header("location: groups.php?club_id=".$club_id."");
    
}
else{
    if(isset($_POST['insertgroup']))
    {
        
        $club_id = $_POST['club_id'];
        $mem_id = $_POST['mem_id'];


        $query="insert into groups(club_id,mem_id) VALUES('$club_id', '$mem_id')";
        $query_run= mysqli_query($con,$query);
        
        if($query_run)
        {
            echo '<script> alert("Data saved");</script>';
            header("location: groups.php?club_id=".$club_id."");
            

        }
        else{
            echo '<script> alert("Data Not Saved"); </script>';

        }


    }
}
