<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @lang('Cities List')
                </h2>
            </div>
            <div class="ml-3">
                <h2 class="font-semibold leading-tight">
                    <a href="{{ route('cms.cities.create', ['locale' => $locale]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        @lang('Create City')
                    </a>
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('cms.cities.cities-list')
            </div>
        </div>
    </div>
</x-app-layout>
