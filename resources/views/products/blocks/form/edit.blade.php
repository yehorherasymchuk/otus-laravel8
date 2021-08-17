{{ Form::model($product, ['url']) }}
    @include('products.blocks.form.fields')
    <div class="form-group">
        {{ Form::submit(trans('messages.updateProduct'), array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}
