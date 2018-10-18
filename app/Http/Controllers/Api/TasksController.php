<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;

class TasksController extends Controller
{
    public function show()
    {
      $tarefas = Task::all();

      return $tarefas;
    }

    public function add(request $tarefa)
    {
      $tarefa = $tarefa->input("tarefa");
      $save = Task::create([
        "text" => $tarefa
      ]);
      $save = $save
      ? true
      : false;
      $array = array("adicionado" => $save);
      return $array;
    }


    public function delete($id)
    {
      $id = intval($id);
      $tarefa = Task::find($id);
      $save = $tarefa
      ? $tarefa->delete()
      : false;
      $array = array("deletado" => $save);

      return json_encode($array);
    }

    public function update($id, $paramStatus)
    {
      $id = intval($id);
      $status = Task::find($id);
      if ($paramStatus === "feito") {
        $status->status = 1;
      } else {
        $status->status = 0;
      }
      $save = $status
      ? $status->save()
      : false;
      $array = array("atualizado" => $save);
      return json_encode($array);
    }
}
