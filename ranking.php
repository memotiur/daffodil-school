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
                <a class="navbar-brand" href="ranking.php">Kids Contest</a>
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
			<?php
		include('mysql_connect.php');
		$sql="SELECT contestant.fullname, contestant.grade, contestant.branch, result.marks,result.username,result.submission
		FROM contestant INNER JOIN result ON contestant.username=result.username ORDER BY result.marks DESC";
		//$sql="select * from result ORDER BY marks DESC";
		$result=mysqli_query($conn,$sql);
		$i=1;
		if(mysqli_num_rows($result) > 0){
			echo'<table class="table table-bordered">
						<thead>
						  <tr>
							<th>SL</th>
							<th>Full Name</th>
							<th>Username</th>
							
							<th>Grade</th>
							<th>Branch</th>
							<th>Marks</th>
							<th>Submission Time</th>
						  </tr>
						</thead>';
			while($row=mysqli_fetch_assoc($result)){
				echo'<tbody>
									  <tr>
										<td>';echo$i.'</td>
										<td>';echo$row['fullname'].'</td>
										<td>';echo$row['username'].'</td>
										<td>';echo$row['grade'].'</td>
										<td>';echo$row['branch'].'</td>
										<td>';echo$row['marks'].'</td>';
										$time = $row['submission'];
										//$time = $row['fullname'];
										$time = date("H:i:s",strtotime($time));
										echo'<td>';echo $time;echo'</td>
									</tr>';

						$i++;
				echo'</tbody>';
			}
		}else{
			echo"There was a problem";
		}
	?>
		</div>
	  
	</div>

	
</body>
</html>