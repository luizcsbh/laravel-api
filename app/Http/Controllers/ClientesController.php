<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('clientes')->get();
        return response()->json($clientes);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if(!$cliente) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return response()->json($cliente);
    }
}
