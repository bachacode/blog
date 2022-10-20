<div class="max-w-7xl mx-auto>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        {{-- Main Heading --}}
        <div class="flex w-full p-3 space-x-2">

            {{-- Search Box --}}
            <div class="w-3/6">
                <span class="absolute z-10 items-center justify-center w-8 h-full py-3 pl-3 text-base font-normal leading-snug text-center text-gray-400 bg-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                      </svg>
                </span>
                <input wire:model.debounce.300ms='search' type="text" class="relative w-full p-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" placeholder="Search post...">
            </div>

            {{-- Order By --}}
            <div class="relative w-1/6">
                <select wire:model='orderBy' class="relative w-full p-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" id="">
                    <option value="id">ID</option>
                    <option value="title">Title</option>
                    <option value="created_at">Created At</option>
                </select>
            </div>

            {{-- Order Asc --}}
            <div class="relative w-1/6">
                <select wire:model='orderAsc' class="relative w-full p-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" id="">
                    <option value="1">Asc</option>
                    <option value="0">Desc</option>
                </select>
            </div>

            {{-- Per Page --}}
            <div class="relative w-1/6">
                <select wire:model='perPage' class="relative w-full p-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-100" id="">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

        </div>

        {{-- Table --}}
        <table class="w-full divide-y divide-gray-200">
            <thead class="font-bold text-gray-500 bg-indigo-200">
                <tr class="text-center">
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">id</th>
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">title</th>
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">category</th>
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">featured</th>
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">created at</th>
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">updated at</th>
                    <th class="px-2 py-3 text-xs tracking-wider uppercase">actions</th>
                </tr>  
            </thead>

            <tbody class="text-xs divide-y divide-gray-200 bg-indigo-100">

                @foreach ($posts as $post)
                <tr class="text-center">
                    <td class="px-2 py-4 whitespace-nowrap">{{ $post->id }}</td>
                    <td class="px-2 py-4 whitespace-nowrap">{{ Str::limit($post->title, 40, '40') }}</td>
                    <td class="px-2 py-4 whitespace-nowrap">{{ $post->category->name }}</td>
                    <td class="px-2 py-4 whitespace-nowrap"><livewire:buttons.featured :post="$post" :key="'featured'.$post->id" :name="'featured'" /></td>
                    <td class="px-2 py-4 whitespace-nowrap">{{ $post->created_at->format('d/m/y') }}</td>
                    <td class="px-2 py-4 whitespace-nowrap">{{ $post->updated_at->format('d/m/y') }}</td>
                    <td class="px-2 py-4 whitespace-nowrap">

                        <div class="flex justify-center space-x-2">

                            <a href="{{ route('posts.edit', $post) }}">
                                <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                  </svg>                                          
                            </a>
                            <livewire:buttons.delete :post="$post" :key="$post->id" />
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-2 bg-indigo-200 px-4">
            {{ $posts->links() }}
        </div>
        
    </div>
</div>
