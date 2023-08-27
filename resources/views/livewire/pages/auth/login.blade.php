<x-form>
    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('Sign in') }}</h5>

    <div>
        <x-form.label for="email">
            {{ __('Email') }}
        </x-form.label>

        <x-form.input type="email"
                      name="email"
                      id="email"
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

    <div class="flex items-start">
        <div class="flex items-start">
            <div class="flex h-5 items-center">
                <x-form.input id="remember"
                              type="checkbox"
                              value="" />
            </div>

            <x-form.label for="remember"
                          class="ml-2">
                {{ __('Remember me') }}
            </x-form.label>
        </div>

        <a wire:navigate
           href="{{ route('forgot-password') }}"
           class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500">
            {{ __('Forgot Password?') }}
        </a>
    </div>

    <x-button type="submit">
        {{ __('Login to your account') }}
    </x-button>

    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
        {{ __('Not registered?') }}

        <a wire:navigate
           href="{{ route('register') }}"
           class="text-primary-700 hover:underline dark:text-primary-500">{{ __('Create account') }}
        </a>
    </div>
</x-form>
