<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADM - Produtos | Space-H</title>
    <link rel="stylesheet" href="../../../public/css/adm-produtos.css" />
  </head>

  <body>
    <!-- Navbar -->
    <?php 
      require('navbar_administrativa'); 
    ?>

    <div class="container">
      <!-- Products Header: Contains search bar and add button -->
      <div class="products__header">
        <h2 class="header__title">Lista de Produtos</h2>
        <input
          type="search"
          name="products__search"
          id="products__search"
          placeholder="Pesquise um produto"
          disabled
        />
        <button class="product__add button-animation">Adicionar Produto</button>
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
                ><button class="product__button button--view button-animation">
                  Visualizar
                </button></a
              >
              <button class="product__button button--edit button-animation">
                Editar
              </button>
              <button class="product__button button--delete button-animation">
                Excluir
              </button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Modal: Add Product-->

    <div id="modal__add__product" class="modal__container">
      <div class="modal">
        <button class="close__modal" id="close__modal">x</button>
        <h3>Adicionar Produto</h3>
        <form action="">
          <input
            type="text"
            name="add-product__name"
            id="add-product__name"
            placeholder="Nome"
          />
          <input
            type="text"
            name="add-product__description"
            id="add-product__description"
            placeholder="Preço (R$)"
          />
          <input
            type="number"
            name="add-product__price"
            id="add-product__price"
            placeholder="Preço"
          />
          <input
            type="text"
            name="add-product__category"
            id="add-product__category"
            placeholder="Categoria"
          />
          <input
            type="button"
            value="Cadastrar Produto"
            class="button-animation"
          />
        </form>
      </div>
    </div>

    <!-- Modal: Edit Product-->

    <div id="modal__edit__product" class="modal__container">
      <div class="modal">
        <button class="close__modal" id="close__modal">x</button>
        <h3>Editar Produto</h3>
        <form>
          <input
            type="text"
            name="edit-product__name"
            id="edit-product__name"
            placeholder="Nome"
          />
          <input
            type="text"
            name="edit-product__description"
            id="edit-product__description"
            placeholder="Preço (R$)"
          />
          <input
            type="number"
            name="edit-product__price"
            id="edit-product__price"
            placeholder="Preço"
          />
          <input
            type="text"
            name="edit-product__category"
            id="edit-product__category"
            placeholder="Categoria"
          />
          <input
            type="button"
            value="Salvar Alterações"
            class="button-animation"
          />
        </form>
      </div>
    </div>

    <!-- Modal: Edit Product-->

    <div id="modal__delete__product" class="modal__container">
      <div class="modal">
        <button class="close__modal" id="close__modal">x</button>
        <h3>Deseja realmente excluir o produto da lista?</h3>
        <button
          class="delete__product__modal button-animation"
          id="confirm-delete"
        >
          Sim
        </button>
        <button
          class="delete__product__modal button-animation"
          id="cancel-delete"
        >
          Cancelar
        </button>
      </div>
    </div>

    <script src="../../public/js/admProdutos.js"></script>
  </body>
</html>
