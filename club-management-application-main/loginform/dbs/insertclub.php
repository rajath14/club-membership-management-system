<script src="js/sweetalert.min.js"></script>
<?php
$error='';
$con=mysqli_connect("localhost","prajwal","pra@123");
$db=mysqli_select_db($con,'lol');
$clubname=$_POST['club_name'];
$items="select * from clubs where club_name='$clubname'";
$item_run=mysqli_query($con,$items);
if(mysqli_num_rows($item_run)>0){
    header('Location: clubs.php?success=1');
    
}
else{

        if(isset($_POST['insertclub']))
        {
            $clubname=$_POST['club_name'];
            $clubtype=$_POST['club_type'];
            
        
            $query="insert into clubs (club_name,club_type) values ('$clubname','$clubtype')";
            $query_run= mysqli_query($con,$query);
            
            if($query_run)
            {
                echo '<script> alert("Data saved\nClub added successfully"); </script>';
                
                header('Location: clubs.php?s=1');

            }
            else{
                echo '<a href="clubs.php"><script> alert("Data Not Saved"); </script></a>';
                

            }



        }
    
}   
?>