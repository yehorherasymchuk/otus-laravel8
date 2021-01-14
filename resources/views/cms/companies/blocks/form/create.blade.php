{{ Form::open(['url' => route(\App\Services\Routes\Providers\CMS\CMSRoutes::CMS_COMPANIES_STORE, ['locale' => App::getLocale()])]) }}
    @include('blocks.form.errors')
    @include('cms.companies.blocks.form.fields')
    <div class="form-group">
        {{ Form::submit(trans('messages.addCompany'), array('class' => 'btn btn-success')) }}
    </div>
{{ Form::close() }}
