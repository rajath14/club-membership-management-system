<html lang = "eng">
	<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	</head>

    <body>
    <header>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="members.php">Members</a></li>
          <li><a href="clubs.php">Clubs</a></li>
          <li><a href="patners.php">Partners</a></li>
          <li><a href="events.php">Events</a></li>
          <li style="float:right"><a href="../login.html">Log Out</a></li>
        </ul>
      </nav>
    </header>
    <h1><center>CLUB MEMBERSHIP MANAGEMENT SYSTEM</center></h1>
    <?php 
  
  if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
  echo '<script> alert("Event already exists"); </script>';
  
}



            
 ?>
 <?php 
  
  if ( isset($_GET['s']) && $_GET['s'] == 1 )
{
  echo '<script> alert("Event created"); </script>';
  
}



            
 ?>
 <?php 
  
  if ( isset($_GET['u']) && $_GET['u'] == 1 )
{
  echo '<script> alert("Event updated"); </script>';
  
}



            
 ?>
    <!--Form Modal -->
    <div class="modal fade" id="eventaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="insertevent.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
        <label>Event Name</label>
        <input type="text" name="ename" class="form-control" placeholder="Enter Event Name" required>
        </div>
        <div class="form-group">
        <label>Event Date</label>
        <input type="date" name="edate" class="form-control" placeholder="Enter Event Date" required>
        </div>
        <label>Clubs</label>
        
        <select name="club_id" class = "form-select">
								<option value = "">Select Club organizing the event</option>
								<?php
									$con=mysqli_connect("localhost","prajwal","pra@123");
									$db=mysqli_select_db($con,'lol');
									
									$g_query = $con->query('SELECT * FROM clubs') or die(mysqli_error());
									while($g_fetch = $g_query->fetch_array()){
										echo '<option value = "'.$g_fetch['club_id'].'">'.$g_fetch['club_name'].'</option>';
									}
								?>
							</select>
              <label>Partner</label>
              <select name="patner_id" class = "form-select">
								<option value = "">Select Club organizing the event</option>
								<?php
									$con=mysqli_connect("localhost","prajwal","pra@123");
									$db=mysqli_select_db($con,'lol');
									
									$g_query = $con->query('SELECT * FROM patners') or die(mysqli_error());
									while($g_fetch = $g_query->fetch_array()){
										echo '<option value = "'.$g_fetch['patner_id'].'">'.$g_fetch['patner_name'].'</option>';
									}
								?>
							</select>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertevent" class="btn btn-primary">Save Data</button>        
      </div>
      </form>
    </div>
  </div>
</div>
<!--###################################################################-->
<! EDIT POP UP FORM>

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT Event Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updateevent.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="eid" id="euid">
        <div class="form-group">
        <label>Event's Name</label>
        <input type="text" name="ename" id="ename" class="form-control" placeholder="Enter Event's name" required>
        </div>
        <div class="form-group">
        <label>Event's date</label>
        <input type="date" name="edate" id="edate" class="form-control" placeholder="Enter Event Date" required>
        </div>
        <select name="club_id" class = "form-select">
								<option value = "">Select Club organizing the event</option>
								<?php
									$con=mysqli_connect("localhost","prajwal","pra@123");
									$db=mysqli_select_db($con,'lol');
									
									$g_query = $con->query('SELECT * FROM clubs') or die(mysqli_error());
									while($g_fetch = $g_query->fetch_array()){
										echo '<option value = "'.$g_fetch['club_id'].'">'.$g_fetch['club_name'].'</option>';
									}
								?>
							</select>
              <label>Partner</label>
              <select name="patner_id" class = "form-select">
								<option value = "">Select Club organizing the event</option>
								<?php
									$con=mysqli_connect("localhost","prajwal","pra@123");
									$db=mysqli_select_db($con,'lol');
									
									$g_query = $con->query('SELECT * FROM patners') or die(mysqli_error());
									while($g_fetch = $g_query->fetch_array()){
										echo '<option value = "'.$g_fetch['patner_id'].'">'.$g_fetch['patner_name'].'</option>';
									}
								?>
							</select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updateevent" class="btn btn-primary">Update Data</button>        
      </div>
      </form>
    </div>
  </div>
</div>    
    
<!--###############################################################-->
<!--###################################################################-->
<! DELETE POP UP FORM>

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE Event Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="deleteevent.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="did" id="did">
        <h4> Do you want to delete this data?</h4>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" name="deleteevent" class="btn btn-primary">Yes!! Delete it</button>        
      </div>
      </form>
    </div>
  </div>
</div>    
    
<!--###############################################################-->


    <div class="container" class="p-3 mb-2 bg-warning text-dark">
        <div class="jumbotron">
            <div class="card">
                <h2 class="p-3 mb-2 bg-dark text-white"> <center>EVENTS</center></h2>
            </div>
            <div class="card">
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eventaddmodal">
                    ADD DATA
                </button>              
                </div>

                <?php
                      $con=mysqli_connect("localhost","prajwal","pra@123");
                      $db=mysqli_select_db($con,'lol');



                      $query="CALL `geteventinfo`();";
                      $query_run=mysqli_query($con,$query);
              ?>      
                <table id="datatableid" class="table table-bordered table-dark table-hover">
                  <thead>
                    <tr>
                    <th scope="col">ID</th>
                      <th scope="col">Event Name</th>
                      <th scope="col">Event Date</th>
                      <th scope="col">Club</th>
                      <th scope="col">Partners</th>
                      <th scope="col">EDIT</th>
                      <th scope="col">DELETE</th>
                      
                    </tr>
                  </thead>
                  <?php        
                      if($query_run)
                      {
                        foreach($query_run as $row)
                        {
                  ?>   


                  <tbody>
                    <tr>
                      <td><?php echo $row['eid']; ?> </td>
                      <td><?php echo $row['ename']; ?></td>
                      <td><?php echo $row['edate']; ?></td>
                      <td><?php echo $row['club_name']; ?></td>
                      <td><?php echo $row['patner_name']; ?></td>
                      <td> 
                          <button type="button" class="btn btn-success editbtn">EDIT</button>
                      </td> 
                      <td> 
                          <button type="button" class="btn btn-danger deletebtn">Delete</button>
                      </td> 

                    </tr>
                  </tbody>
                  <?php            

                        }
                      }
                      else
                      {
                        echo "No Record Found";
                      }
                ?>
                
                </table>    
              </div>            
            </div>
            
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
      $('#datatableid').DataTable();
      } );
    
    
    </script>


    <script>

      $(document).ready(function(){
        $('.deletebtn').on('click',function() {
          $('#deletemodal').modal('show');

            $tr=$(this).closest('tr');

            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#did').val(data[0]);
            

      
        });


      });

    </script>
    
    
    
    
    <script>

      $(document).ready(function(){
        $('.editbtn').on('click',function() {
          $('#editmodal').modal('show');

            $tr=$(this).closest('tr');

            var data = $tr.children("td").map(function(){
              return $(this).text();
              
            }).get();

            console.log(data);

            $('#euid').val(data[0]);
            $('#ename').val(data[1]);
            $('#edate').val(data[2]);

      
        });


      });

    </script>
    </body>
</html>