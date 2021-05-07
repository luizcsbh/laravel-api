<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

class ItensController extends Controller
{

    public function index()
    {
        try {
            return response()->json([
                'info'=>'sucess',
                'result' =>Item::all()
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'info' =>'error',
                'message' =>'Não foi possível retornar os dados do Item do Pedido',
                'error' =>$e->getMessage(),
            ], 400);
        }
    }

    public function show(Item $item)
    {
        try {
            return response()->json([
                'info'=>'success',
                'result'=>$item
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'message'=>'Não foi possível recuperar os dados do Item do Pedido',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
       
        $finish = Order::select(['finished'])
                    ->where('orders_id',$request->orders_id)
                    ->get();
        if ($finish[0]->finished == false){
            try {
                $request->validate([
                    'orders_id'=>'required',
                    'products_id'=>'required',
                    'amount'=>'required',
                ]);
    
                $item = Item::create([
                    'orders_id'=>$request->input('orders_id'),
                    'products_id' =>$request->input('products_id'),
                    'amount' =>$request->input('amount'),
                ]);
    
                return response()->json([
                    'info'=>'success',
                    'message'=>'Item gravado no pedido com sucesso',
                    'result'=>$item
                ], 201);
            } catch (Exception $e) {
                return response()->json([
                    'info'=>'error',
                    'message'=>'Não foi possível gravar os dados do Item Pedido',
                    'error'=>$e->getMessage(),
                ], 400);
            }
        }
        return response()->json([
            'info'=>'error',
            'message'=>'Não é possível inserir mais itens. Pedido finalizado ',
        ], 400);
        
    }

    public function update(Request $request, Item $item)
    {

       try {
            $request->validate([
                'orders_id'=>'required',
                'products_id'=>'required',
                'amount'=>'required',
            ]);
            
            $item->orders_id = $request->input('orders_id');
            $item->products_id = $request->input('products_id');
            $item->amount = $request->input('amount');
            $item->save();
            return response()->json([
                'info'=>'success',
                'message'=>'Item alterado com sucessso!',
                'result'=>$item
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'message'=>'Não foi possível alterar os dados do Itens Pedido',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function destroy(Item $item)
    {
       try {
           return response()->json([
               'info'=>'success',
               'message'=>'Item removido!',
               'result'=>$item->delete(),
           ], 200);

       } catch (Exception $e) {
           return response()->json([
               'info'=>'error',
               'message'=>'Não foi possível retornar os dados do Item',
               'error'=>$e->getMessage(),
           ], 400);
       }
    }
}
