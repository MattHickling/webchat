<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-xl rounded-2xl space-y-6 mt-3">
        <h2 class="text-2xl font-semibold text-gray-800">Select Contact</h2>

        <form action="{{ route('messages.show') }}" method="GET">
            <label for="contact" class="block text-sm font-medium text-gray-700 mb-2">Contact</label>
            <select id="contact" name="contact_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Select a Contact --</option>
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}" {{ request('contact_id') == $contact->id ? 'selected' : '' }}>
                        {{ $contact->first_name }} {{ $contact->surname }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                View Messages
            </button>
        </form>
        @if(request('contact_id'))
            <div class="mt-8 p-4 bg-gray-50 border rounded">
                <h3 class="text-lg font-semibold mb-4">Messages</h3>

                @if($messages->count())
                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        @foreach ($messages as $message)
                            <div class="p-3 rounded bg-white shadow">
                                <p class="text-gray-700">{{ $message->body }}</p>
                                <p class="text-xs text-gray-500">{{ $message->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No messages yet. Start the conversation below:</p>
                @endif

                <form action="{{ route('messages.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="contact_id" value="{{ request('contact_id') }}">
                    <textarea name="body" rows="3" class="w-full border rounded p-2" placeholder="Write your message..."></textarea>
                    <button type="submit" cclass="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Send</button>
                </form>
            </div>
        @endif

    </div>
</x-app-layout>
