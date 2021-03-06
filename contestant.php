<html>
<head>
	<title>DIS</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom.css" type="text/css">
</head>
<body>
	<nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_home.php">Kids Contest</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class=""><a href="admin_home.php">Add Question</a></li>
                    <li><a href="add_contestant.php">Add Contestant</a></li>
					 <li><a href="admin_question_view.php">View Question</a></li>
					 <li><a href="contestant.php">View Contestant</a></li>
					 <li><a href="ranking.php">Ranking</a></li>
					 <li><a href="logout.php">Logout</a></li>
						
                </ul>

            </div>
        </div>
    </nav>
	
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		
		<form class="form-horizontal" role="form" method="post">
				<h2><b>View Contestant</b></h2>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="email">Choose A Branch</label>
				  <div class="col-sm-8">
					<select name="branch">
					  <option value="Dhanmondi Branch">Dhanmondi Branch</option>
					  <option value="Sobhanbug Branch">Sobhanbug Branch</option>
					  <option value="Uttara Branch">Uttara Branch</option>
					  <option value="Gazipur Branch">Gazipur Branch</option>
					</select>
				  </div>
				</div>
				
				
				<div class="form-group">        
				  <div class="col-sm-offset-4 col-sm-8">
					<input type="submit" value="Submit" name="submit" class="btn btn-default">
				  </div>
				</div>
			  </form>
		
		<?php
			if(isset($_POST['submit'])){
				$branch = $_POST['branch'];echo$branch;
				include('mysql_connect.php');
					$query="SELECT * FROM contestant WHERE branch='$branch'";
					$result=mysqli_query($conn,$query);
					$i=1;
					if(mysqli_num_rows($result) > 0){
						echo'<table class="table table-bordered">
						<thead>
						  <tr>
							<th>SL</th>
							<th>Full Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Grade</th>
							<th>Branch</th>
							<th>Action</th>
						  </tr>
						</thead>';
						while($row=mysqli_fetch_assoc($result)){
							echo' <tbody>
									  <tr>
										<td>';echo$i.'</td>
										<td>';echo$row['fullname'].'</td>
										<td>';echo$row['username'].'</td>
										<td>';echo$row['pass'].'</td>
										<td>';echo$row['grade'].'</td>
										<td>';echo$row['branch'].'</td>
										<td><a href="delete_contestant.php?id=' . $row['cid'] . '">Delete</a></td>
									  </tr>';

						$i++;
						}
						echo'</thead></table>';
					}else
						echo'<div class="alert alert-danger">
  <strong>Contestant </strong> Not Found.
</div>';
							}
							else{
								echo'<div class="alert alert-info">
  <strong>Please Choose a Branch!</strong> to view participants.
</div>';
							}
						?>
		</div>
	</div>
	<div class="col-md-8 col-md-offset-2">
			<p class="text-center">Developed By :<a href="http://www.gdgbangla.com" target="_BLANK">GDG Bangla</a></p>
		</div>
</body>
</html>
