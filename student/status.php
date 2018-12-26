<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Responsive progress  step bar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>

      <link rel="stylesheet" href="css/status.css">


</head>

<body>

  <h1 class="title">Current Request Status</h1>
<div class="bar__container" >
  <ul class="bar" id="bar">
    <li class="active">Requset Sent</li>
    <li >Approved by HoD</li>
    <li>Verified with parents</li>
    <li id="warden">Approved by warden</li>
    <li>Out-pass Generated Successfully</li>
  </ul>
</div>

<section id="cards">
  <div class="card">
    <h3 class="card__title">Details</h3>
    <p class="card__text">
      <table cellpadding="3" cellspacing="3" border="1">
            <tbody>
              <?php
              include('connect.php');
            $sql = mysqli_query($db_con,"SELECT * FROM student s,studentdetails sd, requests r WHERE s.username=r.username AND s.RegistrationNo=sd.registrationNo ");
            if(!$sql)

                      echo mysqli_error($db_con);
              while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                $leaveFrom=$array['leaveFrom'];
                  $leaveTill=$array['leaveTill'];
                $place=$array['place'];
                $reason=$array['reason'];
                $reqMadeOn=$array['reqMadeOn'];
                $diff=date_diff($date1,$date2);
          echo  "  <tr>

               <th>Leave addrerss:</th><td>$place</td
            </tr>
            <tr> </tr>
            <tr>
                <th>Reason for leave:</th><td>$reason</td
            </tr>
            <tr>
               <th>leave duration:</th><td>From :$leaveFrom To :$leaveTill</td>
            </tr>
            <tr>
               <th>No of Days</th><td>$diff </td>
            </tr>
            <tr>
             <th>Request made on</th><td>$reqMadeOn</td>
             </tr>";
          }
            ?>

            </tbody>
          </table>

    </p>
    <div class="actions">
      <a href="#" >Requset Modifications</a>
    </div>
  </div>
</section>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
</body>

</html>
