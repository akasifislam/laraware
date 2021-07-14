<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Comments extends Component
{
    use WithPagination;



    public $newComment;

    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];


    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }


    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|min:20']);
    }


    public function addComment()
    {
        $image = $this->storeImage();

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
            'image' => $image
        ]);

        // $this->comments->prepend($createdComment);
        $this->newComment = "";
        $this->image = "";
        session()->flash('message', 'Comment added Successfully.');
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }
        $name = Str::random() . '.jpg';
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        // $this->comments = $this->comments->except($commentId);
        session()->flash('message', 'Comment Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5),
        ]);
    }
}
