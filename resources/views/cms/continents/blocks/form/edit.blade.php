@include('cms.continents.blocks.form.errors')

{{ Form::model($continent, ['url' => route('cms.continents.update', ['continent' => $continent]), 'method' => 'PUT']) }}
    @include('cms.continents.blocks.form.fields')
    <div class="form-group">
        {{ Form::submit(trans('messages.edit'), array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}
