<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/view-produtos.css">
</head>
<body>

    <!-- Navbar -->
    <?php
        require('navbar.php');
    ?>

    <div class="container">
        
        <!-- Ordering Area: Contains search and ordering -->
        
        <div class="ordering-area">
            <div class="ordering__options">
                <span>Ordenar:</span>
                <select name="ordering-products" id="ordering__select" disabled>
                    <option value="relevance">Relevância</option>
                    <option value="category">Categoria</option>
                    <option value="rising-price">Preço Crescente</option>
                    <option value="decreasing-price">Preço Decrescente</option>
                </select>
            </div>
            <form action="produtos" method="GET">
                <input type="search" name="products-search" id="ordering__search-bar" placeholder="Pesquisar" value="">
                <button type="submit">Pesquisar</button>
            </form>
        </div>

        <!-- Showcase Area: contains product cards -->

        <div class="showcase-area">
        <?php foreach($produtos as $produto) :?>
            <div class="product">
                <a href="#">
                    <img src="<?= $produto->imagem ?>" alt="Imagem do Produto" class="product__image">
                    <div class="product__info">
                        <h2 class="product__name"><?= $produto->nome ?></h2>
                        <span class="product__price"><?= $produto->preco ?></span>
                        <span class="product__category"><?= $produto->categoria ?></span>
                    </div>
                    <button class="product__cta">Ver Produto</button>
                </a>
            </div> 
        <?php endforeach; ?>
        </div>

        <!-- Pagination -->

        <div class="paginate">
            <div class="paginate__item" id="paginate__first">&#171</div>
            <div class="paginate__item" id="paginate__prev">&lt</div>
            <div class="paginate__item" id="paginate__numbers">
                <div>1</div>
            </div>
            <div class="paginate__item" id="paginate__next">&gt</div>
            <div class="paginate__item" id="paginate__last">&#187</div>
        </div>

    </div>

    <script src="../../../public/js/produtos.js"></script>
    <script src="../../../public/js/viewProdutos.js"></script>
</body>
</html>