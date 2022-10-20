<div class="mb-4">
    <x-ui.alerts />

    <form wire:submit.prevent="formSubmit">

        <div class="container mx-auto max-w-md text-left space-y-5 bg-orange-500 p-6 border-black rounded-3xl shadow-lg shadow-red-600">

            {{-- Name --}}
            <div>
                <x-jet-label for="name" value="{{ __('name') }}" class="font-bold text-white"/>
                <x-jet-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>

            {{-- Email --}}
            <div>
                <x-jet-label for="email" value="{{ __('email') }}" class="font-bold text-white"/>
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"/>
                <x-jet-input-error for="email" class="mt-2" />
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Subscribe') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>
