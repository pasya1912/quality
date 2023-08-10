<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- NPK -->
        <div>
            <x-input-label for="npk" :value="__('NPK')" />
            <x-text-input id="npk" class="block mt-1 w-full" type="number" name="npk" :value="old('npk')" required autofocus />
            <x-input-error :messages="$errors->get('npk')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <!-- @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif -->

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>

            <a href="{{ route('register') }}" class="ml-3">
                <x-secondary-button>
                    {{ __('Register') }}
                </x-secondary-button>
            </a>

        </div>
    </form>
</x-guest-layout>
