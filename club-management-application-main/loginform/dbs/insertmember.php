<?php
    
$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];
$em=$_POST['email'];
$items="select * from members where firstname='$fname' and lastName='$lname'";
$item_run=mysqli_query($con,$items);
$eitems="select * from members where email='$em'";
$eitem_run=mysqli_query($con,$eitems);
if(mysqli_num_rows($item_run)>0){
    
    $_SESSION=['status'];
    
    header('Location: members.php?success=1');
    
}
elseif(mysqli_num_rows($eitem_run)>0){
    
    
    header('Location: members.php?success=1');
}
else{
    if(isset($_POST['insertmember']))
    {
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $email=$_POST['email'];
        $soj=$_POST['soj'];
        
        if($soj=='om'){
            $fees=750;
        }else{
            $fees=1000;
        }


        $query="insert into members (firstName,lastName,email,soj,fees) values ('$firstName','$lastName','$email','$soj',$fees)";
        $query_run= mysqli_query($con,$query);
        
        if($query_run)
        {
            header('Location: members.php?success=2');
            echo '<scripts> alert("Data saved"); </scripts>';

        }
        else{
            echo '<script> alert("Data Not Saved"); </script>';

        }



    }
}
?>