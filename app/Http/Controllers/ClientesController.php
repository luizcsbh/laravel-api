<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests;
use Canducci\ZipCode\Facades\ZipCode;


class ClientesController extends Controller
{
    
    public function index()
    {
        $cliente = Cliente::all();
        return response()->json($cliente);
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

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->cliente_nome = $request->cliente_nome;
        $cliente->cliente_telefone = $request->cliente_telefone;
        $cliente->cliente_cep = $request->cliente_cep;
        $zipCodeInfo = ZipCode::find($request->cliente_cep);
        if($zipCodeInfo){
            $json = $zipCodeInfo->getJson();
            $cliente->cliente_endereco = $json;
        }
        
        $cliente->save();

        return response()->json($cliente, 201);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente:: find($id);

        if(!$cliente){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        $cliente->cliente_nome = $request->cliente_nome;
        $cliente->cliente_telefone = $request->cliente_telefone;
        $cliente->cliente_cep = $request->cliente_cep;
        $zipCodeInfo = ZipCode::find($request->cliente_cep);
        if($zipCodeInfo){
            $json = $zipCodeInfo->getJson();
            $cliente->cliente_endereco = $json;
        }
        $cliente->save();

        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(!$cliente) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        $cliente->delete();
    }
}
