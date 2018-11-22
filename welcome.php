<?php
session_start();
$usernamelogged=$_SESSION['usernamelogged'];
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>HOMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="css/login.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body{
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	background-image: url("img/hostel.jpg");

	height: 100%;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}

.jumbotron
{
	opacity: 0.8;
	background-color: #ffffcc;
}
.wc
{
	opacity: 1.5;
	text-align: center;
}
.button
{
text-align: center;
}
.btn{
	background-color: #ffa31a;
}


</style>
</head>
<body >


	<div class="container">
		 <div class="jumbotron">
		<h1 class="wc" font-family: "Times New Roman", Times, serif; >WELCOME!</h1>
    <?php
		include('connect.php');
		$sql = mysqli_query($db_con,"SELECT * FROM student WHERE  username='$usernamelogged'");
      while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC))
      {
    ?>
    <h2 class="wc" ><?php echo $array['firstname']; echo "  "; echo $array['lastname'];?></h2>
      <?php } ?>

	</div>

<br>
<br>
<br>
<div class="button">
	<a id="myButton"  class ="btn btn-info">Apply for Out-Pass</a>
</div>
	<?php
	$today=date('Y-m-d');
//	$sql=mysqli_query($db_con,"SELECT * FROM requests WHERE username='$usernamelogged' and leaveFrom<='$today' and leaveTill >='$today' ");
$sql = mysqli_query($db_con,"SELECT * FROM reqstatus WHERE id LIKE '$usernamelogged%' ");
	if(mysqli_num_rows($sql) > 0)
	{
		echo'<script type="text/javascript">';
		echo  'document.getElementById("myButton").onclick = function () {
					 alert("you can not make another outpass request!");
				};';
		echo '</script>';
	}
	else {
		echo'<script type="text/javascript">';
		echo  'document.getElementById("myButton").onclick = function () {
						location.href = "application.php";
				};';
		echo '</script>';

	}

	 ?>
	 <br>
	 <br>
<div class="button">
	<a href="status.php"  class ="btn btn-info" >Check Out-pass status</a>
</div>
	<br>
	<br>
	<div class="button">
	<a href="login.php" class="wc" >logout<span></span></a>
</div>
	</div>


</body>
</html>
