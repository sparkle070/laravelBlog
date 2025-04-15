<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Phone No -->
        <div class="mt-4">
            <x-input-label for="phoneno" :value="__('Phone Number')" />
            <x-text-input id="phoneno" class="block mt-1 w-full" type="text" name="phoneno" :value="old('phoneno')"
                required autofocus autocomplete="tel" />
            <x-input-error :messages="$errors->get('phoneno')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />

            <div class="flex items-center">
                <!-- Male -->
                <div class="mr-4">
                    <x-input-label for="male" class="inline-flex items-center" />
                    <input id="male" type="radio" name="gender" value="male" class="form-radio text-indigo-600"
                        {{ old('gender') == 'male' ? 'checked' : '' }} />
                    <span class="ml-2  text-white">{{ __('Male') }}</span>

                </div>

                <!-- Female -->
                <div class="mr-4">
                    <x-input-label for="female" class="inline-flex items-center" />
                    <input id="female" type="radio" name="gender" value="female" class="form-radio text-indigo-600"
                        {{ old('gender') == 'female' ? 'checked' : '' }} />
                    <span class="ml-2  text-white">{{ __('Female') }}</span>

                </div>

                <!-- Other -->
                <div class="mr-4">
                    <x-input-label for="other" class="inline-flex items-center" />
                    <input id="other" type="radio" name="gender" value="other" class="form-radio text-indigo-600"
                        {{ old('gender') == 'other' ? 'checked' : '' }} />
                    <span class="ml-2  text-white">{{ __('Other') }}</span>
                   
                </div>
            </div>

            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="mt-4">
    <label for="email_notifications" class="inline-flex items-center">
        <input id="email_notifications" type="checkbox" name="email_notifications" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        <span class="ml-2 text-sm text-white">{{ __('I want to receive email notifications') }}</span>
    </label>
</div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>