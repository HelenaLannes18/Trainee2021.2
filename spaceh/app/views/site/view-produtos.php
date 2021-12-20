<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUTOS | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/view-produtos.css">
    <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">
</head>
<body>

    <?php
        $busca = $_GET['busca'] ?? '';
    ?>


    <!-- Navbar -->
    <?php
        require('navbar.php');
    ?>

    <div class="container">
        
        <!-- Ordering Area: Contains search and ordering -->
        
        <div class="ordering-area">
            <form method="GET">
                <input type="text" name="busca" id="ordering__search-bar" placeholder="Pesquisar" value="<?=$busca?>">
                <button type="submit" id="search__button">Pesquisar</button>
            </form>
        </div>

        <!-- Showcase Area: contains product cards -->

        <div class="showcase-area">
        <?php foreach($produtos as $produto) :?>
            <div class="product">
                <form action="produto" method="get">
                    <input type="hidden" name ="id" value="<?=$produto->id ?>">
                    <img src="<?= $produto->imagem ?>" alt="Imagem do Produto" class="product__image">
                    <div class="product__info">
                        <h2 class="product__name"><?= $produto->nome ?></h2>
                        <span class="product__price"><?= $produto->preco ?></span>
                        <span class="product__category"><?= $produto->categoria ?></span>
                    </div>
                    <button type="submit" class="product__cta">Ver Produto</button>
                </form>
            </div> 
        <?php endforeach; ?>
        </div>

        <?php
            $totalPaginas = ceil($paginacao->totalPaginas);
            if ($paginacao->pagina > $totalPaginas) {
                $paginacao->pagina = $totalPaginas;
            }

            if($paginacao->pagina == 1) {
                $anterior = $paginacao->pagina;
            } else {
                $anterior = $paginacao->pagina - 1;
            }

            if($paginacao->pagina == $totalPaginas) {
                $proximo = $paginacao->pagina;
            } else {
                $proximo = $paginacao->pagina + 1;
            }
        ?>   

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="/produtos?pagina=<?=$anterior?>">Anterior</a></li>
                <?php
                
                for($i = 1; $i < $totalPaginas + 1; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="/produtos?pagina=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="/produtos?pagina=<?= $proximo ?>">Proximo</a></li>
            </ul>
        </nav>

    </div>

    <script src="../../../public/js/produtos.js"></script>
    <script src="../../../public/js/viewProdutos.js"></script>
</body>
</html>