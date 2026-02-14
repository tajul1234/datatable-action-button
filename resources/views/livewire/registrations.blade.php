<div class="max-w-md mx-auto space-y-4">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-medium">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Full Name -->

        <x-input name="name" model="name" label="Name" placeholder="Enter your full name" type="text" />
         <x-input name="email" model="email" label="Email" placeholder="Enter your email" type="email" />
             <x-input name="phone" model="phone" label="Phone" placeholder="Enter your phone number" type="number" />
         <x-input name="password" model="password" label="Password" placeholder="Enter Password" type="password" />



    
        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-base font-medium transition"
        >
            Submit
        </button>

    </form>
</div>
