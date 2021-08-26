@component('blocks.header.index')
    @slot('title', $country->name)
    @slot('description', __('messages.companiesHeaderDescription'))
    <a class="btn btn-primary btn-lg"
       href="{{ route(\App\Services\Routes\Providers\CMS\CMSRoutes::CMS_COUNTRIES_EDIT, ['country' => $country]) }}"
       role="button">@lang('messages.edit')</a>
@endcomponent
