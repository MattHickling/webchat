@if (session('success'))
    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<x-app-layout>
    @vite('resources/css/app.css')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form action="{{ route('contact.create') }}" method="POST" class="max-w-3xl mx-auto p-6 bg-white shadow-xl rounded-2xl space-y-6 mt-3">
        @csrf

        <h2 class="text-2xl font-semibold text-gray-800">Create Contact</h2>

        <!-- First Name & Surname -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" required class="input" />
                @error('first_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">Surname</label>
                <input type="text" name="surname" id="surname" value="{{ old('surname') }}" class="input" />
                @error('surname')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Email & Phone -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="input" />
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="input" />
                @error('phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Address Lines -->
        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <label for="address_line_1" class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                <input type="text" name="address_line_1" id="address_line_1" value="{{ old('address_line_1') }}" class="input" />
                @error('address_line_1')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address_line_2" class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                <input type="text" name="address_line_2" id="address_line_2" value="{{ old('address_line_2') }}" class="input" />
                @error('address_line_2')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="address_line_3" class="block text-sm font-medium text-gray-700 mb-1">Address Line 3</label>
                <input type="text" name="address_line_3" id="address_line_3" value="{{ old('address_line_3') }}" class="input" />
                @error('address_line_3')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- City, County, Post Code -->
        <div class="grid md:grid-cols-3 gap-6">
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                <input type="text" name="city" id="city" value="{{ old('city') }}" class="input" />
                @error('city')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="county" class="block text-sm font-medium text-gray-700 mb-1">County</label>
                <input type="text" name="county" id="county" value="{{ old('county') }}" class="input" />
                @error('county')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="post_code" class="block text-sm font-medium text-gray-700 mb-1">Post Code</label>
                <input type="text" name="post_code" id="post_code" value="{{ old('post_code') }}" class="input" />
                @error('post_code')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Country -->
        <div>
            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
            <input type="text" name="country" id="country" value="{{ old('country') }}" class="input" />
            @error('country')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Job Title & Company -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}" class="input" />
                @error('job_title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                <input type="text" name="company" id="company" value="{{ old('company') }}" class="input" />
                @error('company')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Notes -->
        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea name="notes" id="notes" rows="4" class="input w-full" placeholder="Write any notes here...">{{ old('notes') }}</textarea>
            @error('notes')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <input type="hidden" name="is_favorite" value="0" />
        <input type="hidden" name="is_blocked" value="0" />
        <input type="hidden" name="is_subscribed" value="0" />

        <!-- Submit -->
        <div>
            <button type="submit"
                class="w-full sm:w-auto inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg shadow-md transition">
                Save Contact
            </button>
        </div>
    </form>
</x-app-layout>
