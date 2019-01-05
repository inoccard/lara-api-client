    <label>Nome:</label>
    <div class="form-group">
        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome Aqui', 'required']) !!}
    </div>

    <label>Decricao:</label>
    <div class="form-group">
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'Descricao do Produto', 'required']) !!}
    </div>
    
    <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-default">
    </div>