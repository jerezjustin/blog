<div class="flex flex-col md:flex-row flex-1 p-5">
    <section class="md:basis-2/5 lg:basis-1/4">
        <form class="md:pr-12 md:pt-24">
            <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mb-12">
                {{ __('Advanced Search') }}
            </h2>

            <div class="relative mb-4">
                <label for="title" class="leading-7 text-sm text-gray-600">{{ __('Title') }}</label>

                <div class="flex gap-2">
                    <input wire:model.live.debounce.150ms="title" type="text" id="title" name="title"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                    @if (!is_null($title) && $title != '')
                        <button wire:click.prevent="cleanInput('title')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>

                <span class="text-xs text-gray-400">Ex. How to apply SOLID principles</span>

            </div>

            <div class="relative mb-4">
                <label for="full-name" class="leading-7 text-sm text-gray-600">{{ __('Category') }}</label>

                <div class="flex gap-2">
                    <select wire:model.live="category" type="text" id="full-name" name="full-name"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        <option selected hidden></option>

                        @foreach (\App\Models\Category::all() as $categoryItem)
                            <option value="{{ $categoryItem->slug }}">
                                {{ $categoryItem->name }}
                            </option>
                        @endforeach
                    </select>

                    @if (!is_null($category) && $category != '')
                        <button wire:click.prevent="cleanInput('category')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <div class="relative mb-4">
                <label for="full-name" class="leading-7 text-sm text-gray-600">{{ __('Sort By') }}</label>

                <select wire:model.live="sortBy" type="text" id="full-name" name="full-name"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option selected hidden></option>
                    <option value="title">Title</option>
                    <option value="created_at">Date</option>
                </select>
            </div>

            <div class="relative mb-4">
                <label for="full-name" class="leading-7 text-sm text-gray-600">{{ __('Direction') }}</label>

                <select wire:model.live="direction" type="text" id="full-name" name="full-name"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <option value="desc">Descendent</option>
                    <option value="asc">Ascendent</option>
                </select>
            </div>
        </form>
    </section>

    <section class="md:basis-3/5 lg:basis-3/4 border-t-2 pt-12 md:border-t-0 md:border-l-2 border-gray-100">
        @foreach ($posts as $post)
            <x-post-card :$post :key="$post->slug" />
        @endforeach

        <div class="md:p-12">
            {{ $posts->links() }}
        </div>
    </section>
</div>
