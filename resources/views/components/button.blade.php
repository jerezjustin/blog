<button
        {{ $attributes->merge(['class' => 'w-full rounded-lg bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-800']) }}>
    {{ $slot }}
</button>
