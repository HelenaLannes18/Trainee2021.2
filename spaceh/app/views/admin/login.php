<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">

    <title>ADM - Login | Space-H</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../../../public/css/login.css" rel="stylesheet">
    
  </head>
  <?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (isset($_SESSION['usuario'])) {
		
      header('Location: /dashboard');
    }
  ?>
  <body class="text-center">

  <?php require ('navbar_administrativa.php');?>

    <form class="form-signin" action="/logar" method="GET">
      <img class="mb-4" src="../../../public/assets/login.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal" style="font-family: 'Squada One', cursive;">Login ADM</h1>
      <label for="inputEmail" class="sr-only"style="font-family: 'Squada One', cursive;">Email address</label>
      <input id="email" name="email" type="email" class="form-control" style="font-family: 'Squada One', cursive;" placeholder="Endereço de email" required autofocus>
      <label for="inputPassword" class="sr-only"style="font-family: 'Squada One', cursive;">Password</label>
      <input id="senha" name="senha" type="password" class="form-control" style="font-family: 'Squada One', cursive;" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label style="font-family: 'Squada One', cursive;">
          <input type="checkbox" value="remember-me" > Mantenha-me conectado
        </label>
      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block" style="background-color: #4f0ad8;border-color: transparent;">Entrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </body>

</html>