<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

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

    public function store(Request $request)
    {
        $input_campo = $request->input('name');
        $dadosRepetidos = Books::where('name',$input_campo)->get();
        $query  =  $dadosRepetidos;
        
        if( isset($query->toArray()[0]['name'] ) ){
            return new JsonResponse([
                'mensagem' => 'Registered book'
            ],Http::BAD_REQUEST());
        }
        return new JsonResponse([
            $cadastro = Books::Create([
                'name' => $request->input('name'),
                'isbn' => $request->input('isbn'),
                'value' => $request->input('value')
            ])
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
      // dd($data) ;

        // return new JsonResponse([
        //     $edit = Books::Create([
        //         'name' => $request->input('name'),
        //         'isbn' => $request->input('isbn'),
        //         'value' => $request->input('value')
        //     ])
        // ],Http::OK());


    //    // dd("Editar Modal");
    //     $titulo = "Lista de Contas Pagas";
    //     $realizado = PagamentoFixo::find($id);   
    //     $listaCategorias = Categoria::all();   
    //     //dd($realizado);
    //     return view('realizado/editar',compact('realizado','titulo','listaCategorias'));
    }
    
}


