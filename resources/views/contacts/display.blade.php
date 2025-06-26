@vite('resources/css/app.css')



<form action="{{ route('contact.create') }}" method="POST" class="max-w-2xl mx-auto">
    @csrf

    <!-- First Name & Surname -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="first_name" id="first_name" required
                class="floating-input" placeholder=" " />
            <label for="first_name" class="floating-label">First Name</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="surname" id="surname"
                class="floating-input" placeholder=" " />
            <label for="surname" class="floating-label">Surname</label>
        </div>
    </div>

    <!-- Email & Phone -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email"
                class="floating-input" placeholder=" " />
            <label for="email" class="floating-label">Email</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="phone" id="phone"
                class="floating-input" placeholder=" " />
            <label for="phone" class="floating-label">Phone</label>
        </div>
    </div>

    <!-- Address Lines -->
    @foreach (['1', '2', '3'] as $line)
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="address_line_{{ $line }}" id="address_line_{{ $line }}"
                class="floating-input" placeholder=" " />
            <label for="address_line_{{ $line }}" class="floating-label">Address Line {{ $line }}</label>
        </div>
    @endforeach

    <!-- City, County, Post Code -->
    <div class="grid md:grid-cols-3 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="city" id="city"
                class="floating-input" placeholder=" " />
            <label for="city" class="floating-label">City</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="county" id="county"
                class="floating-input" placeholder=" " />
            <label for="county" class="floating-label">County</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="post_code" id="post_code"
                class="floating-input" placeholder=" " />
            <label for="post_code" class="floating-label">Post Code</label>
        </div>
    </div>

    <!-- Country & Company -->
    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="country" id="country"
                class="floating-input" placeholder=" " />
            <label for="country" class="floating-label">Country</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="company" id="company"
                class="floating-input" placeholder=" " />
            <label for="company" class="floating-label">Company</label>
        </div>
    </div>

    <!-- Job Title & Notes -->
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="job_title" id="job_title"
            class="floating-input" placeholder=" " />
        <label for="job_title" class="floating-label">Job Title</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <textarea name="notes" id="notes" rows="3"
            class="floating-input resize-none" placeholder=" "></textarea>
        <label for="notes" class="floating-label">Notes</label>
    </div>

    <!-- Submit -->
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full sm:w-auto">
        Save Contact
    </button>
</form>
