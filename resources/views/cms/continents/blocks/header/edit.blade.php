@component('blocks.header.index')
    @slot('title', sprintf('%s #%d', __('messages.editContinents'), $continent->id))
    @slot('description', __('messages.companiesHeaderDescription'))
@endcomponent
