<x-form>
    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('Reset password') }}</h5>

    <div>
        <x-form.label for="password">
            {{ __('New Password') }}
        </x-form.label>

        <x-form.input type="password"
                      name="password"
                      id="password"
                      placeholder="••••••••" />
    </div>

    <div>
        <x-form.label for="confirm_password">
            {{ __('Confirm New Password') }}
        </x-form.label>

        <x-form.input type="confirm_password"
                      name="confirm_password"
                      id="confirm_password"
                      placeholder="••••••••" />
    </div>

    <x-button type="submit">
        {{ __('Reset password') }}
    </x-button>
</x-form>
