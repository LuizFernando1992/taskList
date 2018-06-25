@extends('layout.base')

@section('content')
<div><button type="button" class="btn btn-primary" id='novo'><i class="fas fa-plus" style="padding-right: 4px"></i>Novo</button></div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Data Criação</th>
        <th scope="col" style="text-align: center">Concluído</th>
      </tr>
    </thead>
    <tbody>
      @if(sizeof($tasks) == 0)
        <tr class="not-results"><td colspan="4"><div><label>Não há tarefas à serem exibidas</label></div></td></tr>
      @endif
      @foreach($tasks as $task)
        <tr>
           <td><a href="#" alt="Alterar" class="edit" data-id="{{$task->id}}"><i class="far fa-edit"></i></a>
                <a href="#" alt="Excluir" class="delete" data-id="{{$task->id}}"><i class="far fa-trash-alt"></i></a></td>
            <td>{{$task->titulo}}</td>
            <td>{{$task->data}}</td>
            @if($task->status == 0)
              <td style="text-align: center"><i class="fas fa-times"></i></td>
            @else
              <td style="text-align: center"><i class="fas fa-check"></i></td>
            @endif
        </tr>
      @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function(){
        /**
        * Função para adicionar novas tarefas
        */
        $('#novo').click(function(e){
            $.ajax({
                url:'{{url("index/task/form")}}',
                type:'GET',
                success:function(response){
                    $('#taskModal .modal-body').html(response);
                    $('#taskModal').modal();
                }
            })
        })

        /**Ao fechar modal, atualiza a pagina*/
        $('#close').click(function(e){
            window.location.reload();
        })

        /**
         Função para editar uma tarefa
        */
        $('.edit').click(function(e){
            e.preventDefault();

            $.ajax({
                url:'{{url("index/task/form/alt")}}',
                type:'POST',
                data:{id:$(this).data('id')},
                success:function(response){
                    $('#taskModal .modal-body').html(response);
                    $('#taskModal').modal();
                }
            })
        })

        //Abre confirmação de exclusão
        $('.delete').click(function(e){
            e.preventDefault();
            $('#modalDelete .modal-footer #confirmaExclusao').data('id',$(this).data('id'));
            $('#modalDelete').modal();
        })
        //Função para excluir uma tarefa
        $('#confirmaExclusao').click(function(){
            $('#modalDelete').modal('hide');
            $.ajax({
                url:'{{url("index/task/delete")}}',
                type:'DELETE',
                data:{id:$(this).data('id')},
                success:function(response){

                    if(response.status == 200){
                        alert('Tarefa excluída com sucesso');

                    }else{
                        alert('Erro ao excluir tarefa');
                    }
                    window.location.reload();
                }
            })
        })
    })
</script>
@include('modal')
@endsection
