<x-layout>
    <div class="flex items-center justify-center mt-24">
        <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-md border border-gray-200">
            <!-- Profile Heading -->
            <h2 class="text-2xl font-semibold text-gray-900 text-center mb-6">Edit Email</h2>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Profile Form -->
            <form method="POST" action="{{ route('profile.updateEmail') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Old Email Input (Disabled) -->
                <div>
                    <label for="old_email" class="block text-sm font-medium text-gray-700">Old Email</label>
                    <input type="email" id="old_email" name="old_email" value="{{ $user->email }}"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm bg-gray-100" disabled>
                </div>

                <!-- New Email Input -->
                <div>
                    <label for="new_email" class="block text-sm font-medium text-gray-700">New Email</label>
                    <input type="email" id="new_email" name="new_email" value="{{ old('new_email') }}"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('new_email') border-red-500 @enderror" required>
                    @error('new_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm New Email Input -->
                <div>
                    <label for="confirm_email" class="block text-sm font-medium text-gray-700">Confirm New Email</label>
                    <input type="email" id="confirm_email" name="confirm_email" value="{{ old('confirm_email') }}"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('confirm_email') border-red-500 @enderror" required>
                    @error('confirm_email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Save Changes Button -->
                <div class="flex justify-between mt-6">
                    <button type="submit"
                            class="w-full bg-indigo-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition-colors duration-300 shadow-md">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
