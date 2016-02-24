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
					 <li><a href="logout.php">Logout</a></li>
                   
                </ul>

            </div>
        </div>
    </nav>
	
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
		
		<form class="form-horizontal" role="form" method="post">
				<h2><b>View Question</b></h2>
				<div class="form-group">
				  <label class="control-label col-sm-4" for="email"> Grade</label>
				  <div class="col-sm-8">
					<select name="grade">
					  <option value="One">Grade One</option>
					  <option value="Two">Grade Two</option>
					  <option value="Three">Grade Three</option>
					</select>
				  </div>
				</div>
				
				
				<div class="form-group">        
				  <div class="col-sm-offset-4 col-sm-8">
					<input type="submit" value="Submit" name="submit" class="btn btn-default">
				  </div>
				</div>
			  </form>
			</div>
			<div class="row">
		<?php
			if(isset($_POST['submit'])){
				$grade = $_POST['grade'];echo$grade;
				include('mysql_connect.php');
					$query="SELECT * FROM qset WHERE grade='$grade'";
					$result=mysqli_query($conn,$query);
					$i=1;
					if(mysqli_num_rows($result) > 0){
						echo'<table class="table table-bordered">
						<thead>
						  <tr>
							<th>SL</th>
							<th>Question</th>
							<th>Option 1</th>
							<th>Option 2</th>
							<th>Option 3</th>
							<th>Option 4</th>
							<th>Grade</th>
							<th>Answer</th>
							<th>Action</th>
						  </tr>
						</thead>';
						while($row=mysqli_fetch_assoc($result)){
							echo' <tbody>
									  <tr>
										<td>';echo$i.'</td>
										<td>';echo$row['question'].'</td>
										<td>';echo$row['op1'].'</td>
										<td>';echo$row['op2'].'</td>
										<td>';echo$row['op3'].'</td>
										<td>';echo$row['op4'].'</td>
										<td>';echo$row['grade'].'</td>
										<td>';echo$row['answer'].'</td>
										<td><a href="delete_question.php?id=' . $row['qid'] . '">Delete</a></td>
									  </tr>';

						$i++;
						}
						echo'</thead></table></div>';
					}else
						echo'<div class="alert alert-danger">
  <strong>Question </strong> Not Found.
</div>';
							}
							else{
								echo'<div class="alert alert-info">
  <strong>Please Choose a Grade!</strong> to view Question.
</div>';
							}
						?>
		</div>
		<div class="col-md-8 col-md-offset-2">
			<p class="text-center">Developed By :<a href="http://www.gdgbangla.com" target="_BLANK">GDG Bangla</a></p>
		</div>

</body>
</html>
