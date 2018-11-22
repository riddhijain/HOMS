<?php
session_start();
include('connect.php');
$usernamelogged=$_SESSION['usernamelogged'];
?>
<html lang="en">
<head>
 <title>Bootstrap Example</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.container
{
  background-color:  #ffffcc;
  padding-top:150px;
  padding-bottom:150px;
  padding-right:20px;
  padding-left:20px;
}
*, *:after, *:before { margin:0; padding:0; }
body {
    padding: 15px;
    font-family: Helvetica, sans-serif;
}

input[type="button"] {
    margin-top: 20px;
}
.node {
    height: 10px;
    width: 10px;
    border-radius: 50%;
    display:inline-block;
    transition: all 1000ms ease;
}

.activated {
    box-shadow: 0px 0px 3px 2px rgba(194, 255, 194, 0.8);
}
.heading
{
  text-align: center;
}
.divider {
    height: 40px;
    width: 2px;
    margin-left: 4px;
    transition: all 800ms ease;
}

li p {
    display:inline-block;
    margin-left: 25px;
}

li {
    list-style: none;
    line-height: 1px;
}


.blue { background-color: rgba(82, 165, 255, 1); }
.green{ background-color: rgba(92, 184, 92, 1) }
.red { background-color: rgba(255, 148, 148, 1); }
.grey { background-color: rgba(201, 201, 201, 1); }
</style>

</head>
<body>

<div class="container">
 <h1 class="heading">Your Request Progress</h1>
 <br>
 <div class="progress">
   <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" >
     <span class="sr-only"></span>
   </div>
   </div>
   <ul id="progress">
       <li><div class="node grey"></div><p>Request Sent</p></li>
       <li><div class="divider grey"></div></li>
       <li><div class="node grey"></div><p>Approved by HoD</p></li>
       <li><div class="divider grey"></div></li>
       <li><div class="node grey"></div><p>Verified with Parents</p></li>
       <li><div class="divider grey"></div></li>
       <li><div class="node grey"></div><p>Validated by Warden</p></li>
   </ul>

<?php
	$sql=mysqli_query($db_con,"SELECT * FROM reqstatus INNER JOIN requests on reqstatus.id = requests.requestId WHERE username='$usernamelogged'");
  while($array=mysqli_fetch_array($sql,MYSQLI_ASSOC))
  {
if($array['requestmade']==1 && $array['byHod']==0 && $array['byParents']==0 && $array['byWarden']==0)
{
  echo "<link rel='stylesheet' type='text/css' href='css/status1.css' />";
  echo  " <script>
    var list = document.getElementById('progress'),
      //  next = document.getElementById('next'),
        //clear = document.getElementById('clear'),
        children = list.children,
        completed = 0;

    // simulate activating a node
    window.addEventListener('load', function() {

        // count the number of completed nodes.
      //  completed = (completed === 0) ? 1 : completed + 2;
        //if (completed > children.length) return;

        // for each node that is completed, reflect the status
        // and show a green color!
        for (var i = 0; i < 2; i++) {
            children[i].children[0].classList.remove('grey');
            children[i].children[0].classList.add('green');

            // if this child is a node and not divider,
            // make it shine a little more
            if (i % 2 === 0) {
                children[i].children[0].classList.add('activated');
            }
        }

    }, false);
    </script> ";


}
if($array['requestmade']==1 && $array['byHod']==1 && $array['byParents']==0 && $array['byWarden']==0)
{
  echo "<link rel='stylesheet' type='text/css' href='css/status2.css' />";
  echo  " <script>
    var list = document.getElementById('progress'),
      //  next = document.getElementById('next'),
        //clear = document.getElementById('clear'),
        children = list.children,
        completed = 0;

    // simulate activating a node
    window.addEventListener('load', function() {

        // count the number of completed nodes.
      //  completed = (completed === 0) ? 1 : completed + 2;
        //if (completed > children.length) return;

        // for each node that is completed, reflect the status
        // and show a green color!
        for (var i = 0; i < 4; i++) {
            children[i].children[0].classList.remove('grey');
            children[i].children[0].classList.add('green');

            // if this child is a node and not divider,
            // make it shine a little more
            if (i % 2 === 0) {
                children[i].children[0].classList.add('activated');
            }
        }

    }, false);
    </script> ";

}
if($array['requestmade']==1 && $array['byHod']==1 && $array['byParents']==1 && $array['byWarden']==0)
{
  echo "<link rel='stylesheet' type='text/css' href='css/status3.css' />";
  echo  " <script>
    var list = document.getElementById('progress'),
      //  next = document.getElementById('next'),
        //clear = document.getElementById('clear'),
        children = list.children,
        completed = 0;

    // simulate activating a node
    window.addEventListener('load', function() {

        // count the number of completed nodes.
      //  completed = (completed === 0) ? 1 : completed + 2;
        //if (completed > children.length) return;

        // for each node that is completed, reflect the status
        // and show a green color!
        for (var i = 0; i < 6; i++) {
            children[i].children[0].classList.remove('grey');
            children[i].children[0].classList.add('green');

            // if this child is a node and not divider,
            // make it shine a little more
            if (i % 2 === 0) {
                children[i].children[0].classList.add('activated');
            }
        }

    }, false);
    </script> ";

}
if($array['requestmade']==1 && $array['byHod']==1 && $array['byParents']==1 && $array['byWarden']==1)
{
  echo "<link rel='stylesheet' type='text/css' href='css/status4.css' />";
  echo  " <script>
    var list = document.getElementById('progress'),
      //  next = document.getElementById('next'),
        //clear = document.getElementById('clear'),
        children = list.children,
        completed = 0;

    // simulate activating a node
    window.addEventListener('load', function() {

        // count the number of completed nodes.
      //  completed = (completed === 0) ? 1 : completed + 2;
        //if (completed > children.length) return;

        // for each node that is completed, reflect the status
        // and show a green color!
        for (var i = 0; i < 8; i++) {
            children[i].children[0].classList.remove('grey');
            children[i].children[0].classList.add('green');

            // if this child is a node and not divider,
            // make it shine a little more
            if (i % 2 === 0) {
                children[i].children[0].classList.add('activated');
            }
        }

    }, false);
    </script> ";

}
  }

 ?>
</body>
</html>
