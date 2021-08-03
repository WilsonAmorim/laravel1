<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function list(){
        //$list = DB::select('SELECT * FROM tarefas');
        $list = Tarefa::all();
        return view('tarefas.list',[
            'list' => $list
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){

        $request->validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request->input('titulo');
          //  DB::insert('INSERT INTO tarefas(titulo) VALUES (:titulo)', ['titulo' => $titulo]);
           // $url = route('tarefas.list');

           $t = new Tarefa;
           $t -> titulo = $titulo;
           $t->save();
          
           return redirect()->route('tarefas.list');
    }

    public function edit($id){
        $data = Tarefa::find($id);
        if($data) {
           return view('tarefas.edit', ['data' => $data]);
           
        } else {
            return redirect()->route('tarefas.list');
        }
       
    }

    public function editAction(Request $request, $id){
        $request->validate([
            'titulo' => ['required', 'string']
        ]);
        $titulo = $request->input('titulo');
          $t = Tarefa::find($id);
          $t->titulo = $titulo;
          $t->save();
          
          // Tarefa::find($id)->update(['titulo'=>$titulo]);
           return redirect()->route('tarefas.list'); 
    }

    public function del($id){
     
        //DB::delete('DELETE FROM tarefas WHERE id = :id', [ 'id' => $id]);

        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.list');
    }

    public function done($id){
        //DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', ['id' => $id] ); 

        $t = Tarefa::where('id', $id)->get();
        print_r($t);
        $t->$resolvido = 1 - $t->$resolvido;
        
        $t->save();
            return redirect()->route('tarefas.list'); 
    }
}
