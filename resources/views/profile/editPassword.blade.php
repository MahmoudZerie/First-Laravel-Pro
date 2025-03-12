<x-layout>
    <div class="flex items-center justify-center mt-24">
        <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-md border border-gray-200">
            <!-- Profile Heading -->
            <h2 class="text-2xl font-semibold text-gray-900 text-center mb-6">Change Password</h2>

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
            <form method="POST" action="{{ route('profile.updatePassword') }}" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Current Password Input -->
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" id="current_password" name="current_password"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('current_password') border-red-500 @enderror" required>
                    @error('current_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- New Password Input -->
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new_password" name="new_password"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('new_password') border-red-500 @enderror" required>
                    @error('new_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm New Password Input -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password"
                           class="mt-1 text-black w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-indigo-400
                           @error('confirm_password') border-red-500 @enderror" required>
                    @error('confirm_password')
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
