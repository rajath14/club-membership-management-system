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
          <li class="active"><a href="clubs.php">Clubs</a></li>
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
  echo '<script> alert("Club Name Already exists"); </script>';
  
}



            
 ?>
 <?php 
  
  if ( isset($_GET['s']) && $_GET['s'] == 1 )
{
  echo '<script> alert("Club Added Successfully"); </script>';
  
}



            
 ?>
    
 <!-- ADD Modal -->
 <div class="modal fade" id="clubaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD CLUB DETAILS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="insertclub.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
        <label>Club's Name</label>
        <input type="text" name="club_name" class="form-control" placeholder="ENTER CLUB NAME" required>
        </div>
        <div class="form-group">
        <label>Club Type</label>
        <input type="text" name="club_type" class="form-control" placeholder="ENTER TYPE OF CLUB" required>
        </div>
          
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="insertclub" class="btn btn-primary">Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--###################################################################--> 
<!--###################################################################-->
<! EDIT POP UP FORM>

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT Club Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updateclub.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="club_id" id="club_id">
        <div class="form-group">
        <label>Club's Name</label>
        <input type="text" name="club_name" id="club_name" class="form-control" placeholder="Enter Club's name" required>
        </div>
        <div class="form-group">
        <label>Club Type</label>
        <input type="text" name="club_type" id="club_type" class="form-control" placeholder="Enter Club Type" required>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updateclub" class="btn btn-primary">Update Data</button>        
      </div>
      </form>
    </div>
  </div>
</div>    
    
<!--###############################################################-->   
<! DELETE POP UP FORM>

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE Club Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="deleteclub.php" method="POST">
      <div class="modal-body">
      <input type="hidden" name="did" id="did">
        <h4> Do you want to delete this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" name="deleteclub" class="btn btn-primary">Yes!! Delete it</button>        
      </div>
      </form>
    </div>
  </div>
</div>    
    
<!--###############################################################--> 
    
    
    
    
    
    
    
    
    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2 class="p-3 mb-2 bg-dark text-white"><center>CLUBS</center></h2>
            </div>
            <div class="card">
                <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clubaddmodal">
                    ADD DATA
                </button>              
                </div>            
            </div>
            <div class="card">
              <div class="card-body">
                <?php
                      $con=mysqli_connect("localhost","prajwal","pra@123");
                      $db=mysqli_select_db($con,'lol');



                      $query="SELECT * FROM clubs";
                      $query_run=mysqli_query($con,$query);
              ?>      
                <table id="dataid" class="table table-bordered table-dark table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Club ID</th>
                      <th scope="col">Club Name</th>
                      <th scope="col">Type of Club</th>
                      <th scope="col">Member's list</th>
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
                      <td><?php echo $row['club_id']; ?></td>
                      <td><?php echo $row['club_name']; ?></td>
                      <td><?php echo $row['club_type']; ?></td>
                      <td> 
                      <a href="groups.php?club_id=<?php echo $row['club_id']; ?>"><button  type="button" class="btn btn-info"> Member's List</button></a>
                      </td>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
      $('#dataid').DataTable();
      } );
    
    
    </script>
    <script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
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

            $('#club_id').val(data[0]);
            $('#club_name').val(data[1]);
            $('#club_type').val(data[2]);

      
        });


      });

    </script>
    
    
    
    </body>
</html>