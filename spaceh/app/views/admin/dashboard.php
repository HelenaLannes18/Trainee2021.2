<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM - DASHBOARD | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
</head>
<body>
    <!-- Navbar: will be changed later for the real navbar -->
    <div class="navbar"></div>

    <div class="container">
    
        <h2 class="dashboard__message">Bem-Vindo(a) à área administrativa</h2>

        <div class="dashboard__info">
        
            <div class="dropdown" data-dropdown>
                <button class="info__button" data-dropdown-button>Links</button>
                <div class="dashboard__links">
                    <ul>
                        <a href="#">
                            <li>Usuários</li>
                        </a>
                        <hr>
                        <a href="#">
                            <li>Categorias</li>
                        </a>
                        <hr>
                        <a href="#">
                            <li>Produtos</li>
                        </a>
                    </ul>
                </div>
            </div>

            <div class="dropdown" data-dropdown>
                <button class="info__button" data-dropdown-button>Profile</button>
                <div class="dashboard__profile">
                    <ul>
                        <a href="#" class="dashboard__profile__link">
                            <li>Nome: Darth Vader</li>
                        </a>
                        <hr>
                        <a href="#" class="dashboard__profile__link">
                            <li>Permissões: Administrador</li>
                        </a>
                        <hr>
                        <a href="#" class="dashboard__profile__link">
                            <li><span>Sair</span></li>
                        </a>
                    </ul>
                </div>
            </div>

        </div>

    </div>

    <script src="../../../public/js/dashboard.js"></script>
</body>
</html>