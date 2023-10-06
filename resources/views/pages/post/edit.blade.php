<x-layouts.app>
    <div class="w-full px-12 pt-5">
        <h2 class="title-font my-6 text-2xl font-medium text-gray-900 dark:text-white sm:text-3xl">
            {{ __('Update post') }}
        </h2>

        <form action="{{ route('posts.update', [ 'post' => $post ]) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="flex gap-6">
                <div class="flex-1 relative mb-4">
                    <x-form.label for="title" class="text-sm leading-7 text-gray-600">
                        {{ __('Title') }}
                    </x-form.label>

                    <x-form.input type="text" id="title" name="title" value="{{ old('title', $post->title)
                }}"/>

                    <x-form.error name="title" />
                </div>

                <div class="flex-1 relative mb-4">
                    <x-form.label for="title" class="text-sm leading-7 text-gray-600">
                        {{ __('Slug') }}
                    </x-form.label>

                    <x-form.input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug)
                    }}"/>

                    <x-form.error name="slug" />
                </div>
            </div>

            <div class="relative mb-4">
                <x-form.label for="summary" class="text-sm leading-7 text-gray-600">
                    {{ __('Summary') }}
                </x-form.label>

                <x-form.textarea id="summary" name="summary" rows="5">
                    {{ old('summary', $post->summary) }}
                </x-form.textarea>

                <x-form.error name="summary" />
            </div>

            <div class="relative mb-4">
                <x-form.label for="content" class="text-sm leading-7 text-gray-600">
                    {{ __('Content') }}
                </x-form.label>

                <x-form.rich-text-editor id="content" name="content" rows="25">
                    {{ old('content', $post->content) }}
                </x-form.rich-text-editor>

                <x-form.error name="content" />
            </div>

            <div class="relative mb-4">
                <x-form.toggle label="Publish" name="publish" id="publish"/>
            </div>

            <button type="submit"
                    class="rounded bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white transition-colors duration-300 ease-in-out hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-600">
                {{ __('Update') }}
            </button>
        </form>
    </div>
</x-layouts.app>
