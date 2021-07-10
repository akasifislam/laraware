<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{

    public function render()
    {
        return view('livewire.comments');
    }

    public $comments;

    public $newComment;

    public function mount()
    {
        $initialComment = Comment::latest()->get();
        $this->comments = $initialComment;
    }

    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|min:20']);
    }


    public function addComment()
    {

        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        $this->comments->prepend($createdComment);
        $this->newComment = "";
    }

    public function remove($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        $this->comments = $this->comments->except($commentId);
    }
}
