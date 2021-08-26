@component('blocks.header.index')
    @slot('title', __('messages.continents'))
    @slot('description', __('messages.companiesHeaderDescription'))
    <a class="btn btn-primary btn-lg" href="{{ route('cms.continents.create') }}" role="button">@lang('messages.addContinent')</a>
@endcomponent
