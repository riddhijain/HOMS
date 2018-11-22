<?php
session_start();
$usernamelogged = "";
$email    = "";
$errors = array();
include('config.php');
include('connectToMySQL.php');



$username = $_POST['username']; //Set UserName
$password = $_POST['password'];

// LOGIN USER
if (isset($username, $password)) {
  $usernamelogged = mysqli_real_escape_string($conn, $username);
  $passwordlogged = mysqli_real_escape_string($conn, $password);

  if (count($errors) == 0)
  {
  //	$passwordlogged = md5($passwordlogged);
  	$query =mysqli_query($conn,"SELECT * FROM login_admin WHERE user_name='$usernamelogged' AND user_pass='$passwordlogged'");
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
echo $row['user_name'];
echo $row['user_pass'];
}
  	if (mysqli_num_rows($query)!=0) {
  	  $_SESSION['usernamelogged'] = $usernamelogged;
      echo '<script language="javascript">';
        echo 'alert("successfully logged in")';
        echo '</script>';
    //   echo "<script>setTimeout(\"location.href = 'adminwelcome.php';\",1500);</script>";

  	  $_SESSION['success'] = "You are now logged in";
  	}
    else {
          echo '<script language="javascript">';
            echo 'alert("wrong username or password! try again")';
            echo '</script>';
            //  echo "<script>setTimeout(\"location.href = 'adminlogin.html';\",1500);</script>";

  	}
  }
}
?>
