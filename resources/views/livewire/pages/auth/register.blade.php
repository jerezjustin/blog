<x-form>
    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('Sign up') }}</h5>

    <div>
        <x-form.label for="name"
                      class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            {{ __('Name') }}
        </x-form.label>

        <x-form.input type="text"
                      name="name"
                      id="name"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                      placeholder="John Doe" />
    </div>

    <div>
        <x-form.label for="email"
                      class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            {{ __('Email') }}
        </x-form.label>

        <x-form.input type="email"
                      name="email"
                      id="email"
                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                      placeholder="name@company.com" />
    </div>

    <div>
        <x-form.label for="password">
            {{ __('Password') }}
        </x-form.label>

        <x-form.input type="password"
                      name="password"
                      id="password"
                      placeholder="••••••••" />
    </div>

    <div>
        <x-form.label for="confirm_password">
            {{ __('Confirm Password') }}
        </x-form.label>

        <x-form.input type="confirm_password"
                      name="confirm_password"
                      id="confirm_password"
                      placeholder="••••••••" />
    </div>

    <x-button type="submit"
              class="w-full rounded-lg bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-800">
        {{ __('Register your account') }}
    </x-button>

    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
        {{ __('Already have an account?') }}

        <a wire:navigate
           href="{{ route('login') }}"
           class="text-primary-700 hover:underline dark:text-primary-500">{{ __('Sign in') }}
        </a>
    </div>
</x-form>
