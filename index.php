<?php include('server.php') ?>
<html>
  <head>
    <meta name="theme-color" content="#3367D6">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="css/login.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="manifest" href="/Homs/json/manifest.json">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body{
  font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;


}
#button
{
background-color:  #ffa31a;
}

.myForm {
    text-align: center;
   border: 20px solid #ffa31a;
   border-radius: 8px;
   background-color: #ffffcc;
  min-width: 500px;
  position: absolute;
  box-shadow:  0 10px 10px #ffa31a, 0 10px 10px #ffa31a, 3px 3px #ffa31a;

  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
}
@media (max-width: 400px) {
  .myForm {
    min-width: 70%;
    min-height: 500px;
  }
  body{
  min-height: 500px;
  }
}
</style>

<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm" >
<div class="container">


<div class="login-form">
<div class="main-div">

    <form class="myForm" method="post" action="server.php">
      <div class="panel">
     <h2>Student Login</h2>
     <p>Please enter your username and password</p>
     </div>
      <?php include('errors.php'); ?>
        <div class="form-group">
            <input type="Username" class="form-control" id="inputEmail" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
        </div>
<br>
        <button type="submit" id="button" class="btn btn-primary" name="login_user">Login</button>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
      </div>
    </form>

    </div>
</div></div></div>

<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('service-worker.js')
    .then(registration => {
      console.log('Service Worker is registered', registration);
    })
    .catch(err => {
      console.error('Registration failed:', err);
    });
  });
}
</script>

</body>
</html>
