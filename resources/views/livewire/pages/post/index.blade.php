<div class="basis-100 flex flex-1 basis-full flex-col p-5 md:flex-row">
    <section class="md:basis-2/5 lg:basis-1/4">
        <form class="md:pr-12 md:pt-24">
            <h2 class="title-font mb-12 text-2xl font-medium text-gray-900 dark:text-white sm:text-3xl">
                {{ __('Advanced Search') }}
            </h2>

            <div class="relative mb-4">
                <x-form.label for="title"
                              class="text-sm leading-7 text-gray-600">{{ __('Title') }}</x-form.label>

                <div class="flex gap-2">
                    <x-form.input wire:model.live.debounce.150ms="title"
                                  type="text"
                                  id="title"
                                  name="title" />

                    @if (!is_null($title) && $title != '')
                        <button wire:click.prevent="cleanInput('title')">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="h-5 w-5 dark:text-white">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <div class="relative mb-4">
                <x-form.label for="full-name"
                              class="text-sm leading-7 text-gray-600">{{ __('Category') }}</x-form.label>

                <div class="flex gap-2">
                    <x-form.select wire:model.live="category"
                                   type="text"
                                   id="full-name"
                                   name="full-name"
                                   class="w-full rounded border border-gray-300 bg-white px-3 py-2 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                        <option selected
                                hidden></option>

                        @foreach (\App\Models\Category::all() as $categoryItem)
                            <option value="{{ $categoryItem->slug }}">
                                {{ $categoryItem->name }}
                            </option>
                        @endforeach
                    </x-form.select>

                    @if (!is_null($category) && $category != '')
                        <button wire:click.prevent="cleanInput('category')">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.5"
                                 stroke="currentColor"
                                 class="h-5 w-5 dark:text-white">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <div class="relative mb-4">
                <x-form.label for="full-name"
                              class="text-sm leading-7 text-gray-600">{{ __('Sort By') }}</x-form.label>

                <x-form.select wire:model.live="sortBy"
                               type="text"
                               id="full-name"
                               name="full-name"
                               class="w-full rounded border border-gray-300 bg-white px-3 py-2 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                    <option selected
                            hidden></option>
                    <option value="title">Title</option>
                    <option value="created_at">Date</option>
                </x-form.select>
            </div>

            <div class="relative mb-4">
                <x-form.label for="full-name"
                              class="text-sm leading-7 text-gray-600">{{ __('Direction') }}</x-form.label>

                <x-form.select wire:model.live="direction"
                               type="text"
                               id="full-name"
                               name="full-name"
                               class="w-full rounded border border-gray-300 bg-white px-3 py-2 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-primary-500 focus:ring-2 focus:ring-primary-200">
                    <option value="desc">Descendent</option>
                    <option value="asc">Ascendent</option>
                </x-form.select>
            </div>
        </form>
    </section>

    <section
             class="border-t border-gray-200 pt-12 dark:border-gray-200/10 md:basis-3/5 md:border-l md:border-t-0 lg:basis-3/4">

        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <x-post-card :$post
                             :key="$post->slug" />
            @endforeach
        @else
            <div class="flex h-full w-full flex-1 flex-col items-center justify-center text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     fill="currentColor"
                     class="h-48 w-48">
                    <path fill-rule="evenodd"
                          d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                          clip-rule="evenodd" />
                </svg>

                <span class="text-center text-xl font-medium">
                    We couldn't find any posts about what you are looking for.
                </span>
            </div>
        @endif

        <div class="md:p-12">
            {{ $posts->links('livewire::tailwind') }}
        </div>
    </section>
</div>
