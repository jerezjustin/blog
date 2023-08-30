@props(['name'])

@error($name)
    <span {{ $attributes->merge(['class' => 'text-sm italic text-red-500']) }}>
        {{ $message }}
    </span>
@enderror
