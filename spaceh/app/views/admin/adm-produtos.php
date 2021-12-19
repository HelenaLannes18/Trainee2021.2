<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADM - PRODUTOS | Space-H</title>
    <link rel="icon" href="../site/img/mini-logo2.png">
    <link rel="stylesheet" href="../../../public/css/adm-produtos.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="../../../public/assets/img_navbar/mini-logo2.png">
  </head>

  <body>

    <?php
        $busca = $_GET['busca'] ?? '';
    ?>

    <!-- Navbar -->
    <?php 
      require('navbar_administrativa.php'); 
    ?>

    <div id="container">
      <!-- Products Header: Contains search bar and add button -->
      <div class="products__header">
        <h2 class="header__title">Lista de Produtos</h2>
        <div class="header__options">
          <button type="button" class="button-animation" data-bs-toggle="modal" data-bs-target="#modal-add-product">
            Adicionar Produto
          </button>
          <div class="header__search">
            <form method="GET">
              <input
                type="search"
                name="busca"
                id="products__search"
                placeholder="Pesquise um produto"
                value="<?=$busca?>"
              />
              <button type="submit" class="button-animation purple-btn">Pesquisar</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Products List -->

      <table class="products__table">
        <thead>
          <tr class="table__header">
            <th>Imagem</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($produtos as $produto) :?>
          <tr class="product__row">
            <td data-label="Imagem" class="product__image">
              <img src="<?=$produto->imagem?>" alt="" />
            </td>
            <td data-label="Nome"><?=$produto->nome?></td>
            <td data-label="Descrição"><?=$produto->descricao?></td>
            <td data-label="Preço">R$ <?=$produto->preco?></td>
            <td data-label="Categoria"><?=$produto->categoria?></td>
            <td data-label="Opções">
              <a href="#"
                ><button class="product__btn button-animation purple-btn">
                  Visualizar
                </button></a
              >
              <button type="button" class="product__btn button-animation black-btn" data-bs-toggle="modal" data-bs-target="#modal-edit-product<?= $produto->id ?>">
                Editar
              </button>
              <button type="button" class="product__btn button-animation red-btn" data-bs-toggle="modal" data-bs-target="#modal-delete-product<?=$produto->id?>">
                Apagar
              </button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>


    <!-- 
      Modals 
    -->

    <!-- Modal: Add Product-->

    

    <div class="modal fade" id="modal-add-product" tabindex="-1" aria-labelledby="modal-add-title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="produtos-adm" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-add-title">Adicionar Produtos</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <input
                    type="text"
                    name="add-product-name"
                    id="add-product__name"
                    placeholder="Nome"
                  />
                  <input
                    type="text"
                    name="add-product-description"
                    id="add-product__description"
                    placeholder="Digite a descrição do produto"
                  />
                  <input
                    type="number"
                    name="add-product-price"
                    id="add-product__price"
                    placeholder="Preço (R$)"
                    step=".01"
                  />
                  <select name="add-product-category" id="add-product__category" >
                    <option value="" disabled selected hidden id="selecione-categoria">Selecione uma Categoria</option>
                  <?php foreach($categorias as $categoria) :?>
                    <option><?= $categoria->id ?></option>
                  <?php endforeach; ?>
                  </select>
                  <input
                    type="text"
                    name="add-product-image"
                    id="add-product__image"
                    placeholder="Link da Imagem"
                  />
                
              </div>
              <div class="modal-footer">
                <button type="button" class="modal-btn button-animation black-btn" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="modal-btn button-animation purple-btn">Cadastrar Produto</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    
    <?php foreach($produtos as $produto) :?>
    <!-- Modal: Edit Product -->
    
    <div class="modal fade" id="modal-edit-product<?= $produto->id ?>" tabindex="-1" aria-labelledby="modal-edit-title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="produtos-adm/update" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-edit-title">Editar Produto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  
              <input
                type="text"
                name="edit-product-name"
                id="edit-product__name"
                placeholder="Nome"
                value="<?= $produto->nome ?>"
              />
              <input
                type="text"
                name="edit-product-description"
                id="edit-product__description"
                placeholder="Descrição do Produto"
                value="<?= $produto->descricao ?>"
              />
              <input
                type="number"
                name="edit-product-price"
                id="edit-product__price"
                placeholder="Preço"
                step=".01"
                value="<?= $produto->preco ?>"
              />
              <input
                type="text"
                name="edit-product-category"
                id="edit-product__category"
                placeholder="Categoria"
                value="<?= $produto->categoria ?>"
              />
              <input
                type="text"
                name="edit-product-image"
                id="add-product__image"
                placeholder="Link da Imagem"
                value="<?= $produto->imagem ?>"
              />
              <input type="hidden" name="id" value="<?= $produto->id ?>">    
                
            </div>
            <div class="modal-footer">
              <button type="button" class="modal-btn button-animation black-btn" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="modal-btn button-animation purple-btn">Salvar Alterações</button>
            </div>
            </form>
        </div>
      </div>
    </div>


    <!-- Modal: Delete Product -->

    <div class="modal fade" id="modal-delete-product<?=$produto->id?>" tabindex="-1" aria-labelledby="modal-delete-title" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="produtos-adm/delete" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-delete-title">Apagar Produto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Deseja realmente excluir o produto da lista? </p>
              <input type="hidden" name="id" value="<?=$produto->id?>">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="modal-btn button-animation black-btn" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="modal-btn button-animation red-btn">Apagar</button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <?php endforeach; ?>

    <!-- 
      End Modals 
    -->

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

        <nav aria-label="Page navigation example" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="/produtos-adm?pagina=<?=$anterior?>">Anterior</a></li>
                <?php
                
                for($i = 1; $i < $totalPaginas + 1; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="/produtos-adm?pagina=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="/produtos-adm?pagina=<?= $proximo ?>">Proximo</a></li>
            </ul>
        </nav>

    </div>


    <!-- <script src="../../public/js/admProdutos.js"></script> -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
