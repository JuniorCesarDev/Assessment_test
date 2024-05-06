<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;
use App\Http\Requests\BookRequest;


class BookController extends Controller
{
    public function list()
    {
        $dados = Books::AllResults();
        return new JsonResponse([
            'mensagem' => 'list',
            'status' => 'ok',
            'dados' => $dados,
        ],Http::OK());
       
    }

    public function store(Request $request, BookRequest $bookRequest)
    {
        $input_campo = $request->input('name');
        $dadosRepetidos = Books::where('name',$input_campo)->get();
        $query  =  $dadosRepetidos;
        
        if( isset($query->toArray()[0]['name'] ) ){
            return new JsonResponse([
                'mensagem' => 'Registered book'
            ],Http::BAD_REQUEST());
        }
    
        $val = $bookRequest->validated();

        return new JsonResponse([
            'mensagem' => 'Store Successfully',
            'status' => 'CREATED',
            'dados' => Books::Create($val),
        ],Http::CREATED());
    }

    public function edit(Request $request,$id)
    {
       $dataRequest = $request->all();
       $data = Books:: findOrFail($id);

       $data->update($dataRequest);
        return new JsonResponse([
            'mensagem' => 'Edited Successfully',
            'status' => 'ok',
            'dados' => $data,
        ]   ,Http::OK());
     
    }

    public function delete($id)
    {
        $confId = Books:: where('id',$id)->get();
        if( !isset($confId->toArray()[0]['id']))
        {
            return new JsonResponse([
                'mensagem' => 'Id not found'
            ],Http::BAD_REQUEST());
        }else{
            $data = Books:: findOrFail($id);
            $data->delete($data);

            return new JsonResponse([
                'mensagem' => 'Delete Successfully',
                'status' => 'ok',
                'dados' => $data,
            ]   ,Http::OK());
        }
    }
}