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
    <h1>CLUB MEMBERSHIP MANAGEMENT SYSTEM</h1>
	

    
	<div class = "container">
    <div class = "col-md-12 well">
	
			<div class="card-body">
			<button type = "button" class = "btn btn-success"  data-bs-toggle="modal" data-bs-target="#addgroupmodal">Add member</button>
			<a class = "btn btn-success"  href = "clubs.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
			</div>
			<br/>
			<br/>
			<div class = "alert alert-info">
			<?php
				$con=mysqli_connect("localhost","prajwal","pra@123");
				$db=mysqli_select_db($con,'lol');
				$c_query = $con->query("SELECT * FROM clubs WHERE club_id = '$_REQUEST[club_id]'") or die(mysqli_error());
				$c_fetch = $c_query->fetch_array();
				$club = $c_fetch['club_id'];
			?>
				<div class = "alert alert-success"><?php echo $c_fetch['club_name']?> / Member List</div>
			    <table id="datatableid" class="table table-bordered table-dark table-hover">
					<thead>
						<tr>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
							$query = $con->query("SELECT * FROM groups NATURAL JOIN members NATURAL JOIN clubs WHERE club_id = '$club'") or die(mysqli_error());
							while($f_query= $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $f_query['firstName']?></td>
							<td><?php echo $f_query['lastName']?></td>
							<td><center><a  href = "deletegroup.php?group_id=<?php echo $f_query['group_id']?>&club_id=<?php echo $f_query['club_id']?>" class = "btn btn-danger"><span class = "glyphicon glyphicon-trash"></span> Remove</a></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			
		</div>
	</div>
	</div>



	<!-- ADD Modal -->
	
<!--###################################################################--> 
	
	
<div class="modal fade" id="addgroupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Club Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="insertgroup.php" method="POST">
						<div class = "form-group">
							<label>Member</label>
							<select name="mem_id" class = "chosen-select">
								<option value = "">Select a member</option>
								<?php
									$con=mysqli_connect("localhost","prajwal","pra@123");
									$db=mysqli_select_db($con,'lol');
									
									$g_query = $con->query('SELECT * FROM members') or die(mysqli_error());
									while($g_fetch = $g_query->fetch_array()){
										echo '<option value = "'.$g_fetch['mem_id'].'">'.$g_fetch['firstName'].' '.$g_fetch['lastName'].'</option>';
									}
								?>
							</select>
							<input type = "hidden" name="club_id" value = "<?php echo $club?>" />
						</div>
						
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="insertgroup" class="btn btn-primary">Save Data</button>
				</div>
					</form>
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
	<script type = "text/javascript">
	$('.chosen-select').chosen({width: "100%"});
    </script>
	 
	 
	</body>
</html>