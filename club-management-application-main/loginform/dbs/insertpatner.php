<?php

$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');
$clubname=$_POST['patner_name'];
$items="select * from patners where patner_name='$clubname'";
$item_run=mysqli_query($con,$items);
if(mysqli_num_rows($item_run)>0){
    
    $_SESSION=['status'];
    
    header('Location: patners.php?success=1');
    
}
else{

    if(isset($_POST['insertpatner']))
    {
        $patner_name=$_POST['patner_name'];
        $patner_service=$_POST['patner_service'];


        $query="insert into patners (patner_name,patner_service) values ('$patner_name','$patner_service')";
        $query_run= mysqli_query($con,$query);
        
        if($query_run)
        {
            header('Location: patners.php?s=1');

        }
        else{
            header('Location: patners.php?e=1');
            

        }



    }
}
?>