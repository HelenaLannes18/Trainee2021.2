<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController 
{
    public function view()
    {

        if(isset($_POST['buscar'])) {
            $param = $_POST['nome-categoria'];

            $categorias = App::get('database')->pesquisarCategoria('categorias', $param);
        } else {
            $categorias = App::get('database')->selectAll('categorias');
        }

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
            'categoria' => $_POST['categoria'],
        ];

        App::get('database')->editCategorias('categorias', $parametros, $_POST['id']);

        header('Location: /categorias-adm');
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

class LoginController {

    public function view() {

        return view('admin/login');

    }

}

class UsuariosController 
{   

    public function view()
    {
        $usuarios = App::get('database')->selecionarUsuarios('usuarios');

        return view('admin/viewusuarios',compact('usuarios'));
    }

    public function adicionar()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => $_POST['foto']
    ];

        App::get('database')->adicionaUsuarios('usuarios', $parametros);

        header('Location: /usuarios');
    }

    public function apagar()
    {
        App::get('database')->delete('usuarios', $_POST['id']);

        header('Location: /usuarios');
    }

    public function update()
    {
        $parametros = [
            'nome' => $_POST['nome'],
            'email'=> $_POST['email'],
            'senha'=> $_POST['senha'],
            'foto'=> $_POST['foto']        
        ];

        App::get('database')->editUsuarios('usuarios', $parametros, $_POST['id']);

        header('Location: /usuarios');
    }

}

