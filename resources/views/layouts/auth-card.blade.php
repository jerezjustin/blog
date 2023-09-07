<x-layouts.app>
    <div class="flex flex-1 items-center justify-center">
        <div
             class="infinite relative w-full max-w-sm before:absolute before:inset-4 before:-z-0 before:block before:skew-y-6 before:animate-[pulse_5s_ease-in-out_infinite] before:bg-primary-500/50 before:blur-3xl before:content-['']">
            <div
                 class="relative w-full max-w-sm rounded-lg border border-gray-200 bg-white/50 p-4 backdrop-blur-3xl dark:border-gray-700 dark:bg-gray-800/50 sm:p-6 md:p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layouts.app>
