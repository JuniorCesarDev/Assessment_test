<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Http\JsonResponse;
use JustSteveKing\StatusCode\Http;

class StoreController extends Controller
{
    public function Store(Request $request)
    {
        //dd('Cadastroooo');
        // $input_campo = $request->input('concurso');
        // $dadosRepetidos = Mega::where('concurso',$input_campo)->get();
        // $query  =  $dadosRepetidos;
      
        // if( isset($query->toArray()[0]['concurso'] ) ){
        //     return new JsonResponse([
        //         'mensagem' => 'Cadastro Duplicado'
        //     ],Http::BAD_REQUEST());
        // }

        return new JsonResponse([
            $cadastro = Mega::Create([
                'concurso' => $request->input('concurso'),
                'data_do_concurso' => $request->input('data_do_concurso'),
                'dezenas' => $request->input('dezenas'),
                'premiacao' => $request->input('premiacao'),
                'premiacao_atual' => $request->input('premiacao_atual'),
                'local_ganhador' => $request->input('local_ganhador'),
                'prox_sorteio' => $request->input('prox_sorteio'),
                'valor_acumulado' => $request->input('valor_acumulado'),
            ])
        ],Http::OK());
    }
}
