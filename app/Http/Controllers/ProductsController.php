<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        try {
            return response()->json([
                'info'=>'sucess',
                'result' =>Product::all()
            ]);
        } catch(Exception $e) {
            return response()->json([
                'info' =>'error',
                'result' =>'Não foi possível retornar os dados do Produto',
                'error' =>$e->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'=>'required|max:100',
                'description'=>'required|max:255',
                'price'=>'required',
                'store'=>'required',

            ]);

            $product = Product::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'price' =>$request->input('price'),
                'store'=>$request->input('store'),
            ]);

            return response()->json([
                'info'=>'success',
                'result'=>$product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'result'=>'Não foi possível gravar os dados do Produto',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function show(Product $product)
    {
        try {
            return response()->json([
                'info'=>'success',
                'result'=>$product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'result'=>'Não foi possível recuperar os dados do Produto',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Product $product)
    {
        
        try {
            $request->validate([
                'name'=>'required|max:100',
                'description'=>'required|max:255',
                'price'=>'required',
                'store'=>'required',
            ]);

            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->store = $request->input('store');
            $product->save();

            return response()->json([
                'info'=>'success',
                'result'=>$product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'result'=>'Não foi possível alterar dados do Produto',
                'error'=>$e->getMessage(),
            ], 400);
        }

    }

    public function destroy(Product $product)
    {
       try {
           return response()->json([
               'info'=>['success'=>'Produto removido!'],
               'result'=>$product->delete()
           ]);

       } catch (Exception $e) {
           return response()->json([
               'info'=>'error',
               'result'=>'Não foi possível retornar os dados do Produto',
               'error'=>$e->getMessage(),
           ], 400);
       }
    }
}