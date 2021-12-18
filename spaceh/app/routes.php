<?php

//Categorias Controller
$router->get('categorias-adm','CategoriasController@view');
$router->post('categorias-adm','CategoriasController@adicionar');
$router->post('categorias-adm/delete','CategoriasController@apagar');
$router->post('categorias-adm/update', 'CategoriasController@update');

// Produtos Controller

$router->get('produtos-adm','ProdutosAdmController@view');
$router->post('produtos-adm','ProdutosAdmController@create');
$router->post('produtos-adm/delete','ProdutosAdmController@delete');
$router->post('produtos-adm/update', 'ProdutosAdmController@update');

?>