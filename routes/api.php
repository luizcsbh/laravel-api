<?php

use Illuminate\Http\Request;

Route::get("customers", "CustomersController@index");
Route::get("customers/{customer}", "CustomersController@show");
Route::post("customers", "CustomersController@store");
Route::put("customers/{customer}", "CustomersController@update");
Route::delete("customers/{customer}", "CustomersController@destroy");

Route::get("products", "ProductsController@index");
Route::get("products/{product}", "ProductsController@show");
Route::post("products", "ProductsController@store");
Route::put("products/{product}", "ProductsController@update");
Route::delete("products/{product}", "ProductsController@destroy");

Route::get("orders", "OrdersController@index");
Route::get("orders/{order}", "OrdersController@show");
Route::post("orders", "OrdersController@store");
Route::put("orders/{order}", "OrdersController@update");

Route::get("itens", "ItensController@index");
Route::get("itens/{item}", "ItensController@show");
Route::post("itens", "ItensController@store");
Route::put("itens/{item}", "ItensController@update");
Route::delete("itens/{item}", "ItensController@destroy");