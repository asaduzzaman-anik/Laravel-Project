@props([
    'idea' => $idea,
])
<x-layout>
    <div class="py-8 max-w-4xl mx-auto">
        <div class="flex justify-between items-center">
            <a href="{{ route('ideas.index') }}" class="flex items-center gap-1 text-sm font-medium">
                <x-icons.arrow-left class="w-5 h-5" />
                Back to ideas
            </a>
            <div class="flex items-center gap-3">
                @if (auth()->id() === $idea->user_id)
                    <button class="btn btn-outlined text-sm font-medium">
                        <x-icons.edit class="w-4 h-4" />
                        Edit
                    </button>
                    <form action="{{ route('ideas.destroy', $idea) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outlined text-sm text-red-800 font-medium">
                            <x-icons.delete class="w-4 h-4" />
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="mt-5 space-y-6">
            <h1 class="font-bold text-4xl mt-5">{{ $idea->title }}</h1>
            <div class="flex items-center gap-4">
                <x-idea.status-label status="{{ $idea->status->value }}">
                    {{ $idea->status->label() }}
                </x-idea.status-label>
                <p class="text-muted-foreground">
                    Created: {{ $idea->created_at->diffForHumans() }}
                </p>
                {{-- @if ($idea->created_at !== $idea->updated_at)
                    <p class="text-muted-foreground">
                        Updated at: {{ $idea->updated_at->diffForHumans() }}
                    </p>
                @endif --}}
            </div>
            <x-card class="text-foreground max-w-none cursor-pointer">
                {{ $idea->description }}
            </x-card>
            @if ($idea->links?->count())
                <div>
                    <h3 class="font-bold text-xl mt-6 mb-2">Links</h3>
                    <div class="space-y-4">
                        @foreach ($idea->links as $link)
                            <x-card href="{{ $link }}" target="blank"
                                class="text-green-700 font-medium flex items-center gap-2 max-w-none cursor-pointer">
                                <x-icons.external class="w-5 h-5" />
                                {{ $link }}
                            </x-card>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

    </div>
</x-layout>
