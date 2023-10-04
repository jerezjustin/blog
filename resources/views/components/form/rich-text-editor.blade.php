@props(['id'])

@pushonce('additional-resources')
    <script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/6/tinymce.min.js"
            referrerpolicy="origin">
    </script>
@endpushonce

<x-form.textarea id="{{ $id }}" {{ $attributes->merge()->except(['id']) }}>
    {{ $slot }}
</x-form.textarea>

@push('additional-resources')
    <script type="text/javascript">
        tinymce.init({
            selector: '{{ '#' . $id }}',
            plugins: 'codesample',
            skin: (window.localStorage.theme === 'dark'  ? "oxide-dark" : "oxide"),
            content_css: (window.localStorage.theme === 'dark'  ? "dark" : "")
        })
    </script>
@endpush

