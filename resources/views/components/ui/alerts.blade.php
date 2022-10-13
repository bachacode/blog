@if (session()->has('success'))
    
<div x-data="{ open: true }" x-init="setTimeout(() => {open = false}, 3000)" x-show="open" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-300 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
    <p class="font-bold">Success!</p>
      <span>
        {{ session('success') }}
      </span>
</div>

@endif

@if (session()->has('error'))
    
<div x-data="{ open: true }" x-init="setTimeout(() => {open = false}, 3000)" x-show="open" x-transition:enter="transition duration-300 ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-300 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0" class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
    <p class="font-bold">Error!</p>
      <span>
        {{ session('error') }}
      </span>
</div>

@endif