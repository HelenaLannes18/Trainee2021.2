<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="icon" href="../site/img/mini-logo2.png">

    <title>Fixed top navbar example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../../../public/css/navbar_adm.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md  fixed-top  personalizada-navbar">
         <a class="navbar-brand" href="#" style="color: #4f0ad8;">
           <img src="../../../public/assets/1 - edit.png"  width="30" height="30" class="d-inline-block align-top" alt="">
           Spaceh
          </a>

      <button class="navbar-toggler bg-dark navbar-dark" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"> </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item active">
            <a class="nav-link st_link "  href="#">Usuários-ADM <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link st_link "  href="#">Categorias-ADM <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link st_link"  href="#">Produtos-ADM <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link st_link"  href="#">Dashboard-ADM <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle drop-custom"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Páginas não-administrativas
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Quem somos</a>
              <a class="dropdown-item" href="#">Produtos</a>
              <a class="dropdown-item" href="#">Home</a>
            </div>
    
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" style="max-width: 80%;" type="text" placeholder="Search" aria-label="Search">
          <button class="btn but_st btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
