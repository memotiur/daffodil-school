<?php
	$msg="";
	if(isset($_POST['submit'])){
		$user=$_POST['username'];//echo$user;
		$pass=$_POST['pass'];//echo$pass;
		include('mysql_connect.php');
		$sql="SELECT * FROM contestant WHERE username='$user' AND pass='$pass'";
		$result=mysqli_query($conn,$sql);
		if($user=='motiur' && $pass='password'){
			session_start();
			$_SESSION["username"]=$user;
			$_SESSION["password"]=$pass;
			header("Location: admin_home.php"); /* Redirect browser */
			exit();
		}
		if(mysqli_num_rows($result) > 0){
			$row=mysqli_fetch_assoc($result);
			session_start();
			$_SESSION["username"]=$user;
			$_SESSION["password"]=$pass;
			$_SESSION["fullname"]=$row['fullname'];
			$_SESSION["grade"]=$row['grade'];
			$grade=$_SESSION["grade"];echo$grade;
			$_SESSION["branch"]=$row['branch'];
			
				header("Location: grade_one_question.php"); /* Redirect browser */
			
			//header("Location: grade_one_question.php"); /* Redirect browser */
			exit();
		}else{
			$msg="Username And Password did not match.";
			//echo'Not Found';
		}
	}
?>

<html>
<head>
	<title>DIS</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom.css" type="text/css">
</head>
<body class="login">
	<nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php"><img src="img/logo.png" height="65px"></a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php"><span class=""></span>Login</a></li>
                </ul>

            </div>
        </div>
    </nav>
	<div class="container ">
		<div class="col-md-7 col-md-offset-3 loginpage">
			<h2 class="text-center">Login</h2>
			  <form class="form-horizontal" role="form" method="post">
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Username:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  name="username" placeholder="Username" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Password:</label>
				  <div class="col-sm-10">
					<input type="password" class="form-control"  name="pass" placeholder="Password" required>
				  </div>
				</div>

				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Login" name="submit" class="btn btn-primary btn-lg">
				  </div>
				</div>
			  </form>
			  <?php
				if($msg!=""){
					echo'<div class="col-sm-offset-2 col-sm-10 alert alert-danger">';echo$msg.'</div>';
		
				}
				?>
		</div>
		
		<div class="col-md-7 col-md-offset-2">
			<p class="text-center">Developed By :<a href="http://www.gdgbangla.com" target="_BLANK">GDG Bangla</a></p>
		</div>
	</div>
</body>
</html>
