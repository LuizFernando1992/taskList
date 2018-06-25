<form class="form">
    {{csrf_field()}}
<div class="form-group">
    <label for="titulo">Título:</label>
    <input type="titulo" class="form-control" id="titulo" name="titulo">
</div>
<div class="form-group">
    <label for="descricao">Descrição:</label>
    <input type="descricao" class="form-control" id="descricao" name="descricao">
</div>
<div class="form-group">
        <label for="data">Data:</label>
        <input type="data" class="form-control col-sm-4" id="data" name="data" value="{{date('d/m/Y')}}">
    </div>
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="status" name="status">
    <label class="form-check-label" for="status">Concluído</label>
</div>
</form>
<script>
    $('#save').click(function(){
        $.ajax({
            url:'{{url("index/task/create")}}',
            type:'POST',
            data:$('.form').serialize(),
            success:function(response){
                if(response.status == '200'){
                    $('#taskModal .modal-body').append('<div class="alert alert-success" role="alert">Tarefa inserida com sucesso</div>');
                }else{
                    $('#taskModal .modal-body').append('<div class="alert alert-danger" role="alert">Erro ao inserir tarefa</div>');
                }
            }
        })
    })
</script>
