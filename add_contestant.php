<?php
	session_start();
	$a=$_SESSION["username"];//echo$a;
	$b=$_SESSION["password"];//echo$b;
	if(empty($a)){
		header("location:login.php");
	}
?>
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
			<h2><b>Add Contestant</b></h2>
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
					<input type="text" class="form-control" value="123456" name="pass" placeholder="Password" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Grade</label>
				  <div class="col-sm-10">
					<select name="grade">
					  <option value="One">Grade One</option>
					  <option value="Two">Grade Two</option>
					  <option value="Three">Grade Three</option>
					</select>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Branch</label>
				  <div class="col-sm-10">
					<select name="branch">
					  <option value="Dhanmondi Branch">Dhanmondi Branch</option>
					  <option value="Sobhanbug Branch">Sobhanbug Branch</option>
					  <option value="Uttara Branch">Uttara Branch</option>
					  <option value="Gazipur Branch">Gazipur Branch</option>
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
			grade VARCHAR(10),
			branch VARCHAR(50),
			PRIMARY KEY(cid)
			
			)";
		 if(!mysqli_query($conn,$sql)){
			echo'Table Not Creted'.mysqli_error($conn);
		}
		if (isset($_POST['submit'])) {
			$fname=$_POST['fullname'];echo$fname;
			$username=$_POST['username'];echo$username;
			$pass=$_POST['pass'];echo$pass;
			$branch = $_POST['branch'];echo$branch;
			$grade = $_POST['grade'];echo$grade;
			$sql="INSERT INTO contestant(fullname,username,pass,grade,branch)
			VALUES('$fname','$username','$pass','$grade','$branch')";
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
	<div class="col-md-8 col-md-offset-2">
			<p class="text-center">Developed By :<a href="http://www.gdgbangla.com" target="_BLANK">GDG Bangla</a></p>
		</div>
</body>
</html>