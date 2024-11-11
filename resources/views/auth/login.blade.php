<x-guest-layout>
    <div class="flex justify-center min-h-screen bg-gray-100">
        <!-- Container -->
        <div class="flex flex-col items-center justify-center w-full max-w-md p-6 bg-white rounded-md shadow-md">
            <!-- Logo -->
            <div class="mb-6">
                <h2 class="text-center text-xl font-semibold text-gray-800 mt-2">SISTEM DATA PRODUKSI <br> PT. COCOINDO ABADI SUKSES</h2>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf

                <!-- Username Field -->
                <div class="mb-4">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')" required autofocus />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-indigo-500">Lupa Password?</a>
                </div>

                <!-- Button Sign In -->
                <x-primary-button class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:bg-blue-700 focus:ring focus:ring-blue-200">
                    {{ __('Sign In') }}
                </x-primary-button>

                <!-- Register Link -->
                <p class="mt-4 text-center text-sm text-gray-600">
                    Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700">Sign Up</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
