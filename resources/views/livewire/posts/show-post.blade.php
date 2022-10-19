<div class="grid grid-cols-4 gap-8">

    {{-- Main Content --}}
    <div class="col-span-3 space-y-3">
        @foreach ($posts as $post)
        <div class="bg-indigo-100">
            <x-blog.post :post="$post" />
        </div>
        @endforeach

        {{-- Page links --}}
        <div class="p-2">
            {{ $posts->links() }}
        </div>

    </div>
    {{-- Side Navigation --}}
    <div class="space-y-8">

        {{-- Sorting --}}
        <div class="flex items-center">
            <h2 class="mr-4">Sort:</h2>
        <div class="space-x-4">
            <button wire:click="sortBy('recentAsc')"
                class="{{ $selectedSortBy == 'recentAsc' ? 'bg-indigo-500 text-white' : '' }} p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12" />
                </svg>
            </button>
            <button wire:click="sortBy('recentDesc')"
                class="{{ $selectedSortBy == 'recentDesc' ? 'bg-indigo-500 text-white' : '' }} p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                </svg>
            </button>
        </div>
    </div>
        {{-- Categories --}}
        <div>
            <div class="p-2 mb-2 text-white bg-indigo-500">
                <h2>Categories</h2>
            </div>
            <div class="flex flex-col items-start">
                @foreach ($categories as $category)
                <button wire:click="toggleCategory('{{ $category->id }}')"
                    class="{{ $selectedCategory == $category->id ? 'bg-indigo-500 text-white focus:outline-none' :  ''}} p-2">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
