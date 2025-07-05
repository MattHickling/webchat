<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

   <div class="p-4 bg-gray-50 border rounded">
        <h3 class="text-lg font-semibold mb-4">Messages</h3>

        @if($messages->count())
            <div class="space-y-4 max-h-96 overflow-y-auto">
                @foreach ($messages as $message)
                    <div class="p-3 rounded bg-white shadow">
                        <p class="text-gray-700">{{ $message->body ?? $message->content }}</p>
                        <p class="text-xs text-gray-500">{{ $message->created_at->format('d-m-y H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No messages yet. Start the conversation below:</p>
        @endif

        <form id="send-message-form" action="{{ route('messages.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="contact_id" value="{{ $contactId }}">
            <textarea name="body" rows="3" class="w-full border rounded p-2" placeholder="Write your message..."></textarea>
            <button type="submit" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Send</button>
        </form>
    </div>

</x-app-layout>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
$(document).on('submit', '#send-message-form', function(e) {
    e.preventDefault();

    var form = $(this);
    var formData = form.serialize();

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        success: function(response) {
            $('#messages-container').html(response);
            form.find('textarea[name="body"]').val('');
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert('Failed to send message.');
        }
    });
});

</script>
