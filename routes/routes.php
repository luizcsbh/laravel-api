<?php

use Illuminate\Http\Request;


Route::group(array('prefix' => 'api'), function()
{

  Route::get('/', function () {
      return response()->json(['message' => 'API Laravel', 'status' => 'Connected']);;
  });

  Route::resource('clientes', 'ClientesController');
  Route::resource('pedidos', 'PedidosController');
});

Route::get('/', function () {
    return redirect('api');
});