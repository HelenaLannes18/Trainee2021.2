<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Adm Categorias</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../../public/css/adm-categorias.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Squada+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <!-- Titulo -->
  <div>
    <h1 class="title">LISTA DE CATEGORIAS</h1>
  </div>

  <!-- Barra de Pesquisar -->

  <form action="" method="" id="form-pesquisa">
    <input type="search" name="nome-categoria" id="barra-pesquisa" placeholder="Digite sua busca">
    <input type="submit" value="Pesquisar" id="botao-buscar">
  </form>

  <!-- Tabela -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="5">Categorias</th>
        <th colspan="2">Ação</th>
      </tr>
    </thead>
    <tbody">
      <?php foreach ($categorias as $categoria) : ?>
        <tr>
          <td colspan="5" class="align-middle larguraCategoria"><?= $categoria->categoria ?></td>
          <td colspan="2">
            <!-- Botão Editar -->
            <button type="button" class="button editar" data-toggle="modal" data-target="#exampleModalCenter<?= $categoria->id ?>">Editar
            </button>

            <!-- Botão Excluir -->
            <button type="button" class="button excluir" data-toggle="modal" data-target="#exampleModal1<?= $categoria->id ?>">Excluir
            </button> 
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Modal Editar -->

  <?php foreach ($categorias as $categoria) : ?>
  <div class="modal fade" id="exampleModalCenter<?= $categoria->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editar categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="categorias-adm/update" method="POST">
          <div class="modal-body">
              <div>
                <input name="categoria" type="text" class="form-control" placeholder="Adicione o nome da categoria" value="<?= $categoria->categoria ?>" required>
              </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" value="<?= $categoria->id ?>" name="id">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

  <!-- MODAL Excluir -->

  <?php foreach ($categorias as $categoria) : ?>
  <div class="modal fade" id="exampleModal1<?= $categoria->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong>Exclusão da categoria</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja excluir esta categoria?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn editar" data-dismiss="modal">Cancelar</button>
            <form action="categorias-adm/delete" method="POST">
              <input type="hidden" value="<?= $categoria->id ?>" name="id">
              <button type="submit" class="btn excluir">Excluir</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  <?php endforeach; ?>

  <!-- Botão Adicionar Categoria -->

  
  <button type="button" class="btn1" data-toggle="modal" data-target="#modalAdicionar">Adicionar categoria</button>
    
  <!-- Modal Adicionar Categoria--> 

  <?php foreach ($categorias as $categoria) : ?>
    
    <div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Nova Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="categorias-adm">
              <div class="form-group">
                <label for="formGroupExampleInput">Nome da Categoria</label>
                <input name="categoria" type="text" class="form-control" id="formGroupExampleInput" required>
              </div>
                <div class="modal-footer">
                  <button type="button" class="fechar" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="salvar">Salvar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>