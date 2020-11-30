@component('blocks.header.index')
    @slot('title', __('messages.companies'))
    @slot('description', __('messages.companiesHeaderDescription'))
    <a class="btn btn-primary btn-lg" href="{{ route(\App\Services\Routes\Providers\CMS\CMSRoutes::CMS_COMPANIES_CREATE) }}"
       role="button">@lang('messages.addCompany')</a>
@endcomponent
