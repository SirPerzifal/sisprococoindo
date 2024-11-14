<x-guest-layout>
                <!-- Login Form -->
                <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <!-- Username Field -->
                 
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                        <div class="relative">
                            <input type="text" id="username" placeholder="Enter your username" required
                                class="w-full px-10 py-3 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <span class="text-red-500 text-sm hidden" id="usernameError">This field must be filled in</span>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <input type="password" id="password" placeholder="Enter your password" required
                                class="w-full px-10 py-3 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <span class="text-red-500 text-sm hidden" id="passwordError">This field must be filled in</span>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-4">
                        <label class="inline-flex items-center text-sm text-gray-600">
                            <input type="checkbox" class="form-checkbox text-blue-600">
                            <span class="ml-2">Remember Me</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-custom hover:underline">Lupa Password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"  class="custom-button">
                        Sign In
                    </button>
                </form>

                <!-- Register Link -->
                <p class="mt-6 text-center text-sm text-gray-600">Don't have an account?  <a href="{{ route('register') }}" class="text-custom hover:underline">Sign up</a>
                </p>
            </div>
        </div>
    </div>
    
</x-guest-layout>