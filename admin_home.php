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
			<h2>Add Question</h2>
			  <form class="form-horizontal" role="form" method="post">
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Question:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control"  name="q" placeholder="Question" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Answer 1:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="opt1" placeholder="Option" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Answer 2:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="opt2" placeholder="Option" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Answer 3:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="opt3" placeholder="Option" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Answer 4:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="opt4" placeholder="Option" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"> Answer</label>
				  <div class="col-sm-10">
					<select name="ans">
					  <option value="a">A</option>
					  <option value="b">B</option>
					  <option value="c">C</option>
					  <option value="d">D</option>
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
		$sql="CREATE TABLE IF NOT EXISTS qset(
			qid int(11) AUTO_INCREMENT,
			question VARCHAR(200),
			op1 VARCHAR(100),
			op2 VARCHAR(100),
			op3 VARCHAR(100),
			op4 VARCHAR(100),
			answer VARCHAR(10),
			PRIMARY KEY(qid)
			
			)";
		 if(!mysqli_query($conn,$sql)){
			echo'Table Not Creted';
		}
		if (isset($_POST['submit'])) {
			$question=$_POST['q'];echo$question;
			$option1=$_POST['opt1'];echo$option1;
			$option2=$_POST['opt2'];echo$option2;
			$option3=$_POST['opt3'];echo$option3;
			$option4=$_POST['opt4'];echo$option4;
			$answer = $_POST['ans'];echo$answer;
			$sql="INSERT INTO qset(question,op1,op2,op3,op4,answer)
			VALUES('$question','$option1','$option2','$option3','$option4','$answer')";
			if(!mysqli_query($conn,$sql)){
				echo'<div class="alert alert-danger">
  <strong>There was a Problem!</strong> Problem.
'.mysqli_error($conn).'</div>';
			}else{
				echo'<div class="alert alert-success">
  <strong>Question!</strong> Added.
</div>';
			}
		}
	
		
	?>
</body>
</html>