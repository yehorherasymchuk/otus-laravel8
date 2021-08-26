<table class="table table-striped">
    @include('cms.continents.blocks.list.header', ['continents' => $continents])
    <tbody>
        @each('cms.continents.blocks.list.item', $continents, 'continent')
    </tbody>
</table>
