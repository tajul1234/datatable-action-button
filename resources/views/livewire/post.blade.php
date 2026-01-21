<div>
  <div class="py-6">
   @if ('success')
     <p>{{ session('success') }}</p>

     @endif
   @if($create)

    @include('livewire.createpost')

    @endif

     @if($editdatau)

    @include('livewire.edit')

    @endif

    <button  class="p-4 text-white rounded-lg bg-green-500" wire:click="createpost()">Create</button>


<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                   Title
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                   Body
                </th>

                <th scope="col" class="px-6 py-3 font-medium">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if($posts->count()>0)
            @foreach($posts as $post)
            <tr class="bg-neutral-primary-soft border-b  border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$post->title}}
                </th>
                <td class="px-6 py-4">
                    {{$post->body}}
                </td>

                <td class="px-6 py-4">
                    <button class="font-medium text-fg-brand hover:underline" wire:click="editdata({{ $post->id }})">Edit</button>
                     <button class="font-medium text-fg-brand hover:underline bg-red-500" wire:confirm="Are you sure to delete??" wire:click="deleteData({{ $post->id }})">Delete</button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>


            <td>No Posts</td>
            </tr>


            @endif

        </tbody>
    </table>
</div>


</div>
</div>
