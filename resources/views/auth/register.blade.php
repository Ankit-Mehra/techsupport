<x-landing-layout>
    <x-slot name="heading">
        {{ _('Register for using ticketing system')}}
    </x-slot>
    <form method="POST" action="{{ route('register') }}" class="w-full max-w-2xl p-5 bg-white dark:bg-violet-800 rounded-md shadow-md">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Username')" class="text-lg font-semibold" />
            <x-text-input id="name" class="block mt-1 w-full text-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="johndoe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mt-6">
            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full text-lg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="johndoe@email.com"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full text-lg"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-lg"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
        </div>

        <div class="flex items-center justify-between mt-8">

            <a class="underline text-lg text-gray-500 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

            <x-primary-button class="ml-4 px-6 py-3 text-lg">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-landing-layout>
