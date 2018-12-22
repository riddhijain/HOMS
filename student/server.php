<?php
session_start();
$usernamelogged = "";
$email    = "";
$errors = array();
include('connect.php');
include('errors.php');




// LOGIN USER
if (isset($_POST['login_user'])) {
  $usernamelogged = mysqli_real_escape_string($db_con, $_POST['username']);
  $passwordlogged = mysqli_real_escape_string($db_con, $_POST['password']);

  if (count($errors) == 0)
  {
  	$passwordlogged = md5($passwordlogged);
  	$query = "SELECT * FROM student WHERE username='$usernamelogged' AND password='$passwordlogged'";
  	$results = mysqli_query($db_con, $query);
  	if (mysqli_num_rows($results)== 1) {
  	  $_SESSION['usernamelogged'] = $usernamelogged;
      echo '<script language="javascript">';
        echo 'alert("successfully logged in")';
        echo '</script>';
       echo "<script>setTimeout(\"location.href = 'welcomestudent.php';\",1500);</script>";

  	  $_SESSION['success'] = "You are now logged in";
  	}
    else {
          echo '<script language="javascript">';
            echo 'alert("wrong username or password! try again")';
            echo '</script>';
              echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";

  	}
  }
}
?>
