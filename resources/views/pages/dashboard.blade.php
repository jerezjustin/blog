<x-layouts.app>
    <div class="w-full px-12 pt-5">

        <div class="my-6 flex flex-col-reverse justify-between gap-8 sm:flex-row sm:gap-6">
            <h2 class="title-font text-2xl font-medium text-gray-900 dark:text-white sm:text-3xl">
                {{ __('Your posts') }}
            </h2>

            <a href="{{ route('posts.create') }}"
                class="float-right rounded bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white transition-colors duration-300 ease-in-out hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-600">
                {{ __('Create new post') }}
            </a>
        </div>

        <div class="my-12 sm:my-6">
            @foreach ($posts as $post)
                <x-post-card :$post :key="$post->slug" />
            @endforeach
        </div>

        <div class="md:py-2">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</x-layouts.app>
