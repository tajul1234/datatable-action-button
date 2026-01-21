<div class="max-w-3xl mx-auto mt-16 scale-110">

    {{-- Success Message --}}
    @if (session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg text-center font-semibold mb-6 shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- === Form === --}}
    <form wire:submit.prevent="save"
        class="bg-white p-6 rounded-2xl shadow-xl border border-blue-400 mb-10">

        <h2 class="text-2xl font-bold mb-5 text-blue-600 text-center">Add New Invoice</h2>

        {{-- Select2 Type --}}
        <label class="font-semibold text-gray-700">Select Type</label>
       <div wire:ignore>
    <select id="typeSelect" class="js-example-templating w-full p-3 mt-1 mb-3 rounded-lg border border-green-300">
        <option value="">-- Select One --</option>
        <option value="customer">Customer</option>
        <option value="client">Client</option>
        <option value="supplier">Supplier</option>
    </select>
</div>
        @error('type')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        {{-- Name --}}
        <label class="font-semibold text-gray-700">Name</label>
        <input type="text" wire:model="name"
            class="w-full p-3 mt-1 mb-1 rounded-lg border border-blue-300 focus:ring focus:ring-blue-200">
        @error('name')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        {{-- Amount --}}
        <label class="font-semibold text-gray-700">Amount</label>
        <input type="number" wire:model="amount"
            class="w-full p-3 mt-1 mb-1 rounded-lg border border-indigo-300 focus:ring focus:ring-indigo-200">
        @error('amount')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        {{-- Address --}}
        <label class="font-semibold text-gray-700">Address</label>
        <input type="text" wire:model="address"
            class="w-full p-3 mt-1 mb-1 rounded-lg border border-purple-300 focus:ring focus:ring-purple-200">
        @error('address')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        {{-- Date --}}
        <label class="font-semibold text-gray-700">Date</label>
        <input type="text" wire:model="date" id="date"
            class="w-full p-3 mt-1 mb-1 rounded-lg border border-blue-300 focus:ring focus:ring-blue-200">
        @error('date')
            <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
        @enderror

        <button
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg shadow transition mt-4">
            Submit
        </button>
    </form>

    {{-- === Table === --}}
    <div class="bg-white rounded-2xl shadow-xl border-4 border-blue-500 overflow-hidden">
        <table class="w-full text-lg border-collapse border border-blue-500">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="p-4 border">ID</th>
                    <th class="p-4 border">Name</th>
                    <th class="p-4 border">Amount</th>
                    <th class="p-4 border">Address</th>
                    <th class="p-4 border">Date</th>
                    <th class="p-4 border">Status</th>
                    <th class="p-4 border">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="p-4 border">{{ $item->id }}</td>
                        <td class="p-4 border">{{ $item->name }}</td>
                        <td class="p-4 border">{{ $item->amount }}</td>
                        <td class="p-4 border">{{ $item->address }}</td>
                        <td class="p-4 border">{{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}</td>
                        <td class="p-4 border">{{ $item->status ?? 'pending' }}</td>
                        <td class="p-4 border">
                            <button class="bg-red-500 text-white px-4 py-2 rounded"
                                wire:click="deleteuser({{ $item->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@script
<script>
    // Flatpickr
    flatpickr('#date', { locale: 'ru' });

    // SweetAlert Delete
    Livewire.on('deletedata', (event) => {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('delete', { id: event.id });
            }
        });
    });

    // --- Select2 with Images ---
function formatState (state) {

    return state.text;


};

$(".js-example-templating").select2({
  templateResult: formatState,
  templateSelection: formatState
});

 $('.js-example-templating').on('change', function () {
        @this.set('type', $(this).val());
    });




</script>
@endscript
