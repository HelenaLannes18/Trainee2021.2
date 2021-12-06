<?php

//Categorias Controller

$router->get('categorias','CategoriasController@view');
$router->post('categorias','CategoriasController@adicionar');
$router->post('categorias/delete','CategoriasController@apagar');
$router->post('categorias/update', 'CategoriasController@update');

// Produtos Controller

$router->get('produtos','ProdutosAdmController@view');
$router->post('produtos','ProdutosAdmController@create');
$router->post('produtos/delete','ProdutosAdmController@delete');
$router->post('produtos/update', 'ProdutosAdmController@update');


?>