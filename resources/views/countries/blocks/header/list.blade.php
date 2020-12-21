@component('blocks.header.index')
    @slot('title', __('messages.countries'))
    @slot('description', __('messages.companiesHeaderDescription'))
    <a class="btn btn-primary btn-lg" href="{{ route('cms.countries.create', ['locale' => App::getLocale()]) }}" role="button">@lang('messages.addCountry')</a>
@endcomponent
