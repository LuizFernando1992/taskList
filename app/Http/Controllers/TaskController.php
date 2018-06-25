<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskModel;

class TaskController extends Controller
{
    /**Função para criar nova tarefa
     * @params titulo,descricao,data,status
     * @return array
     */
    public function create(Request $request)
    {
        $post = $this->filtraFields($request->all());
        $insert = TaskModel::create($post);
        if(!$insert)
        {
            return ['status'=>500];
        }
        return ['status'=>200];
    }

    /**Função para alterar uma tarefa
     * @params titulo,descricao,data,status
     * @return array
     */
    public function update(Request $request)
    {
        $post = $this->filtraFields($request->all());
        $update = TaskModel::find($request->id)->update($post);
        if(!$update)
        {
            return ['status'=>500];
        }
        return ['status'=>200];
    }

    /**Função para excluir tarefa
     * @params titulo,descricao,data,status
     * @return array
     */
    public function delete(Request $request)
    {
        $delete = TaskModel::find($request->id)->delete();
        if(!$delete)
        {
            return ['status'=>500];
        }
        return ['status'=>200];
    }

    /**Função para filtrar $_POST da requisição
     * @params array
     * @return array
     */
    public function filtraFields($data)
    {
        $dados = array_map(function($v){
            if($v == 'on')
            {
                $v = 1;
            }
            return $v;
        },$data);
        return array_filter($dados,function($value,$field)
        {
            return $this->isValid($field,$value);
        },ARRAY_FILTER_USE_BOTH);
    }

    /**Função para validar se o campo não esta vazio e não é um token
     * @param campo,valor
     * @return string
     */
    public function isValid($campo,$valor)
	{
		if(!empty($valor) && $campo != '_token')
		{
			return $campo;
		}
	}
}
