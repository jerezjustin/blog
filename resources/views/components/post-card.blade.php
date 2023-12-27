@props(['post', 'authenticated'])

@php
    $postRoute = '';
@endphp

<div
    class="{{ Route::is('dashboard') ? 'md:py-12' : 'md:p-12' }} mb-20 flex flex-col items-start text-gray-600 last:mb-0 dark:text-gray-400 md:mb-0 md:w-full">
    <div class="flex w-full flex-wrap gap-2">
        @foreach ($post->categories as $category)
            <span
                class="rounded bg-primary-100 px-2 py-1 text-xs font-medium uppercase tracking-widest text-primary-500 dark:bg-primary-400/10">
                {{ $category->name }}
            </span>
        @endforeach

        @auth
            @if (Route::is('dashboard'))
                <div
                    class="sm:order-order-first mb-4 ml-auto flex basis-full border-separate items-center justify-end divide-x-2 divide-gray-200 dark:divide-gray-200/10 sm:mb-0 sm:basis-auto">
                    <a href="{{ route('posts.edit', ['post' => $post]) }}"
                        class="px-3 transition-colors duration-300 ease-in-out hover:text-primary-500">Edit</a>
                    <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 transition-colors duration-300 ease-in-out hover:text-primary-500">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <h2
        class="title-font mb-4 mt-4 text-2xl font-medium text-gray-900 first-letter:uppercase dark:text-white sm:text-3xl">
        {{ $post->title }}
    </h2>

    <p class="mb-8 leading-relaxed">
        {{ $post->summary }}
    </p>

    <div class="mb-4 mt-auto flex w-full flex-wrap items-center border-b border-gray-200 pb-4 dark:border-gray-200/10">
        <a href="{{ $postRoute }}" class="inline-flex items-center text-primary-500">
            See More

            <svg class="ml-2 h-4 w-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
        <span
            class="ml-auto mr-3 inline-flex items-center border-r-2 border-gray-200 py-1 pr-3 text-sm leading-none text-gray-400 dark:border-gray-200/10">
            <svg class="mr-1 h-4 w-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>

            {{ $post->reads->count() }}
        </span>
        <span class="inline-flex items-center text-sm leading-none text-gray-400">
            <svg class="mr-1 h-4 w-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                stroke-linejoin="round" viewBox="0 0 24 24">
                <path
                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                </path>
            </svg>

            {{ $post->comments->count() }}
        </span>
    </div>
    <a class="inline-flex cursor-pointer items-center">
        <span class="flex flex-grow flex-col">
            <span class="title-font text-gray-900 dark:text-white">
                Posted by

                <span class="font-medium transition-colors duration-300 ease-in-out hover:text-primary-500">
                    {{ $post->author->name }}
                </span>
            </span>
        </span>
    </a>
</div>
