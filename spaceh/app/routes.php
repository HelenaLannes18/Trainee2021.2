<?php

//Categorias Controller
$router->get('categorias','CategoriasController@view');
$router->post('categorias','CategoriasController@adicionar');
$router->post('categorias/delete','CategoriasController@apagar');
$router->post('categorias/update', 'CategoriasController@update');

$router->get('contato','contatoController@viewContato');

$router->post('contato','contatoController@enviarEmail');
?>