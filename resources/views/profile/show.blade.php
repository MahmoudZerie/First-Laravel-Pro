<x-layout>
    <!-- Toast Notification -->
    @if(session('success'))
        <div x-data="{ show: true }"
             x-init="setTimeout(() => show = false, 3000)"
             x-show="show"
             class="fixed bottom-20 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transition-opacity duration-500">
            {{ session('success') }}
        </div>
    @endif

    <div class="font-std mt-24 w-full rounded-2xl bg-white p-10 font-normal leading-relaxed text-gray-900 shadow-xl">
        <div class="flex flex-col md:flex-row">

            <!-- Profile Image Section -->
            <form action="{{ route('profile.updateLogo') }}" method="POST" enctype="multipart/form-data" x-data>
                @csrf
                <div class="relative w-48 h-48 mx-auto">
                    <img src="{{ asset(Auth::user()->employer->logo) }}" alt="Employer Logo"
                         class="rounded-full w-48 h-48 border-4 border-indigo-800 transition-transform duration-300 hover:scale-105 ring ring-gray-300">

                    <!-- Hidden File Input -->
                    <input type="file" name="logo" id="logoInput" hidden
                           @change="$el.form.submit()">

                    <!-- Button to Trigger File Selection -->
                    <button type="button"
                            @click="document.getElementById('logoInput').click()"
                            class="absolute bottom-2 right-2 bg-indigo-800 text-white p-2 rounded-full hover:bg-blue-900 transition duration-300 shadow-lg">
                        ✏️
                    </button>
                </div>
            </form>

            <!-- Profile Info Section -->
            <div class="md:w-2/3 md:pl-8">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-bold text-indigo-800">{{ Auth::user()->name }}</h1>
                    <!-- Edit Name Button -->
                    <a href="/profile/editName">
                        <button class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition duration-300">
                            ✏️
                        </button>
                    </a>
                </div>

                <p class="text-gray-700 mb-6">Software Developer</p>

                <h2 class="text-xl font-semibold text-indigo-800 mb-4">{{ Auth::user()->employer->name }}</h2>
                <p class="text-gray-700 mb-6">Estep Bilişim / Software Developer</p>

                <!-- Account Settings -->
                <h2 class="text-xl font-semibold text-indigo-800 mb-4">Account Settings</h2>
                <ul class="space-y-3 text-gray-700">
                    <!-- Email -->
                    <li class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800"
                                 viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            {{ Auth::user()->email }}
                        </div>
                        <!-- Edit Email Button -->
                        <a href="/profile/editEmail">
                            <button class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition duration-300">
                                ✏️
                            </button>
                        </a>
                    </li>

                    <!-- Change Password -->
                    <li class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-800"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5 8a5 5 0 0110 0v3a3 3 0 11-2 0V8a3 3 0 00-6 0v3a3 3 0 11-2 0V8z"
                                      clip-rule="evenodd"/>
                            </svg>
                            Password
                        </div>
                        <a href="{{ route('profile.editPassword') }}">
                            <button class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition duration-300">
                                ✏️
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Alpine.js (for the toast notification) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x/dist/cdn.min.js" defer></script>
</x-layout>
