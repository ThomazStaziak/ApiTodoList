<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarefa;

class TarefasController extends Controller
{
    public function show()
    {
      $tarefas = Tarefa::all();

      return $tarefas;
    }

    public function add(request $tarefa)
    {
      $salvou = Tarefa::create([
        "conteudo" => $tarefa->input("conteudo"),
      ]);

      if (!$salvou) 
        return response()->json([$tarefa->input("conteudo") => "não foi possível adicionar"], 500);
      
      return response()->json([$tarefa->input("conteudo") => "adicionado com sucesso"], 201);
    }


    public function update($id)
    {
      $tarefa = Tarefa::find($id);

      if ($tarefa->status == "feito") 
        $tarefa->status = "a fazer";
      else
        $tarefa->status = "feito";
        
      $salvou = $tarefa->save();

      return $tarefa;
    }

    public function delete($id)
    {
      $tarefa = Tarefa::find($id);

      $deletou = $tarefa->delete();

      return json_encode($deletou);
    }
}
