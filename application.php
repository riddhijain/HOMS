<?php
session_start();
 require('connect.php');
if(isset($_POST['Submitreq']))
{

      require './script/Exception.php';
      require './script/PHPMailer.php';
      require './script/SMTP.php';
try {
  $stmt = $db_con->prepare("INSERT INTO requests (username,leaveFrom,leaveTill,place,reason,transport,callfrom,calltill,requestId)
  VALUES(?,?,?,?,?,?,?,?,?);");
  $stmt->bind_param("sssssssss", $usernamelogged,$startdate,$enddate,$place,$reason,$transport,$callfrom,$calltill,$id);
  $usernamelogged=$_SESSION['usernamelogged'];
  $startdate=$_POST['startdate'];
  $enddate=$_POST['enddate'];
  $place=$_POST['place'];
  $reason=$_POST['reason'];
  $transport=$_POST['transport'];
  $callfrom=$_POST['callfrom'];
  $calltill=$_POST['calltill'];
  $len = strlen($usernamelogged);
  $id = substr($usernamelogged,0,$len).'-'.date('dMY');
  $stmt->execute();
  } catch (Exception $e) {
    print('Error: ' . $e->getMessage());

}
try{
  $stmt2 = $db_con->prepare("INSERT INTO reqstatus(id,requestmade)
  VALUES(?,?);");
  $stmt2->bind_param("si", $id,$request);
  $request="1";
  $len = strlen($usernamelogged);
  $id = substr($usernamelogged,0,$len).'-'.date('dMY');
  $stmt2->execute();
}
catch (Exception $e) {
  print('Error: ' . $e->getMessage());
}
echo "New records created successfully";
echo "<script>setTimeout(\"location.href = 'welcome.php';\",1500);</script>";

$sql=mysqli_query($db_con,"SELECT h.email 'email',sd.motheremail 'memail',sd.fatherEmail 'femail' FROM hod h, student s, studentdetails sd WHERE s.username='$usernamelogged' and s.RegistrationNo=sd.registrationNo and sd.deptNo=h.deptNO");
if(!$sql)
          echo mysqli_error($db_con);
  while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
    $emailid=$array['email'];
      $memailid=$array['memail'];
        $femailid=$array['femail'];
    echo "Reminder mail sent to   ".$emailid;
//         $message='<html>
//         <body>
//         </body>
//         <h1>hi</h1>
//         </html>';
// mail($emailid,'REMINDER',$message,'From:riddhijainsarwar@gmail.com');
// mail($memailid,'REMINDER','your child has applied for outpass','From:riddhijainsarwar@gmail.com');
// mail($femailid,'REMINDER','your child has applied for outpass','From:riddhijainsarwar@gmail.com');

$mail = new PHPMailer \ PHPMailer \PHPMailer();
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "riddhijainsarwar@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "ilovemymom123";

//Whether mail body contains HTML,false is plain text
$mail->IsHTML(true);

//Set who the message is to be sent from
$mail->setFrom('riddhijainsarwar@gmail.com', 'Riddhi');

//Set who the message is to be sent to
$mail_receiver = $emailid;

//email Address of reciever,
//here php variable has been used which stores and
//provides email-id entered through form
$mail->addAddress($emailid, "");

//Set the subject line
$mail->Subject = "REMINDER";

//Set Body of message

$mail->Body = "
<table width='100%' bgcolor='#ffffff' border='0' cellpadding='10' cellspacing='0'>
<tr>
  <td>

    <table bgcolor='white' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>
			<tr>
				<td valign='top' mc:edit='headerBrand' id='templateContainerHeader'>

					<p style='text-align:center;margin:0;padding:0;'>
						<!-- <img src='' style='display:inline-block;' /> -->
					</p>

				</td>
			</tr>
      <tr>
				<td align='center' valign='top'>
					<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateContainerImageCurve' style='min-height:15px;'>
						<tr>
							<td valign='top' class='bodyContentImageFull' mc:edit='body_content_01'>
                <p style='text-align:center;margin:0;padding:0;'>
      						<img src='http://skilloutlook.com/wp-content/uploads/2017/11/MUJ-FOD.jpg' style='display:block;' />
      					</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
      <tr>
				<td align='center' valign='top'>
						<!-- BEGIN BODY // -->
						<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateContainerMiddle'>
							<tr>
								<td valign='top' class='bodyContent' mc:edit='body_content'>
                  <h3>Welcome </h3>
									<h2><strong>You have more than 10 out-pass requests pending.</strong></h2>
									<p>Looks like you have not checked any requests since a long time.<br />
 Your students are waiting for your approval.Don't worry we'll take you there.</p>
								</td>
							</tr>
						</table>
						<!-- // END BODY -->
					</td>
			</tr>
      <tr>
				<td align='center' valign='top'>
						<!-- BEGIN BODY // -->
						<table border='0' cellpadding='0' cellspacing='0' width='100%' id='templateContainerMiddle'>
							<tr>
								<td valign='top' class='bodyContentCenter' mc:edit='body_content_centered'>
                  <a class='blue-btn' href='requestlist.php'><strong>Take me there</strong></a>
								</td>
							</tr>
						</table>
						<!-- // END BODY -->
					</td>
			</tr>

							</table>
							<!-- // END BODY -->
					</td>
			</tr>

    </table>
    </td>
  </tr>
</table>
<style type='text/css'>
  /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
  #outlook a{padding:0;} /* Force Outlook to provide a 'view in browser' message */
  .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
  body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
  table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
  td ul li {
    font-size: 16px;
  }
  /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
  body{margin:0; padding:0;}
  img{
    max-width:100%;
    border:0;
    line-height:100%;
    outline:none;
    text-decoration:none;
  }
  table{border-collapse:collapse !important;}
  .content {width: 100%; max-width: 600px;}
  .content img { height: auto; min-height: 1px; }

  #bodyTable{margin:0; padding:0; width:100% !important;}
  #bodyCell{margin:0; padding:0;}
  #bodyCellFooter{margin:0; padding:0; width:100% !important;padding-top:39px;padding-bottom:15px;}
  body {margin: 0; padding: 0; min-width: 100%!important;}

  #templateContainerHeader{
    font-size: 14px;
    padding-top:2.429em;
    padding-bottom:0.929em;
  }
  #templateContainerFootBrd{
    border-bottom:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
    height: 10px;
    width:100% !important;
  }
  #templateContainer{
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 4px 4px 0 0 ;
    background-clip: padding-box;
    border-spacing: 0;
  }
  #templateContainerMiddle {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
  }
  #templateContainerMiddleBtm {
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-bottom:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
  }

  /**
  * @tab Page
  * @section heading 1
  * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
  * @style heading 1
  */
  h1{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:26px;
     line-height:1.385em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 2
  * @tip Set the styling for all second-level headings in your emails.
  * @style heading 2
  */
  h2{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:22px;
     line-height:1.455em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 3
  * @tip Set the styling for all third-level headings in your emails.
  * @style heading 3
  */
  h3{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:18px;
     line-height:1.444em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 4
  * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
  * @style heading 4
  */
  h4{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:14px;
     line-height:1.571em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h5{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:13px;
     line-height:1.538em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h6{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:12px;
     line-height:2.000em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  p {
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:16px;
     line-height:1.500em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
    text-align:left;
  }

  .unSubContent a:visited { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:focus   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:hover   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:link   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}
  .unSubContent a .yshortcuts   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}

  .unSubContent h6 {
    color: #a1a1a1;
    font-size: 12px;
    line-height: 1.5em;
    margin-bottom: 0;
  }

  .bodyContent{
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:3.143em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:0.714em;
     text-align:left;
  }
  .bodyContentCenter {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:3.0em;
    text-align:center;
  }
  .bodyContentCenter p {
    margin-bottom: 0;
    text-align: center;
  }
  .bodyContentCenter a.blue-btn {
    margin-top: 0;
  }
  .bodyContentImage {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0;
    padding-right:3.571em;
    padding-left:3.571em;
    padding-bottom:2em;
    text-align:left;
  }

  .bodyContentImage h4 {
    color: #4E4E4E;
    font-size: 13px;
    line-height: 1.154em;
    font-weight:normal;
    margin-bottom: 0;
  }
  .bodyContentImage h5 {
    color: #828282;
    font-size: 12px;
    line-height: 1.667em;
    margin-bottom: 0;
  }

  /**
  * @tab Body
  * @section body link
  * @tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
  */
  a:visited { color: #3386e4; text-decoration:none;}
  a:focus   { color: #3386e4; text-decoration:none;}
  a:hover   { color: #3386e4; text-decoration:none;}
  a:link   { color: #3386e4 ; text-decoration:none;}
  a .yshortcuts   { color: #3386e4 ; text-decoration:none;}

  .bodyContent img{
    height:auto;
    max-width:498px;
  }

  .footerContent{
    color:#808080;
    font-family:Helvetica;
    font-size:10px;
    line-height:150%;
    padding-top:2.000em;
    padding-right:2.000em;
    padding-bottom:2.000em;
    padding-left:2.000em;
    text-align:left;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
  */
  .footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
     color:#606060;
     font-weight:normal;
     text-decoration:underline;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
  */
  #templateContainerImageFull { border-left:1px solid #e2e2e2; border-right:1px solid #e2e2e2; }
  #templateContainerImageCurve {
    border-top:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
    border-collapse: separate !important;
    border-spacing: 0;
  }
  #templateContainerImageCurve img {
    border-radius: 3px 3px 0px 0px;
    background-clip: padding-box;
  }
  /*boom*/
  .bodyContentImageFull p { font-size:0 !important; margin-bottom: 0 !important; }
  .brdBottomPadd { border-bottom: 1px solid #f0f0f0; }
  .brdBottomPadd .bodyContent { padding-bottom: 2.286em; }
  a.blue-btn {
    background: #5098ea;
    display: inline-block;
    color: #FFFFFF;
    border-top:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-bottom:10px solid #5098ea;
    border-left:20px solid #5098ea;
    border-right:20px solid #5098ea;
    text-decoration: none;
    font-size: 14px;
    margin-top: 1.0em;
    border-radius: 3px 3px 3px 3px;
    background-clip: padding-box;
  }


  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
    body[yahoo] .hide {display: none!important;}
    body[yahoo] .buttonwrapper {background-color: transparent!important;}
    body[yahoo] .button {padding: 0px!important;}
    body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
    body[yahoo] .unsubscribe { font-size: 14px; display: block; margin-top: 0.714em; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important;}
  }
  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
  }*/
  @media only screen and (max-width: 480px) {
    h1 {
      font-size:34px !important;
    }
    h2{
      font-size:30px !important;
    }
    h3{
      font-size:24px !important;
    }
    h4{
      font-size:18px !important;
    }
    h5{
      font-size:16px !important;
    }
    h6{
      font-size:14px !important;
    }
    p {
      font-size: 18px !important;
    }
    .brdBottomPadd .bodyContent { padding-bottom: 2.286em !important; }
    .bodyContent {
      padding: 6% 5% 1% 6% !important;
    }
    .bodyContent img {
      max-width: 100% !important;
    }
    .bodyContentImage {
      padding: 3% 6% 6% 6% !important;
    }
    .bodyContentImage img {
      max-width: 100% !important;
    }
    .bodyContentImage h4 {
      font-size: 16px !important;
    }
    .bodyContentImage h5 {
      font-size: 15px !important;
      margin-top:0;
    }
    td[class='bodyContentCenter'] {
      padding: 6% 6% 6% 6% !important;
    }
  }
  .ii a[href] {color: inherit !important;}
  span > a, span > a[href] {color: inherit !important;}
  a > span, .ii a[href] > span {text-decoration: inherit !important;}
</style>                               ";

if (!$mail->send()) {
echo " Mailer Error: " . $mail->ErrorInfo;
} else {
echo '<script type="text/javascript">alert("Message has been sent");</script>';
}
}

$stmt->close();
$stmt2->close();
$db_con->close();
}
        else
                                  echo mysqli_error($db_con);

?>
<html>
  <head>
    <meta name=\"viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" href="css/login.css">-->
<link rel="manifest" href="/manifest.json">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/bootstrap-clockpicker.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>

<style>
body{
  font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
  font-size: 2em;

}
.head
{
  text-align: center;

}
.container
{
    background-color:  #ffffcc;
    margin-top: 80px;
}
.btn{
  background-color:  #ffa31a;
}
</style>
  </head>
<body id="LoginForm" >
<div class="container">


<div class="login-form">
<div class="main-div">
    <div class="head">
   <h1>Out-pass Application</h1>
   <p>Fill in the following details</p>
   </div>
    <form id="Login" method="post">
    <!--<?php include('errors.php'); ?>
-->
<div class="row">
        <div class="col-6">

<p>From</p>
            <input type="datetime-local" class="form-control" id="" name="startdate" placeholder="From" required>


        </div>

        <div class="col-6">
<p>To</p>
                      <input type="datetime-local" class="form-control" id="" name="enddate" placeholder="To" required>

        </div>
      </div>
      <br>

        <div class="form-group">


            <input type="text" class="form-control" id="" name="place" placeholder="Leave Destination" required>


        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="" name="reason" placeholder="Reason of leave" required>
        </div>
      </div>
      <div class="form-group">
          <input type="text" class="form-control" id="" name="transport" placeholder="Mode of transport" required>
      </div>
        <p>Parents availaibility hours to contact</p>
      <div class="row">

              <div class="col-6">
  <input type="datetime-local" class="form-control" id="" name="callfrom" placeholder="From" required>


              </div>

              <div class="col-6">
                            <input type="datetime-local" class="form-control" id="" name="calltill" placeholder="To" required>

              </div>
            </div>
            <br>
        <!--<div class="input-group clockpicker">
  	<input type="text" class="form-control" value="09:30">
  	<span class="input-group-addon">
  		<span class="glyphicon glyphicon-time"></span>
  	</span>
  </div>
  <script type="text/javascript">
$('.clockpicker').clockpicker({
placement: 'bottom', // clock popover placement
align: 'left',       // popover arrow align
donetext: 'Done',     // done button text
autoclose: false,    // auto close when minute is selected
vibrate: true        // vibrate the device when dragging lock hand
});
</script>-->
        <div class="submit">
</div>
        <button type="submit" class="btn btn-primary" name="Submitreq">Submit</button>
    </form>
    </div>
    <br>
    <a href="index.php">logout</a>
</div></div>
</div>
</body>
</html>
