<?php


// Contato Controller

$router->get('contato','contatoController@viewContato');
$router->post('contato','contatoController@enviarEmail');

//Categorias Controller

$router->get('categorias-adm','CategoriasController@view');
$router->post('categorias-adm','CategoriasController@adicionar');
$router->post('categorias-adm/delete','CategoriasController@apagar');
$router->post('categorias-adm/update', 'CategoriasController@editCategoria');
$router->post('busca-categorias','CategoriasController@view');

//Usuários Controller

$router->get('usuarios','UsuariosController@view');
$router->post('usuarios','UsuariosController@adicionar');
$router->post('usuarios/delete','UsuariosController@apagar');
$router->post('usuarios/update', 'UsuariosController@update');

//Produtos Controller

$router->get('produtos-adm','ProdutosAdmController@view');
$router->post('produtos-adm','ProdutosAdmController@create');
$router->post('produtos-adm/delete','ProdutosAdmController@delete');
$router->post('produtos-adm/update', 'ProdutosAdmController@update');

//Login Controller

$router->get('login','LoginController@view');
$router->get('logar','LoginController@login');
$router->get('deslogar','LoginController@deslogar');

$router->get('dashboard','DashboardController@view');

//Dashboard

$router->get('dashboard','DashboardController@view');

?>