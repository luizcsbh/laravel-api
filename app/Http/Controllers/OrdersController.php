<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        try {
            return response()->json([
                'info'=>'sucess',
                'result' =>Order::all()
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'info' =>'error',
                'message' =>'Não foi possível retornar os dados do Pedido',
                'error' =>$e->getMessage(),
            ], 400);
        }
    }

    public function show(Order $order)
    {
        try {
            return response()->json([
                'info'=>'success',
                'result'=>$order
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'message'=>'Não foi possível recuperar os dados do Pedido',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'customers_id'=>'required',
                'order_date'=>'required',
                'finished'=>'required',
            ]);

            $order = Order::create([
                'customers_id'=>$request->input('customers_id'),
                'order_date' =>$request->input('order_date'),
                'finished' =>$request->input('finished'),
            ]);

            return response()->json([
                'info'=>'success',
                'result'=>$order
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'message'=>'Não foi possível gravar os dados do Pedido',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Order $order)
    {
        
        if ($order->finished == false) {
            $request->validate([
                'customers_id'=>'required',
                'order_date'=>'required',
                'finished'=>'required',
            ]);
            
            $order->customers_id = $request->input('customers_id');
            $order->order_date = $request->input('order_date');
            $order->finished = $request->input('finished');
            $order->save();
            return response()->json([
                'info'=>'success',
                'message' =>'Pedido alterado com sucesso!',
                'result'=>$order,
            ], 201);
            
        } else {
            return response()->json([
                'info'=>'error',
                'message'=>'Não foi possível alterar os dados do Pedido',
                
            ], 400);
        }

    }

}
