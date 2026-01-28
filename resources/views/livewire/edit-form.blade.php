<div>

    @if (session('success'))
    <p class="text-green-500">{{ session('success') }}</p>

    @endif

<form class="max-w-sm mx-auto space-y-4" wire:submit="Updatedata">
    <div>
        <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
        <input type="text" wire:model="name" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" placeholder="" required />
    </div>
    <div>
        <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">short title</label>
        <input type="text" wire:model="short_title" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="" required />
    </div>
    <div>
        <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Price</label>
        <input type="number"  wire:model="price" step="0.01" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-base rounded-base focus:ring-brand focus:border-brand block w-full px-3.5 py-3 shadow-xs placeholder:text-body" placeholder="" required />
    </div>
    <div>
        <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Stock</label>
        <input type="number" wire:model="stock" id="visitors" class="bg-neutral-secondary-medium border border-default-medium text-heading text-base rounded-base focus:ring-brand focus:border-brand block w-full px-4 py-3.5 shadow-xs placeholder:text-body" placeholder="" required />
    </div>
    <div>
        <button type="submit" class="bg-green-500 p-4 rounded-lg">Update</button>
    </div>
</form>

</div>
