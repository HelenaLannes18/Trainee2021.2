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
            'nome' => $_POST['nome'],
        ];

        App::get('database')->editCategorias('categorias', $parametros, $_POST['id']);

        header('Location: /categorias');
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