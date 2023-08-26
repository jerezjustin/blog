<li>
    <a
       {{ $attributes->merge(['class' => 'block py-2 pl-3 pr-4 text-white bg-primary-700 rounded md:bg-transparent md:text-primary-500 md:p-0 md:dark:text-primary-500', 'aria-current' => 'page']) }}>
        {{ $slot }}
    </a>
</li>
