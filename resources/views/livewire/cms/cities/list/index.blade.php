<div class="m-6">
    @include('livewire.cms.cities.list.filters')
    <table class="table-fixed">
        @include('livewire.cms.cities.list.header')
        @include('livewire.cms.cities.list.items')
    </table>
    @include('livewire.cms.cities.list.pagination')
</div>
