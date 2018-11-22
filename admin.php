<?php
session_start();
$usernamelogged=$_SESSION['usernamelogged'];
if(isset($_POST['submitted']))
{

  include('connect.php');
$casenumber=$_POST['casenumber'];
$casename=$_POST['casename'];
$courtname=$_POST['courtname'];
$casestatus=$_POST['casestatus'];
$contactno=$_POST['contactno'];
$casedate=$_POST['casedate'];

$sqlinsert="INSERT INTO newcase (adusername,casenumber,casename,courtname,casestatus,contactno,casedate)
VALUES('$usernamelogged','$casenumber','$casename','$courtname','$casestatus','$contactno','$casedate')";
                $x=mysqli_query($db_con,$sqlinsert);
              if($x)
              {


                    $today=date('Y-m-d');
                  if($casedate === $today)
                  {
                    $emailid=$contactno;
                        echo "Reminder mail sent to   ".$emailid;
                    mail($emailid,'REMINDER','Today is your hearing date! please be there','From:riddhijainsarwar@gmail.com');
                    }
                    echo '<script language="javascript">';
                      echo 'alert("new case added")';
                      echo '</script>';
                        echo "<script>setTimeout(\"location.href = 'index.html';\",1500);</script>";


  }
            else
                         					echo mysqli_error($db_con);


}
?>

<!DOCTYPE HTML>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body id="LoginForm" >
<div class="container">


<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>WELCOME Neha!!!!</h2>
   <p>Fill in the following details</p>
   </div>

		   <form method="post" action="newcase.php ">
           <div class="form-group">
          	<input type="text" id="name" name="name" value="" placeholder="Name of the psycologist" required="required" tabindex="1" autofocus="autofocus" />
</div>

        <div class="form-group">

		      	<input type="text" id="case" name="fee" value="" placeholder="Counselling fee" tabindex="2" required="required" />
		     </div>

      <div class="form-group">

			        	<input type="text" id="name" name="experience" value="" placeholder="Experience" required="required" tabindex="1" autofocus="autofocus" />
			 </div>

              <div class="form-group">
                        <p>slot</p>
        <input type="time" name="slot">
      </div>

    <div class="form-group">
		      	<input type="text" id="message" name="city" placeholder="city" tabindex="2" required="required"></input>
		      </div>
	  <div class="form-group">
            <input type="text" id="message" name="address" placeholder="address" required="required"></input>
          </div>
  <div class="form-group">
      <input type="text" id="message" name="Qualifications" placeholder="Qualifications" required="required"></input>
    </div>

<div class="form-group">
      <input type="text" id="message" name="contactno" placeholder="Contact Number" required="required"></input>
</div>
    <div class="form-group">
      <input type="text" id="message" name="email" placeholder="Psycologist's email address" required="required"></input>
    </div>


		      <button name="submit" type="submit" id="submit" >Save</button>

          	<a href="index.html" id="submit">HOME<span></span></a>

		   </form>
	</div>
</div>
</div>
</body>
  </html>
