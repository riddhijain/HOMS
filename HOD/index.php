<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Requests</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
  <style>
    @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
  </style>
  <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
  <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
  <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="tinder">
  <div class="tinder--status">
    <i class="fa fa-remove"></i>
    <i class="fa fa-check"></i>
  </div>

  <div class="tinder--cards">
    <div class="tinder--card">
      <?php
      include('connect.php');
    $sql = mysqli_query($db_con,"SELECT * FROM student s, requests r,reqstatus rs WHERE s.username=r.username AND r.requestId=rs.id ");
    if(!$sql)

              echo mysqli_error($db_con);
      while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
        $id=$array['id'];
        $fname=$array['firstname'];
        $lname=$array['lastname'];
        $place=$array['place'];
        $reason=$array['reason'];
        $leaveFrom=$array['leaveFrom'];
        $leaveTill=$array['leaveTill'];
          $reqMadeOn=$array['reqMadeOn'];

      echo "<h3>".$fname." ".$lname."</h3>
      <br>
      	<span>Appication ID: ".$id."</span>
        <table cellpadding=\"3\" cellspacing=\"3\" border=\"1\">
              <tbody>
        <tr>
             <th>Leave addrerss:</th><td>$place</td
          </tr>
          <tr> </tr>
          <tr>
              <th>Reason for leave:</th><td>$reason</td
          </tr>
          <tr>
             <th>leave duration:</th><td>From :$leaveFrom To :$leaveTill</td
          </tr>
          <tr>
             <th>No of Days</th><td></td>
          </tr>
          <tr>
           <th>Request made on</th><td>$reqMadeOn</td>
           </tr>

           </tbody>
           </table>
           <br>
           <a href=\"#\">Student Details</a>";
}
?>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/animals">
      <h3>Demo card 2</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/nature">
      <h3>Demo card 3</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/tech">
      <h3>Demo card 4</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    <div class="tinder--card">
      <img src="https://placeimg.com/600/300/arch">
      <h3>Demo card 5</h3>
      <p>This is a demo for Tinder like swipe cards</p>
    </div>
    </div>
    <!--thank you-->
    <div id = "thanks">
  <header class="site-header" id="header" >
  		<h1  data-lead-id="site-header-title">You're all caught up!</h1>
  	</header>

  	<div class="main-content">
  		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
  		<p class="main-content__body" data-lead-id="main-content-body"></p>
  	</div>
  </div>

  <div class="tinder--buttons">
    <button id="nope"><i class="fa fa-remove"></i></button>
    <button id="love"><i class="fa fa-check mycheck"></i></button>
  </div>
</div>
  <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
    <script  src="js/index.js"></script>
</body>
</html>
