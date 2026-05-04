@props(['name', 'title'])
<div 
    x-data="{ show: false, name: @js($name) }" 
    x-show="show" 
    @open-modal.window="if($event.detail === name) show = true;"
    @keydown.escape.window="show = false" 
    @close-modal.window="show = false"
    x-transition:enter="duration-500" 
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" 
    x-transition:leave="duration-500" 
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs" 
    style="display: none"
    role="dialog" 
    aria-modal=true 
    aria-labelledby="modal-{{ $name }}-title">

    <x-card @click.away="show = false" class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 id="modal-{{ $name }}-title" class="text-xl font-bold">
                {{ $title }}
            </h2>
            <button @click="show = false" aria-label="Close modal" class="w-6 h-6">
                <x-icons.close />
            </button>
        </div>

        {{ $slot }}

    </x-card>

</div>
