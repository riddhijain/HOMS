<html>
<head>
  <link rel="stylesheet" href="css/requestlist.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
.jumbotron
{
	opacity: 0.8;
	background-color: #ffffcc;
  padding-bottom: 10px;
}
</style>
</head>

<body>
  <form action='thankyouwarden.php'>
<div class="container">
	<div class="row">

		<section class="content">
			<div class="col-md-8 col-md-offset-2">
               <div class="jumbotron">
                 <div class ="pull-right">
							<h3> All requests</h3>
            </div>
          </div>

						<div class="table-container">
							<table class="table table-filter">
								<tbody>

                  <?php
                  include('connect.php');
                $sql = mysqli_query($db_con,"SELECT r.requestId 'id',s.firstname 'fname',s.lastname 'lname',s.RegistrationNo 'rno' FROM student s, requests r WHERE s.username=r.username ");
                if(!$sql)

                          echo mysqli_error($db_con);
                  while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
                    $id=$array['id'];
                    $fname=$array['fname'];
                    $lname=$array['lname'];

            echo "<tr>							<td>
									<div class=\"ckbox\">
									<input type=\"checkbox\" id=\"checkbox1\" name=\"approve[]\" value=\"".$array['id']."\">
										<label for=\"checkbox1\"></label>
									</div>
										</td>
									<td>
                  <a class=\"btn btn-default\"><span class=\"glyphicon glyphicon-pencil\"
                                                              aria-hidden=\"true\"></span></a>
										</td>
									<td>
											<div class=\"media\">
												<div class=\"media-body\">
                        <div class =\"pull-right\">
													<span>Appication ID: ".$id."</span>
</div>
													<h4 class=\"title\">

														<span class=\"pull-right\"></span>
													</h4>

                        <h3>".$fname." ".$lname."</h3>
                        <a href=\"studentdetails.php\">Details</a>
                      </div>
											</div>
										</td>
									</tr>";
                }
                ?>

								</tbody>

							</table>
          					</div>
                    <div class ="pull-right">
      <input type ="submit" name="done" value="Done">
      </div>
					</div>

		</section>

	</div>
</div>
</form>
</body>
</html>
