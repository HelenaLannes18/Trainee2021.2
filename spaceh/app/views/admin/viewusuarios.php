<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="../../../public/css/cssvu.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="icon" href="../site/img/mini-logo2.png">
    <?php require ('navbar_administrativa.php');?>
    <title>ADM - USUÁRIOS | Space-H</title>

</head>
<body>

<!-- TÍTULO DA PÁGINA -->

   <h2 class="titulo-pagina "><b style="font-size: 3rem;">GESTÃO DE USUÁRIOS</b></h2>
   <div class="linhaHorizontal mb-5"></div>

<!-- BOTÃO ADICIONAR -->


  <div class="container botao-adicionar mb-3" data-toggle="modal" data-target="#modalAdicionarUser">
    <button type="button" class="btn cor-botoes" style="background-color: #4f0ad8;color: white;font-size: 1.5rem;">Adicionar</button>
  </div>


<!-- CONTEÚDO PRINCIPAL -->
   <div class="container table-responsive conteudo-principal mb-5">
       <table class="table table-bordered table-hover shadow" style="border: 1px #101820;">
           <thead>
           <tr>
               <th scope="col"class="titulo-tabela linha-foto"style="background-color:#4f0ad8;">Foto</th>
               <th scope="col"class="titulo-tabela"style="background-color:#4f0ad8;">Nome</th>
               <th scope="col"class="titulo-tabela colunasInvisiveis"style="background-color:#4f0ad8;">Email</th>
               <th scope="col"class="titulo-tabela colunasInvisiveis"style="background-color:#4f0ad8;">Senha</th>
               <th scope="col"class="titulo-tabela larguraAcao"style="background-color:#4f0ad8;">Ação</th>
           </tr>
           </thead>
           <tbody>
           
           <?php foreach ($usuarios as $usuario):?>

           <tr>

               <th scope="row"><img src="../../../public/assets/imgvu/ $usuario->foto; ?>"  alt="Foto do Usuário" class="foto-tabela"></th>
               <td class="align-middle"><?= $usuario->nome; ?></td>
               <td class="align-middle colunasInvisiveis"><?= $usuario->email; ?> </td>
               <td class="align-middle colunasInvisiveis"><?= $usuario->senha; ?></td>
               <td class="align-middle">
                   <div class="btn-group d-flex justify-content-center" role="group">
                       <button type="button" class="btn btn-success border" data-toggle="modal" data-target="#modalEditarUser<?= $usuario->id ?>">Editar<i class="fa fa-pencil" aria-hidden="true"></i></button>
                       <button type="button" class="btn btn-danger border" data-toggle="modal" data-target="#modalExcluirUser"<?= $usuario->id ?>>Excluir<i class="fa fa-trash" aria-hidden="true"></i></button>
                   </div>        
               </td>

           </tr>

           <?php endforeach; ?>  

    <!-- Modal Adicionar -->

      <div class="modal fade" id="modalAdicionarUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar novo usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="/usuarios">

                    <div class="form-group">
                      <label for="formGroupExampleInput">Nome de Usuário</label>
                      <input name="nome" type="text" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Email</label>
                      <input name="email" type="text" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Senha</label>
                      <input name="senha" type="text" class="form-control" id="formGroupExampleInput" required>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-3">Enviar foto:</label>
                      <div class="col-xs-3">
                        <input name="foto" type="file" name="profilepic"required>
                      </div>
                    </div>
                    

                  
            </div>
            <div class="modal-footer">
              <button type="button" class="finalizar" data-dismiss="modal">Fechar</button>
              <button type="submit" class="finalizar">Salvar</button>
            </div>
            </form>
          </div>
        </div>
      </div>

    <!-- Modal Editar -->

    <?php foreach ($usuarios as $usuario):?>
    
      <div class="modal fade" id="modalEditarUser<?= $usuario->id ?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                

                  <form action="/usuarios/update" method="POST">

                      <div class="form-group">
                        <label for="formGroupExampleInput">Nome de Usuário</label>
                        <input name="nome"type="text" class="form-control" id="formGroupExampleInput" value="<?= $usuario->nome ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="formGroupExampleInput">Email</label>
                        <input name="email" type="text" class="form-control" id="formGroupExampleInput" value="<?= $usuario->email ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="formGroupExampleInput">Senha</label>
                        <input name="senha" type="text" class="form-control" id="formGroupExampleInput" value="<?= $usuario->senha ?>" required>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-3">Enviar foto:</label>
                        <div class="col-xs-3">
                          <input name="foto" type="file" name="profilepic" value="<?= $usuario->foto ?>" >
                        </div>
                      </div>
    
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="finalizar" data-dismiss="modal">Fechar</button> 
                <input type="hidden" value="<?= $usuario->id ?>" name="id">
                <button type="submit" class="finalizar">Salvar</button>
                </form>
            </div>
            
          </div>
        </div>
      </div>
     
    <!-- Modal Excluir -->
    
        <div class="modal fade" id="modalExcluirUser" <?= $usuario->id ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                      <div class="form-group">
                        <label for="formGroupExampleInput">Tem certeza de que quer excluir esse usuário?</label>
                        
                      </div>
                    
              </div>
              <div class="modal-footer">

                
                <button type="button" class="finalizar" data-dismiss="modal">Fechar</button>
                  <form action="/usuarios/delete" method="POST">
                <input type="hidden" value="<?= $usuario->id ?>" name="id">
                <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
              </div>
              
            </div>
          </div>
        </div>

      <?php endforeach;?>

           </tbody>

       </table>
   </div>

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
</body>

</html>