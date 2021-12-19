<!DOCTYPE html>

<html>

<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link href=".././../../public/css/cssvh.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
  <link rel="icon" href="../site/img/mini-logo2.png">
  
  <title>HOME | Space-H</title>

</head>

<body>

  <?php require ('navbar.php');?>
  

<!--Carousel-->

<div class="slideshow-container">

<div class="mySlides">
  <a href="categorias"><img src=".././../../public/assets/imgh/slides_1.png" style="width:100%" ></a>
</div>

<div class="mySlides">
  <a href="https://www.americanas.com.br"><img src=".././../../public/assets/imgh/slides_2.png" style="width:100%" ></a>
</div>

<div class="mySlides ">
  <img src=".././../../public/assets/imgh/slides_3.png" style="width:100%">
</div>

<div class="mySlides ">
  <img src=".././../../public/assets/imgh/slides_4.png" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>

<br>

<div style="text-align:center" style="background-color: black;" >

  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>

</div>

<!--Script Carousel-->

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

<!--Destaques-->

<div class="center">
  <div class="destaques">
    <h1>DESTAQUES</h1>
  </div>

<!--Destaques parte dos produtos-->

 
  <?php foreach($produtos as $produto) :?>
    <div class="product">
      <img src=".././../../public/assets/imgh/<?= $produto->imagem ?>" alt="" class="product__image">
                  <div class="product__info">
                  <h2 class="product__name"><?= $produto->nome ?></h2>
                  <span class="product__price"><?= $produto->preco ?></span>
                  <span class="product__category"><?= $produto->categoria ?></span>
                  <form action="/viewproduto" method="GET">
                  <input type="hidden" name ="id" value="<?=$produto->id ?>">
                  </div>
                  <button type="submit" class="product__cta" style="font-family: 'Squada One', cursive;">Ver Produto</button>
                  </form>    
                </a>
  </div>  
  <?php endforeach; ?>

  

  
</div>


<?php require ('footer.php');?>
</body>



</html>



