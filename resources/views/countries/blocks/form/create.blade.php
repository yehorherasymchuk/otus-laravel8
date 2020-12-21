@include('countries.blocks.form.errors')
{{ Form::open(['url' => route(CMSRoutes::CMS_COUNTRIES_STORE, ['locale' => App::getLocale()])]) }}
    @include('countries.blocks.form.fields')
    <div class="form-group">
        {{ Form::submit(trans('messages.addCountry'), array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}
