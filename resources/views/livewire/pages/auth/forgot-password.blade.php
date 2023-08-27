<x-form>
    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('Forgot Password?') }}</h5>

    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
        {{ __('Enter the email address associated with your account and we\'ll send you a link to reset your password.') }}
    </div>

    <div>
        <x-form.label for="email">
            {{ __('Email') }}
        </x-form.label>

        <x-form.input type="email"
                      name="email"
                      id="email"
                      placeholder="name@company.com" />
    </div>

    <x-button type="submit">
        {{ __('Send link') }}
    </x-button>
</x-form>
