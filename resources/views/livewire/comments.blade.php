<div class="flex justify-center">
        <div class="w-6/12">
            <h1 class="my-10 text-3xl">comments</h1>
            <div class="my-4 flex">
            <input type="text" wire:model="newComment" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="what's in your mind">

            <div class="py-2">
                <button wire:click="addComment" class="p-2 bg-blue-500 w-20 rounded shadow text-white">add</button>
            </div>
        </div>
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2">
                <div class="flex justify-start my-2">
                    <p class="font-bold text-lg text-gray-600">{{ $comment['creator'] }}</p>
                    <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $comment['created_at'] }}</p>
                </div>
                <p class="text-gray-800"> {{ $comment['body'] }} </p>
            </div>
        @endforeach
    </div>
</div>