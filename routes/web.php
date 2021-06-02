<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return "Api - RH";
});

//rotas dos funcionarios
$router->get('/funcionario', 'FuncionarioController@obterTodos');
$router->get('/funcionario/{id}', 'FuncionarioController@obterPorId');
$router->post('/funcionario', 'FuncionarioController@salvar');
$router->put('/funcionario/{id}', 'FuncionarioController@editar');
$router->delete('/funcionario/{id}', 'FuncionarioController@excluir');

//rotas das vagas
$router->get('/vagas', 'VagasController@obterTodos');
$router->get('/vagas/{id}', 'VagasController@obterPorId');
$router->post('/vagas', 'VagasController@salvar');
$router->put('/vagas/{id}', 'VagasController@editar');
$router->delete('/vagas/{id}', 'VagasController@excluir');
