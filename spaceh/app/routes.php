<?php

//Categorias Controller
$router->get('categorias','CategoriasController@view');
$router->post('categorias','CategoriasController@adicionar');
$router->post('categorias/delete','CategoriasController@apagar');
$router->post('categorias/update', 'CategoriasController@update');

// Produtos Controller

$router->get('produtos-adm','ProdutosAdmController@view');
$router->post('produtos-adm','ProdutosAdmController@create');
$router->post('produtos-adm/delete','ProdutosAdmController@delete');
$router->post('produtos-adm/update', 'ProdutosAdmController@update');

//Login Controller

$router->get('login','LoginController@view');

?>