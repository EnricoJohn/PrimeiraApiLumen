<?php

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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('tickets', 'TicketController@index');
    $router->post('tickets', 'TicketController@store');
    $router->get('tickets/{ticket_id}','TicketController@show');
    $router->put('tickets/{ticket_id}','TicketController@update');
});
