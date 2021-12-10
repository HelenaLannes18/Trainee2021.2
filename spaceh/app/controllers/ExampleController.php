<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController 
{
    public function view()
    {
        $categorias = App::get('database')->selectAll('categorias');

        return categorias('categorias',compact('categorias'));
    }

    public function adicionar()
    {
        $parametros = [
            'categoria' => $_POST['categoria']
        ];

        App::get('database')->adicionaCategorias('categorias', $parametros);

        header('Location: /categorias');
    }

    public function apagar()
    {
        App::get('database')->delete('categorias', $_POST['id']);

        header('Location: /categorias');
    }

    public function update()
    {
        $parametros = [
            'categoria' => $_POST['categoria'],
        ];

        App::get('database')->editCategorias('categorias', $parametros, $_POST['id']);

        header('Location: /categorias');
    }
}

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

        header('location: /produtos');

    }

    public function delete()
    {
       App::get('database')->deleteProducts('produtos', $_POST['id']);
       
       header('location: /produtos');       
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

        header('location: /produtos');
    }
}



class ExampleController
{
    public function index()
    {
        
    }

    public function show()
    {

    }

    public function create()
    {
 
    }

    public function store()
    {

    }

    public function edit()
    {
  
    }

    public function update()
    {
        
    }

    public function delete()
    {
 
    }
}