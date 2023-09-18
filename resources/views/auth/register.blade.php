<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Name -->
                <div class="space-y-2">
                    <x-form.label for="name" :value="__('Name')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="{{ __('Name') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- NPK -->
                <div class="space-y-2">
                    <x-form.label for="npk" :value="__('NPK')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="npk" class="block w-full" type="text" name="npk" :value="old('npk')" required placeholder="{{ __('NPK') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Position -->
                <div class="space-y-2">
                    <x-form.label for="posisi" :value="__('Posisi')" />

                    <div class="relative">
                        <select name="posisi" id="posisi" class="block w-full py-2 pr-10 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                            <option value="" selected disabled>Select</option>
                            <option value="Manajer">Manajer</option>
                            <option value="SPV">SPV</option>
                            <option value="LDR">LDR</option>
                            <option value="JP">JP</option>
                            <option value="Sub JP">Sub JP</option>
                        </select>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="absolute inset-y-0 right-0 m-2 pointer-events-none w-5 h-5 text-gray-400" />
                        </x-slot>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-form.label for="password" :value="__('Password')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="password" class="block w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-form.label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="password_confirmation" class="block w-full" type="password" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" />
                    </x-form.input-with-icon-wrapper>
                </div>

                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />

                        <span>{{ __('Register') }}</span>
                    </x-button>
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>