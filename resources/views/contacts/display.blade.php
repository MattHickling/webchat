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
            <input type="text" name="first_name" id="first_name" required class="input" />   
        </div>
        <div>
            <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">Surname</label>
            <input type="text" name="surname" id="surname" class="input" />
        </div>
    </div>

    <!-- Email & Phone -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" class="input" />
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
            <input type="text" name="phone" id="phone" class="input" />
        </div>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        <div>
            <label for="address_line_1" class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
            <input type="text" name="address_line_1" id="address_line_1" class="input" />
        </div>
        <div>
            <label for="address_line_2" class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
            <input type="text" name="address_line_2" id="address_line_2" class="input" />
        </div>
        <div>
            <label for="address_line_3" class="block text-sm font-medium text-gray-700 mb-1">Address Line 3</label>
            <input type="text" name="address_line_3" id="address_line_3" class="input" />
        </div>
    </div>

    <!-- City, County, Post Code -->
    <div class="grid md:grid-cols-3 gap-6">
        <div>
            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
            <input type="text" name="city" id="city" class="input" />
        </div>
        <div>
            <label for="county" class="block text-sm font-medium text-gray-700 mb-1">County</label>
            <input type="text" name="county" id="county" class="input" />
        </div>
        <div>
            <label for="post_code" class="block text-sm font-medium text-gray-700 mb-1">Post Code</label>
            <input type="text" name="post_code" id="post_code" class="input" />
        </div>
    </div>

    <!-- Country & Company -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
            <input type="text" name="country" id="country" class="input" />
        </div>
    </div>
        
    

    <!-- Job Title -->
    <div class="grid md:grid-cols-2 gap-1">
        <div>
            <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="input" />
        </div>

        <div>
            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company</label>
            <input type="text" name="company" id="company" class="input" />
        </div>
    </div>
    <!-- Notes -->
    <div>
        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
        <textarea id="notes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write any notes here..."></textarea>
    </div>

    <!-- Submit -->
    <div>
        <button type="submit"
            class="w-full sm:w-auto inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg shadow-md transition">
            Save Contact
        </button>
    </div>
</form>
</x-app-layout>