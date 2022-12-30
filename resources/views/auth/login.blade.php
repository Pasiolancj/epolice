<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="reltive md:flex lg:flex sm:flex items-start justify-start">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Philippine_National_Police_seal.svg/1200px-Philippine_National_Police_seal.svg.png"
                    style="height: 150px; width: 100px">
                <div class="text-red-500 font-semibold flex" style="font-size: 30px; margin-left:2.5rem">
                    <p> Philippine <br> National <br> Police</p>
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-0" style="margin-top: 3rem">
                <x-input-label for="email" :value="__('Email')" style="font-size: 15px" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4" style="margin-top: 2.5rem">
                <x-input-label for="password" :value="__('Password')" style="font-size: 15px" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4" style="margin-top: 1.5rem">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>


            <button
                class="mt-5 w-full border p-4 bg-slate-900 text-white font-semibold rounded-3xl hover:bg-blue-600 scale-75 duration-300"
                style="height: 5rem" type="submit">LOGIN</button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
