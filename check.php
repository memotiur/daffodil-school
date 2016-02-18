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
			<img src="img/logo.png" height="65px">
                
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                   
                    <li><a href="ranking.php"><span class=""></span> Ranking</a></li>
					 <li><a href="logout.php"><span class=""></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
	<div class="container">
		<div class="resultpage col-md-8 col-md-offset-2">
			<?php
			session_start();
				include('mysql_connect.php');
				$sql="SELECT * FROM qset";
				$result=mysqli_query($conn,$sql);
				foreach ($_POST as $entry){
				 //print $entry . "<br>";
				}
				$i=1;
				$count=0;
				$blank=0;
				if(mysqli_num_rows($result) > 0){
					while($row=mysqli_fetch_array($result)){
						if(empty($_POST[$i])){
						  $_POST[$i]='e';//echo'Empty';
						  $blank++;
						  
						}
						if($_POST[$i]==$row['answer']){
							$count=$count+1;//echo"Ok";
							
						}
						$i++;
					}
				}
				if($blank>0){
					echo'You didnot answer '.$blank.' Questions.';
					echo'<input class="btn btn-lg btn-primary mybtn" type="submit" name="submit" id="submit" value="RETEST" />';
				}
				echo'<br>Result: '.$count;

			?>
		</div>
	</div>
</body>
<?php
		include('mysql_connect.php');
		$sql="CREATE TABLE IF NOT EXISTS result(
			rid int(11) AUTO_INCREMENT,
			marks INT(200),
			username VARCHAR(100),
			PRIMARY KEY(rid)
			
			)";
		if(!mysqli_query($conn,$sql)){
			echo'Table Not Creted'.mysqli_error($conn);
		}
			$marks=$count;
			$username=$_SESSION["username"];
			$query="SELECT username FROM result WHERE username='$username'";
			$result=mysqli_query($conn,$query);
			if(mysqli_num_rows($result) > 0){
				$sql="UPDATE result SET marks='$marks' WHERE username='$username'";
				if(!mysqli_query($conn,$sql)){
					echo'Problem';
				}else{
					echo'<div class="alert alert-success">
							<strong>You Have Done Your Test!</strong>. Marks Updated
						</div>';
				}
			
			}else{
				$sql="INSERT INTO result(marks,username)
				VALUES('$marks','$username')";
				if(!mysqli_query($conn,$sql)){
				echo'<div class="alert alert-danger">
						<strong>Problem</strong> 
						'.mysqli_error($conn).'</div>';
				}else{
					echo'<div class="alert alert-success">
							<strong>You Have Done Your Test!</strong>.
						</div>';
				}
			}

	?>

