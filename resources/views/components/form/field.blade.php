@props(['name', 'type' => 'text', 'label' => false])
<div class="space-y-2">
    @if ($label)
        <label for="{{ $name }}" class="label"> {{ $label }} </label>
    @endif

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class='textarea' {{ $attributes }}>{{ old($name) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="input"
            value="{{ old($name) }}" {{ $attributes }} />
    @endif
    <x-form.error name="{{ $name }}"/>
</div>
