<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskModel;

class IndexController extends Controller
{
    /**Função para exibir taskList
     * @return view
     */
    public function store()
    {
        $task = TaskModel::all();
        return view('index',['tasks'=>$task]);
    }

    /**Função para exibir formulario de inserção
     * @return view
     */
    public function exibirForm()
    {
        return view('form_create');
    }

    /**Função para exibir formulario de alteraçao
     * @return view
     */
    public function exibirFormAlterar(Request $request)
    {
        $modelTask = TaskModel::find($request->id);
        return view('form_edit',['model'=>$modelTask]);
    }
}
