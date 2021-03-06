<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href=".././../../public/css/cssvc.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">
    <title>CONTATO | Space-H</title>
</head>
<body>

<?php require ('navbar.php');?>
  

    <!--Título da página-->

    <div class="titulo">
        <h1 style="letter-spacing: 2px;font-size:60px">Contato</h1>
    </div>

    <div class="center"style="border-radius: 1%; padding: 0.5% ;">

        <!--Mapa/Localização-->

        <div class="localizacao">
          <iframe src="https://www.google.com/maps/d/embed?mid=1oXeDfLYyMtNam-DDeNJAszOAZO0" style="padding-left:1%;padding-right: 0.7%;" height="600" ></iframe>
        </div>
        
        <!--Título da mensagem-->

        <div class="formulario" style="border-radius: 1%; padding: 1%;">

            <h1 style="text-align: left;text-decoration: underline;">NOS MANDE UMA MENSAGEM</h1>

        </div>
 
        <!--Labels para a mensagem-->
        <form action="contato" method="POST">
            <div class="form-floating mb-3">
            
                <input name="nome" type="text" class="form-control" id="floatingInput" placeholder="nome" style="width: 99%;font-size: 19px;">
                <label for="floatingInput" style="font-size: 19px;">Nome</label>
            </div>
                
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="email" style="font-size: 19px;width: 99%;">
                <label for="floatingInput" style="font-size: 19px;">Endereço de E-mail</label>
            </div>
                
            <div class="form-floating mb-3">
                <input name="assunto" type="text" class="form-control" id="floatingInput" placeholder="assunto"style="font-size: 19px;width: 99%;">
                <label for="floatingInput"style="font-size: 19px;">Assunto</label>
            </div>
                
            <div class="form-floating">
                
                <textarea name="mensagem" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px;font-size: 19px;width: 99%;"></textarea>
                <label for="floatingTextarea2"style="font-size: 19px;">Mensagem</label>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary" href="contato" id="btmsg" style="font-size:26px;padding: 1%;padding-right:5%;margin-left:11.2%;background-color: #4f0ad8;width: 77.5%;margin-bottom: 1%;border-color:#4f0ad8" type="submit">Enviar sua mensagem</button>
            </div>
        </form>
    </div>
        
        
        
           
        
        <!--Imagens com dados da empresa-->

        <div class="teste" >

          <h3><img src=".././../../public/assets/imgvc/local.png" class="img3"></img>FLÓRIDA 32899, EUA<h3>
          <h3><img src=".././../../public/assets/imgvc/telefone.png" class="img2" ></img>408 XXX XXXX</h3>
          <h3><img src=".././../../public/assets/imgvc/email.png" class="img1" ></img>SPACEH404@GMAIL.COM</h3>
       
    </div>
    
</body>

<?php require ('footer.php');?>

</html>