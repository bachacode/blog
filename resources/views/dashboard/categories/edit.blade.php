<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <x-slot name="nav">
        <div class="space-x-4">
            {{-- Index --}}
            <x-jet-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                {{ __('Categories') }}
            </x-jet-nav-link>
            {{-- Create --}}
            <x-jet-nav-link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                {{ __('Create') }}
            </x-jet-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="p-6">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if (!is_null($category->parent_id))
                        <div>
                            <select name="parent_id" class="w-full mb-6 rounded-lg">
                                @foreach ($categories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}" {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}>{{ $parentCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="$category->name" required autofocus autocomplete="name" />
                            <span class="text-xs text-gray-500 mt-2">Maximum 80 characters</span>
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                        

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Create') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
</x-app-layout>
