@include('cms.continents.blocks.form.errors')
{{ Form::open(['url' => route(\App\Services\Routes\Providers\CMS\CMSRoutes::CMS_CONTINENTS_STORE)]) }}
    @include('cms.continents.blocks.form.fields')
    <div class="form-group">
        {{ Form::submit(trans('messages.addContinent'), array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}
