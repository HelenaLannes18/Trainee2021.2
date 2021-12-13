<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

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
?>