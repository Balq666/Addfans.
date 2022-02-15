<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-5 rounded shadow my-3">
        <ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
            <li class="mr-2">
                <button type="button" class="inline-block py-4 px-4 text-sm font-medium text-center rounded-t-lg dark:bg-gray-800 dark:text-blue-500 {{ $tab == 'with' ? 'active bg-gray-100 text-blue-600' : 'text-gray-500 text-gray-500 hover:text-gray-600 hover:bg-gray-50' }}" wire:click="setTab('with')">With expired date</button>
            </li>
            <li class="mr-2">
                <button type="button" class="inline-block py-4 px-4 text-sm font-medium text-center rounded-t-lg dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-300 {{ $tab == 'without' ? 'active bg-gray-100 text-blue-600' : 'text-gray-500 hover:text-gray-600 hover:bg-gray-50' }}" wire:click="setTab('without')">Withtout expired date</button>
            </li>
        </ul>
        @if ($tab == 'with')
            <livewire:create-post-creator-with-expired/>
            @else
            <livewire:create-post-creator-without-expired/>
        @endif
    </div>
</div>
