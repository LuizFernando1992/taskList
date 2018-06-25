<form class="form">
        {{csrf_field()}}
    <input type="hidden" name="id" value="{{$model->id}}"/>
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="titulo" class="form-control" id="titulo" name="titulo" value="{{$model->titulo}}">
    </div>
    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="descricao" class="form-control" id="descricao" name="descricao" value="{{$model->descricao}}">
    </div>
    <div class="form-group">
            <label for="data">Data:</label>
            <input type="data" class="form-control col-sm-4" id="data" name="data" value="{{$model->data}}">
        </div>
    <div class="form-check">
        @php
          if($model->status == 1){
              $checked = 'checked';
          }else{
              $checked = '';
          }
        @endphp
        <input type="checkbox" class="form-check-input" id="status" name="status" {{$checked}}>
        <label class="form-check-label" for="status">Concluído</label>
    </div>
    </form>
    <script>
        $('#save').click(function(){
            $.ajax({
                url:'{{url("index/task/update")}}',
                type:'POST',
                data:$('.form').serialize(),
                success:function(response){
                    if(response.status == '200'){
                        $('#taskModal .modal-body').append('<div class="alert alert-success" role="alert">Tarefa alterada com sucesso</div>');
                    }else{
                        $('#taskModal .modal-body').append('<div class="alert alert-danger" role="alert">Erro ao alterar tarefa</div>');
                    }
                }
            })
        })
    </script>
