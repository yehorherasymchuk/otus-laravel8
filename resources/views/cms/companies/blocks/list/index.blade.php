<table class="table table-striped">
    @include('cms.companies.blocks.list.header', ['companies' => $companies])
    <tbody>
        @each('cms.companies.blocks.list.item', $companies, 'company')
    </tbody>
</table>
