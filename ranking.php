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
              

            </div>
        </div>
    </nav>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			Ranking
		</div>
	  
	</div>

	<?php
		include('mysql_connect.php');
		$sql="select * from result ORDER BY marks DESC";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0){
			while($row=mysqli_fetch_assoc($result)){
				echo$row['username'].' ';
				echo$row['marks'].'<br>';
			}
		}
	?>
</body>
</html>