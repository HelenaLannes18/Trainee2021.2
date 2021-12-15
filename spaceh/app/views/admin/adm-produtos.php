<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADM - Produtos | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/adm-produtos.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>

  <body>

  


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
            <form action="produtos" method="GET">
              <input
                type="search"
                name="products__search"
                id="products__search"
                placeholder="Pesquise um produto"
              />
              <button type="submit" id="purple-btn" class="button-animation">Pesquisar</button>
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
                ><button id="purple-btn" class="product__btn button-animation">
                  Visualizar
                </button></a
              >
              <button type="button" id="black-btn" class="product__btn button-animation" data-bs-toggle="modal" data-bs-target="#modal-edit-product<?= $produto->id ?>">
                Editar
              </button>
              <button type="button" id="red-btn" class="product__btn button-animation" data-bs-toggle="modal" data-bs-target="#modal-delete-product<?=$produto->id?>">
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
                  <input
                    type="text"
                    name="add-product-category"
                    id="add-product__category"
                    placeholder="Categoria"
                   
                  />
                 
                  <input
                    type="text"
                    name="add-product-image"
                    id="add-product__image"
                    placeholder="Link da Imagem"
                  />
                
              </div>
              <div class="modal-footer">
                <button type="button" id="black-btn" class="modal-btn button-animation" data-bs-dismiss="modal">Fechar</button>
                <input type="hidden" value="<?= $produto->id ?>" name="id">
                <button type="submit" id="purple-btn" class="modal-btn button-animation">Cadastrar Produto</button>
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
              <button type="button" id="black-btn" class="modal-btn button-animation" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" id="purple-btn" class="modal-btn button-animation">Salvar Alterações</button>
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
              <button type="button" id="black-btn" class="modal-btn button-animation" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" id="red-btn" class="modal-btn button-animation">Apagar</button>
            </div>
            </form>
        </div>
      </div>
    </div>

    <?php endforeach; ?>

    <!-- 
      End Modals 
    -->

    <script src="../../public/js/admProdutos.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
