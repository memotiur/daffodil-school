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
                    <li><a href="#">Add Contestant</a></li>
					 <li><a href="view_question.php">View Question</a></li>
					 <li><a href="contestant.php">View Contestant</a></li>
                   
                </ul>

            </div>
        </div>
    </nav>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h2>Add Contestant</h2>
			  <form class="form-horizontal" role="form" method="post">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Full Name:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  name="fullname" placeholder="Full Name" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Username:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  name="username" placeholder="Username" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Password:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  name="pass" placeholder="Password" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Class</label>
				  <div class="col-sm-10">
					<select name="class">
					  <option value="One">1</option>
					  <option value="Two">2</option>
					  <option value="Three">3</option>
					  
					</select>
				  </div>
				</div>
				
				
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Submit" name="submit" class="btn btn-default">
				  </div>
				</div>
			  </form>
		</div>
	  
	</div>

	<?php
		include('mysql_connect.php');
		$sql="CREATE TABLE IF NOT EXISTS contestant(
			cid int(11) AUTO_INCREMENT,
			fullname VARCHAR(200),
			username VARCHAR(100) UNIQUE,
			pass VARCHAR(100),
			class VARCHAR(10),
			PRIMARY KEY(cid)
			
			)";
		 if(!mysqli_query($conn,$sql)){
			echo'Table Not Creted'.mysqli_error($conn);
		}
		if (isset($_POST['submit'])) {
			$fname=$_POST['fullname'];echo$fname;
			$username=$_POST['username'];echo$username;
			$pass=$_POST['pass'];echo$pass;
			$class = $_POST['class'];echo$class;
			$sql="INSERT INTO contestant(fullname,username,pass,class)
			VALUES('$fname','$username','$pass','$class')";
			if(!mysqli_query($conn,$sql)){
			echo'<div class="alert alert-danger">
  <strong>Problem</strong> 
'.mysqli_error($conn).'</div>';
			}else{
				echo'<div class="alert alert-success">
  <strong>Contestant!</strong> Added.
</div>';
			}
		}
	
		
	?>
</body>
</html>