<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function list()
    {
        $dados = Store::AllResults();
        return new JsonResponse([
            'mensagem' => 'list',
            'status' => 'ok',
            'dados' => $dados,
        ],Http::OK());
    }

    public function store(Request $request, StoreRequest $storeRequest)
    {
        $input_campo = $request->input('name');
        $dadosRepetidos = Store::where('name',$input_campo)->get();
        $query  =  $dadosRepetidos;
        
        if( isset($query->toArray()[0]['name'] ) ){
            return new JsonResponse([
                'mensagem' => 'Registered book'
            ],Http::BAD_REQUEST());
        }
    
        $store = $storeRequest->validated();
        return new JsonResponse([
            'mensagem' => 'Store Successfully',
            'status' => 'CREATED',
            'dados' => Store::Create($store),
        ],Http::CREATED());
    }

    public function edit(Request $request,$id)
    {
        
       $dataRequest = $request->all();
       $data = Store:: findOrFail($id);

       $data->update($dataRequest);
        return new JsonResponse([
            'mensagem' => 'Edited Successfully',
            'status' => 'ok',
            'dados' => $data,
        ]   ,Http::OK());
    }

    public function delete($id)
    {
        $confId = Store:: where('id',$id)->get();
        if( !isset($confId->toArray()[0]['id']))
        {
            return new JsonResponse([
                'mensagem' => 'Id not found'
            ],Http::BAD_REQUEST());
        }else{
            $data = Store:: findOrFail($id);
            $data->delete($data);

            return new JsonResponse([
                'mensagem' => 'Delete Successfully',
                'status' => 'ok',
                'dados' => $data,
            ]   ,Http::OK());
        }
    }

}
