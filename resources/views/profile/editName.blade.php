<x-layout>
    <div class="flex items-center justify-center mt-24">
        <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-md border border-gray-200">
            <!-- Profile Heading -->
            <h2 class="text-2xl font-semibold text-gray-900 text-center mb-6">Edit Name</h2>

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
            <form method="POST" action="{{ route('profile.updateName') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Old Name Input (Disabled) -->
                <div>
                    <label for="old_name" class="block text-sm font-medium text-gray-700">Old Name</label>
                    <input type="text" id="old_name" name="old_name" value="{{ $user->name }}"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm bg-gray-100" disabled>
                </div>

                <!-- New Name Input -->
                <div>
                    <label for="new_name" class="block text-sm font-medium text-gray-700">New Name</label>
                    <input type="text" id="new_name" name="new_name" value="{{ old('new_name') }}"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('new_name') border-red-500 @enderror" required>
                    @error('new_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm New Name Input -->
                <div>
                    <label for="confirm_name" class="block text-sm font-medium text-gray-700">Confirm New Name</label>
                    <input type="text" id="confirm_name" name="confirm_name" value="{{ old('confirm_name') }}"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('confirm_name') border-red-500 @enderror" required>
                    @error('confirm_name')
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
