<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-xl rounded-2xl space-y-6 mt-3">
        <h2 class="text-2xl font-semibold text-gray-800">Select Contact</h2>

        {{-- <form action="{{ route('messages.show') }}" method="GET"> --}}
            <label for="contact" class="block text-sm font-medium text-gray-700 mb-2">Contact</label>
            <select id="contact" name="contact_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Select a Contact --</option>
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">
                        {{ $contact->first_name }} {{ $contact->surname }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                View Messages
            </button>
        {{-- </form> --}}

        <div class="mt-6">
            <a href="{{ url('/new-chat/') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">
                Start New Chat
            </a>
        </div>
    </div>
</x-app-layout>
