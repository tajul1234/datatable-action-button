@props(['name','label','model','type'=>'text','placeholder'=>''])

<div>
    <div>
            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">
                {{ $label }}
            </label>
            <input
                type="{{ $type }}"
                id="{{ $name }}"
                wire:model.defer="{{ $model }}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="{{ $placeholder }}"

            />
            @error($model) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
</div>
