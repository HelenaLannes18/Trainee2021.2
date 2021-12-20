<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUTO | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/viewproduto.css">
    <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">
</head>
<body>

    <?php 
        include('navbar.php');
    ?>

    <div class="container-div">
    <?php foreach($produtos as $produto) : ?>
        <div class="product-image">
            <img src="<?= $produto->imagem ?>" alt="Imagem do Produto">
        </div>
        <div class="product-info">
            <h1 id="nome-produto"><?= $produto->nome ?></h1>
            <p id="desc-produto"><?= $produto->descricao ?></p>
            <p id="cat-produto"><?= $produto->categoria ?></p>
            <p id="info-uteis">! CUIDADO AO MANUSEAR ESSE PRODUTO !</p>
            <button>Adicionar ao Carrinho</button>
        </div>
    <?php endforeach; ?>
    </div>

    <?php 
        include('footer.php');
    ?>


</body>
</html>