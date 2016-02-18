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
					 <li><a href="view_question.php">View Question</a></li>
					 <li><a href="contestant.php">View Contestant</a></li>
                   
                </ul>

            </div>
        </div>
    </nav>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		<table class="table table-bordered">
			<thead>
			  <tr>
				<th>Full Name</th>
				<th>Username</th>
				<th>Class</th>
				<th>Password</th>
				<th>Action</th>
				
			  </tr>
			</thead>

		<?php
			include('mysql_connect.php');
				$query="SELECT * FROM contestant";
				$result=mysqli_query($conn,$query);
				$i=1;
				if(mysqli_num_rows($result) > 0){
					while($row=mysqli_fetch_assoc($result)){
						echo' <tbody>
								  <tr>
									<td>';echo$row['fullname'].'</td>
									<td>';echo$row['username'].'</td>
									<td>';echo$row['class'].'</td>
									<td>';echo$row['pass'].'</td>
									<td><a href="#">Delete</a></td>
								  </tr>';

					}
					
				}else
					echo'Not Found';
						?>
		</div>
	</div>
</body>
</html>
