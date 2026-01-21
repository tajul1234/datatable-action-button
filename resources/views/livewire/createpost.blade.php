
<form class="max-w-sm mx-auto space-y-4" wire:submit="createdata()">
    <div>
        <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Small Input</label>
        <input type="text" id="title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body" wire:model="title" placeholder=""  />
 @error('title')
<p class="text-red-500 ">{{ $message }}</p>

 @enderror

    </div>
    <div>
        <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Base Input</label>
        <input type="text" id="body" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" wire:model="body" placeholder=""  />
    </div>

    <div>
        <button class="bg-green-600 p-4 rounded-lg mr-4" >Submit</button>
 <button  type="button" class="bg-red-600 p-4 rounded-lg" wire:click="cancel">Cancel</button>
    </div>
</form>
