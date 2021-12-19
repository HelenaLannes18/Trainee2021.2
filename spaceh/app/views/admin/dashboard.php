<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - DASHBOARD | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
    <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">
</head>

<body>

    <?php 
        if(!isset($_SESSION['usuario'])) { 
            header('Location: /login'); 
        }
    ?>

    <!-- Navbar: will be changed later for the real navbar -->
    <?php require ('navbar_administrativa.php');?>

    <div class="container">
    
        <h2 class="dashboard__message">Bem-Vindo(a) à área administrativa</h2>

        <div class="dashboard__info">
        
            <div>
                <div class="info__button">Links</div>
                <div class="dashboard__links">
                    <ul>
                        <a href="usuarios">
                            <li>Usuários</li>
                        </a>
                        <hr>
                        <a href="categorias-adm">
                            <li>Categorias</li>
                        </a>
                        <hr>
                        <a href="produtos-adm">
                            <li>Produtos-ADM</li>
                        </a>
                        <hr>
                        <a href="produtos">
                            <li>Produtos</li>
                        </a>
                        <hr>
                        <a href="deslogar" class="dashboard__profile__link">
                            <li><span>Sair</span></li>
                        </a>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</body>
</html>