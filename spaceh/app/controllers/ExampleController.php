<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController 
{
    public function view()
    {
        $categorias = App::get('database')->selectAll('categorias');

        return view('admin/adm-categorias',compact('categorias'));
    }

    public function adicionar()
    {
        $parametros = [
            'categoria' => $_POST['categoria']
        ];

        App::get('database')->adicionaCategorias('categorias', $parametros);

        header('Location: /categorias-adm');
    }

    public function apagar()
    {
        App::get('database')->delete('categorias', $_POST['id']);

        header('Location: /categorias-adm');
    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['nome'],
        ];

        App::get('database')->editCategorias('categorias', $parametros, $_POST['id']);

        header('Location: /categorias-adm');
    }
}

// Produtos ADM

class ProdutosAdmController
{
    public function view()
    {
        $produtos = App::get('database')->selectAll('produtos');

        return view('admin/adm-produtos',compact('produtos'));
    }

    public function create()
    {
        $parametros = [
            'nome' => $_POST['add-product-name'],
            'descricao' => $_POST['add-product-description'],
            'preco' => $_POST['add-product-price'],
            'categoria' => $_POST['add-product-category'],
            'imagem' => $_POST['add-product-image'],
        ];

        App::get('database')->insertProducts('produtos', $parametros);

        header('location: /produtos-adm');

    }

    public function delete()
    {
       App::get('database')->deleteProducts('produtos', $_POST['id']);
       
       header('location: /produtos-adm');       
    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['edit-product-name'],
            'descricao' => $_POST['edit-product-description'],
            'preco' => $_POST['edit-product-price'],
            'categoria' => $_POST['edit-product-category'],
            'imagem' => $_POST['edit-product-image'],
        ];

        App::get('database')->updateProducts('produtos', $parametros, $_POST['id']);

        header('location: /produtos-adm');
    }

}

// Produtos

class ProdutosController
{
    public function view()
    {

        // Pegar Número da página
        $pagina_atual = $_GET['pagina'];
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        // Definir quantidade por página

        $qnt_result_pg = 10;

        // Início da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        // Requisitar do banco

        $produtos = App::get('database')->selectPagination('produtos', $inicio, $qnt_result_pg);

        return view('site/view-produtos',compact('produtos'));
    }

}



class PageController
{
    public function searchProductADM()
    {
        
        if(isset($_GET['product-search'])) {

            $searchContent = $_GET['product-search'];

            $produtos = App::get('database')->searchProducts('produtos', $searchContent);

            if($produtos) {
                return view('admin/adm-produtos',compact('produtos'));
            } else {
                echo "<center><h1>Produto não encontrado!</h1></center>";
                echo "<center><h5>Aguarde para ser redirecionado para a página principal</h5></center>";
                header("refresh:5;url=/produtos-adm");
            }
            
        } 

    }

    // public function searchProduct()
    // {
    //     if(isset($_GET['products-search'])) {

    //         $searchContent = $_GET['products-search'];

    //         $produtos = App::get('database')->searchProducts('produtos', $searchContent);

    //         if($produtos) {
    //             return view('admin/view-produtos',compact('produtos'));
    //         } else {
    //             echo "Produto não encontrado";
    //             header( "refresh:5;url=/produtos-adm" );
    //         }
    //     }

    // }

}
