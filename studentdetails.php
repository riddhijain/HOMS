<html>
<head>
  <style>

h1{
  font-size: 30px;
  color: black;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  overflow-x:auto;
  margin-top: 0px;
  width:600px;
  margin-left: 400px;
  border: 1px solid black;
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 16px;
  color: black;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 15px;
  color:black;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  /* background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4); */
    background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
  font-family: 'Roboto', sans-serif;

}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
</style>
</head>
<body>
<section>
  <!--for demo wrap-->
  <h1>Student Details</h1>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
        include('connect.php');
      $sql = mysqli_query($db_con,"SELECT * FROM student s,studentdetails sd, requests r WHERE s.username=r.username AND s.RegistrationNo=sd.registrationNo ");
      if(!$sql)

                echo mysqli_error($db_con);
        while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC)){
          $fname=$array['firstname'];
          $lname=$array['lastname'];
          $section=$array['section'];
          $yearOfStudy=$array['yearOfStudy'];
          $motherName=$array['motherName'];
          $motherContact=$array['motherContact'];
          $fatherName=$array['fatherName'];
          $fatherContact=$array['fatherContact'];
          $leaveFrom=$array['leaveFrom'];
            $leaveTill=$array['leaveTill'];
          $place=$array['place'];
          $reason=$array['reason'];
    echo  "  <tr>
          <th>Name</th>
        <td>$fname $lname</td></tr>
        <tr>
            <th>Section</th><td>$section</td

        </tr>
      <tr>
              <th>Year</th><td>$yearOfStudy</td
      </tr>
      <tr>
          <th>Fathers Name</th><td>$fatherName</td
      </tr>
      <tr>
         <th>Fathers contact no</th><td>$fatherContact</td
      </tr>
      <tr>
          <th>Mothers Name</th><td>$motherName</td
      </tr>
      <tr>
         <th>Mother's contact no</th><td>$motherContact</td
      </tr>
    
      <tr>
         <th>Leave addrerss</th><td>$place</td
      </tr>
      <tr>
          <th>Reason for leave</th><td>$reason</td
      </tr>
      <tr>
         <th>leave duration</th><td>From :$leaveFrom To :$leaveTill</td
      </tr>";
    }
      ?>

      </tbody>
    </table>
  </div>
</section>


<!-- follow me template -->
<div class="made-with-love">
  Made with
  <i>♥</i> by
<p>Riddhi</p>
</div>
</body>
</html>
