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
@import url(https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,700);
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);

body, html {
  height: 100%;
}
body {
  font-family: 'Open Sans';
  font-weight: 100;
  display: flex;
  overflow: hidden;
}
input {
  ::-webkit-input-placeholder {
     color: rgba(255,255,255,0.7);
  }
  ::-moz-placeholder {
     color: rgba(255,255,255,0.7);
  }
  :-ms-input-placeholder {
     color: rgba(255,255,255,0.7);
  }
  &:focus {
    outline: 0 transparent solid;
    ::-webkit-input-placeholder {
     color: rgba(0,0,0,0.7);
    }
    ::-moz-placeholder {
       color: rgba(0,0,0,0.7);
    }
    :-ms-input-placeholder {
       color: rgba(0,0,0,0.7);
    }
  }
}

.login-form {
  //background: #222;
  //box-shadow: 0 0 1rem rgba(0,0,0,0.3);
  min-height: 10rem;
  margin: auto;
  max-width: 50%;
  padding: .5rem;
}
.login-text {
  //background: hsl(40,30,60);
  //border-bottom: .5rem solid white;
  color: white;
  font-size: 1.5rem;
  margin: 0 auto;
  max-width: 50%;
  padding: .5rem;
  text-align: center;
  //text-shadow: 1px -1px 0 rgba(0,0,0,0.3);
  .fa-stack-1x {
    color: black;
  }
}

.login-username, .login-password {
  background: transparent;
  border: 0 solid;
  border-bottom: 1px solid rgba(white, .5);
  color: white;
  display: block;
  margin: 1rem;
  padding: .5rem;
  transition: 250ms background ease-in;
  width: calc(100% - 3rem);
  &:focus {
    background: white;
    color: black;
    transition: 250ms background ease-in;
  }
}

.login-forgot-pass {
  //border-bottom: 1px solid white;
  bottom: 0;
  color: white;
  cursor: pointer;
  display: block;
  font-size: 75%;
  left: 0;
  opacity: 0.6;
  padding: .5rem;
  position: absolute;
  text-align: center;
  //text-decoration: none;
  width: 100%;
  &:hover {
    opacity: 1;
  }
}
.login-submit {
  border: 1px solid white;
  background: transparent;
  color: white;
  display: block;
  margin: 1rem auto;
  min-width: 1px;
  padding: .25rem;
  transition: 250ms background ease-in;
  &:hover, &:focus {
    background: white;
    color: black;
    transition: 250ms background ease-in;
  }
}




[class*=underlay] {
  left: 0;
  min-height: 100%;
  min-width: 100%;
  position: fixed;
  top: 0;
}
.underlay-photo {
  animation: hue-rotate 6s infinite;
  background: url('https://reseuro.magzter.com/1064x679/articles/410/236636/59a598a8e876f/Manipal-University-Jaipur-Fostering-Academic-Excellence.jpg');
  background-size: cover;
  -webkit-filter: grayscale(30%);
  z-index: -1;
}
 .underlay-black {
  background: rgba(0,0,0,0.7);
  z-index: -1;
}

@keyframes hue-rotate {
  from {
    -webkit-filter: grayscale(30%) hue-rotate(0deg);
  }
  to {
    -webkit-filter: grayscale(30%) hue-rotate(360deg);
  }
}
</style>

<!------ Include the above in your HEAD tag ---------->
  </head>
  <form class="login-form" method="post" action="server.php">
    <p class="login-text">
    <!--  <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-lock fa-stack-1x"></i>
      </span> -->
    </p>
    <input  class="login-username" autofocus="true" required="true" placeholder="Username" name="username"/>
    <input type="password" class="login-password" required="true" placeholder="Password" name="password" />
    <input type="submit" name="login_user" value="Login" class="login-submit" />
  </form>
  <a href="#" class="login-forgot-pass">forgot password?</a>
  <div class="underlay-photo"></div>
  <div class="underlay-black"></div>

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
