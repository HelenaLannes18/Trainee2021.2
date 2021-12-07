<?php

//Categorias Controller

$router->get('categorias','CategoriasController@view');
$router->post('categorias','CategoriasController@adicionar');
$router->post('categorias/delete','CategoriasController@apagar');
$router->post('categorias/update', 'CategoriasController@update');

//Usuários Controller

$router->get('usuarios','UsuariosController@view');
$router->post('usuarios','UsuariosController@adicionar');
$router->post('usarios/delete','UsuariosController@apagar');
$router->post('usuarios/update', 'UsuariosController@update');

?>