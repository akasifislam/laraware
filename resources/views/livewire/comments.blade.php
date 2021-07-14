<div class="flex justify-center">
        <div class="w-8/12">
            <h1 class="my-10 text-3xl">comments</h1>
            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            
            <div>
                @if (session()->has('message'))
                    <div class="p-3 text-green-700 bg-green-300 rounded-md shadow-sm">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <section>
                @if ($image)
                    <img src="{{ $image }}" alt="" width="300">
                @endif
                <input type="file" id="image"  wire:change="$emit('fileChoosen')">
            </section>

            <form class="my-4 flex" wire:submit.prevent="addComment">
                <textarea type="text" rows="8" wire:model.debounce.500ms="newComment" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="what's in your mind"></textarea>
               

                <div class="py-2">
                    <button class="p-2 bg-blue-500 w-20 rounded shadow text-white">share</button>
                </div>
            </form>
        @foreach ($comments as $comment)
            <div class="rounded border shadow p-3 my-2 bg-blue-100">
                <div class="flex justify-between my-2">
                    <div class="flex">
                        <p class="font-bold text-lg text-gray-600">MasterMan</p>
                        <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <i  wire:click="remove({{ $comment->id }})" class="fas fa-times text-red-200 hover:text-red-600 hover:animate-bounce cursor-pointer"></i> 
                </div>
                @if ($comment->image)
                <img src="{{'storage/'. $comment->image }}" alt="aaaa">
                @endif
                <p class="text-gray-800"> {{ $comment->body }} </p>
            </div>
        @endforeach
        {{ $comments->links() }}
    </div>
</div>


<script>
    Livewire.on('fileChoosen', () => {

        let inputField = document.getElementById("image");
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.Livewire.emit('fileUpload',reader.result)
        }

        reader.readAsDataURL(file);
    })
</script>