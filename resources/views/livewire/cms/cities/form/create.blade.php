<div class="m-6">
    <form class="w-full max-w-lg" wire:submit.prevent="submit">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cities-name">
                    @lang('Name')
                </label>
                <input class="appearance-none
                        block w-full bg-gray-200 text-gray-700
                        border rounded
                        py-3 px-4 mb-3 leading-tight
                        focus:outline-none focus:bg-white"
                       id="cities-name"
                       type="text"
                       wire:model="name"
                       placeholder="@lang('Moscow')">
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-cities-slug">
                    @lang('Slug')
                </label>
                <input class="appearance-none
                        block w-full bg-gray-200 text-gray-700
                        border rounded
                        py-3 px-4 mb-3 leading-tight
                        focus:outline-none focus:bg-white"
                       id="cities-slug"
                       type="text"
                       wire:model="slug"
                       placeholder="@lang('moscow')">
                @error('slug') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="md:flex md:items-space">
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400
                 focus:shadow-outline focus:outline-none
                 text-white font-bold py-2 px-4 rounded"
                        type="submit">
                    @lang('Create')
                </button>
            </div>
        </div>
    </form>
</div>
