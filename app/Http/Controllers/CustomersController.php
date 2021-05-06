<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Canducci\ZipCode\Facades\ZipCode;


class CustomersController extends Controller
{

    public function index()
    {
        try {
            return response()->json([
                'info'=>'sucess',
                'result' =>Customer::all()
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'info' =>'error',
                'result' =>'Não foi possível retornar os dados do Clientes',
                'error' =>$e->getMessage(),
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'=>'required|max:100',
                'email'=>'required|max:255',
                'cep'=>'required|max:9',
            ]);

            $customer = Customer::create([
                'name'=>$request->input('name'),
                'email' =>$request->input('email'),
                'cep' =>$request->input('cep'),
            ]);

            $zipCodeInfo = ZipCode::find($request->input('cep'), true);
            $json = $zipCodeInfo->getJson();
            $customer->address = $json;

            return response()->json([
                'info'=>'success',
                'result'=>$customer
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'result'=>'Não foi possível gravar os dados do Cliente',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function show(Customer $customer)
    {
        try {
            return response()->json([
                'info'=>'success',
                'result'=>$customer
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'result'=>'Não foi possível recuperar os dados do Cliente',
                'error'=>$e->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request, Customer $customer)
    {
        
        try {
            $request->validate([
                'name'=>'required|max:100',
                'email'=>'required|max:255',
                'cep'=>'required|max:9',
            ]);

            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->cep = $request->input('cep');
            
            $zipCodeInfo = ZipCode::find($request->input('cep'), true);
            $json = $zipCodeInfo->getJson();
            $customer->address = $json;
            $customer->save();
            
            return response()->json([
                'info'=>'success',
                'result'=>$customer
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'info'=>'error',
                'result'=>'Não foi possível alterar dados do Cliente',
                'error'=>$e->getMessage(),
            ], 400);
        }

    }

    public function destroy(Customer $customer)
    {
       try {
           return response()->json([
               'info'=>['success'=>'Cliente removido!'],
               'result'=>$customer->delete()
           ], 200);

       } catch (Exception $e) {
           return response()->json([
               'info'=>'error',
               'result'=>'Não foi possível retornar os dados do Cliente',
               'error'=>$e->getMessage(),
           ], 400);
       }
    }

}