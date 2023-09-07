<x-form wire:submit="save">
    <h5 class="text-xl font-medium text-gray-900 dark:text-white">{{ __('Reset password') }}</h5>

    <div>
        <x-form.error name="token" />
    </div>

    <div>
        <x-form.label for="email">
            {{ __('Email') }}
        </x-form.label>

        <x-form.input wire:model="email"
                      type="email"
                      name="email"
                      id="email"
                      class="disabled:opacity-75"
                      disabled />

        <x-form.error name="email" />
    </div>

    <div>
        <x-form.label for="password">
            {{ __('New Password') }}
        </x-form.label>

        <x-form.input wire:model="password"
                      type="password"
                      name="password"
                      id="password"
                      placeholder="••••••••" />

        <x-form.error name="password" />
    </div>

    <div>
        <x-form.label for="password_confirmation">
            {{ __('Confirm New Password') }}
        </x-form.label>

        <x-form.input wire:model="password_confirmation"
                      type="password"
                      name="password_confirmation"
                      id="password_confirmation"
                      placeholder="••••••••" />
    </div>

    <x-button type="submit">
        {{ __('Reset password') }}
    </x-button>
</x-form>
