<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../public/css/produto.css">
        <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">
        <title>PRODUTO | Space-H</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    </head>

    <body>
    <?php require ('navbar.php');?>
    <?php foreach ($produtos as $produto) : ?>
    <h1><?= $produto->nome ?></h1>
    <?php endforeach; ?>
        
        <hr>
        <div class="slideshow-container">

            <div class="mySlides " id="<?=$produto->id?>">
              <div class="numbertext">1 / 3</div>
              <img src="../../../public/assets/imgh/<?= $produto->imagem ?>" style="width:100%">
              <div class="text">Texto 1</div>
            </div>
            
            <div class="mySlides ">
              <div class="numbertext">2 / 3</div>
              <img src="../../../public/assets/imgh/<?= $produto->imagem ?>" style="width:100%">
              <div class="text">Texto 2</div>
            </div>
            
            <div class="mySlides ">
              <div class="numbertext">3 / 3</div>
              <img src="../../../public/assets/imgh/<?= $produto->imagem ?>" style="width:100%">
              <div class="text">Texto 3</div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
        </div>
        <br>       
        <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            /* script para o funcionamento do carrossel */
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";
              dots[slideIndex-1].className += " active";
            }
        </script>
        
        <br>
        <div class="cla_e_prec"><!CLASSE - PREÇO>

            <div>

                

                <h2>CATEGORIA:</h2>


                <p>CATEGORIA: <?= $produto->categoria ?></p>

            </div>
            
            <div><!ConjuntoPREÇO: - (INSERIR PREÇO)>

                

                <h2>PREÇO:</h2>
                
                <p>PREÇO:<?= $produto->preco ?></p>

            </div>
            

        </div>
        <hr>
        <div class="desc_e_pa"><!CONJUNTO DESCRIÇÃO E PARÁGRAFOS DESCRITIVOS>

            <h2>DESCRIÇÃO</h2>

            <p>DESCRIÇÃO:<?= $produto->descricao ?></p>

            

        </div>
        <?php require('footer.php'); ?>
    </body>