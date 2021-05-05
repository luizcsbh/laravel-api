<?php

namespace App\Http\Controllers;

use App\Models\OrderedItem;
use Illuminate\Http\Request;

class OrderedItensController extends Controller
{

    public function index()
    {
        try {
            return response()->json([
                'info'=>'sucess',
                'result' =>OrderedItem::all()
            ]);
        } catch(Exception $e) {
            return response()->json([
                'info' =>'error',
                'result' =>'Não foi possível retornar os dados do Item do Pedido',
                'error' =>$e->getMessage(),
            ], 400);
        }
    }


}
