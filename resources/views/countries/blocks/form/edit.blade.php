@include('countries.blocks.form.errors')

{{ Form::model($country, ['url' => route('cms.countries.update', ['country' => $country, 'locale' => App::getLocale()]), 'method' => 'PUT']) }}
    @include('countries.blocks.form.fields')
    <div class="form-group">
        {{ Form::submit(trans('messages.edit'), array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}
