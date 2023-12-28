<x-layouts.app>
    <div class="mx-auto max-w-screen-md py-12">
        <div class="mb-4 flex flex-wrap gap-2">
            @foreach ($post->categories as $category)
                <x-category-tag>{{ $category->name }} </x-category-tag>
            @endforeach
        </div>

        <h1 class="mb-4 text-justify text-4xl font-bold capitalize text-gray-900 dark:text-white">
            {{ $post->title }}
        </h1>

        <div class="flex items-center justify-between">
            <a class="text-gray-700 dark:text-gray-400" href="">
                Posted by

                <span
                    class="font-medium text-gray-900 transition-colors duration-300 ease-in-out hover:text-primary-500 dark:text-white">
                    {{ $post->author->name }}
                </span>
            </a>

            <span class="text-700 flex items-center gap-2 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>

                {{ $post->created_at->format('M j, Y') }}</span>
        </div>

        <div class="mt-8 space-y-2.5 text-justify text-gray-600 dark:text-gray-400">
            {!! $post->content !!}
        </div>
    </div>
</x-layouts.app>
