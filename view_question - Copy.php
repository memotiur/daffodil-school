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
	<link href='https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css" type="text/css">

	</head>
	<body>
	<nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a href="view_question.php"><img src="img/logo.png" height="65px"></a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class=""></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
		<div class="container">
			<h3 class="text-danger">You Have 30 Minutes Remaining</h3>
			<?php
				include('mysql_connect.php');
				$query="SELECT * FROM qset";
				$result=mysqli_query($conn,$query);
				$i=1;
				if(mysqli_num_rows($result) > 0){
					while($row=mysqli_fetch_assoc($result)){
					?>
						<div class="hh"><h3><?php echo$i.". " .$row['question'].'<br>';?></h3></div>
						<?php?>
							<form method="POST" action="check.php">
							<select multiple class="form-control" name="<?php echo $i; ?>" >
							  <option class="h" value="a"><?php echo'<div class="m">A.</div> '.$row['op1'].'<br>'; ?></option>
							  <option class="h" value="b"><?php echo"B. ".$row['op2'].'<br>'; ?></option>
							  <option class="h" value="c"><?php echo"C." .$row['op3'].'<br>'; ?></option>
							  <option class="h" value="d"><?php echo"D. ".$row['op4'].'<br>'; ?></option>
							  
							</select><br>
							<!--<label>A.<input type="radio" name=<?php echo $i; ?> value="a" /> <?php echo$row['op1'].'<br>'; ?></lable>
							 <label>B.<input type="radio" name=<?php echo $i; ?> value="b" /> <?php echo$row['op2'].'<br>'; ?></lable>
							 <label>C.<input type="radio" name=<?php echo $i; ?> value="c" /> <?php echo$row['op3'].'<br>'; ?></lable>
							 <label>D.<input type="radio" name=<?php echo $i; ?> value="d" /> <?php echo$row['op4'].'<br>'; ?></lable>
						-->
							 <?php
						//echo'<br>'.$row['answer'];
							$i++;
					}
				}else{
					echo'Result Not Found';
				}
				

			?>
			
			<input class="btn btn-lg btn-primary mybtn" type="submit" name="submit" id="submit" value="Submit" />
		</form>
		</div>
	</body>
</html>
