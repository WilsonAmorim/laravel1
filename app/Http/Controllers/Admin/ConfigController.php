<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    public function index(Request $request){
    /*missing
        if($request->has('estado')) {
            echo "TEM ESTADO";
        } else {
            echo "NÃO TEM ESTADO";
        }
        if($request->filled('nome')) {
            echo "PREENCHIDO";
        }
        $dados = $request->only(['nome', 'idade', 'cidade']);
         print_r($dados);*/
        $nome = "Wilson";
        $idade = 59;
        $cidade = 'Salvador';

        $dados = [
            'nome'=>$nome,
            'idade'=>$idade,
            'cidade'=>$cidade
        ];
        return view('admin.config', $dados);
    }

    public function info(){
        echo "Configurações INFO";
    }

    public function permissoes(){
        echo "Configurações PERMISSÕES";
    }
}
