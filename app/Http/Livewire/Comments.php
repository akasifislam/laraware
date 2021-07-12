<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;



    public $newComment;



    public function updated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|min:20']);
    }


    public function addComment()
    {

        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1,
        ]);

        // $this->comments->prepend($createdComment);
        $this->newComment = "";
        session()->flash('message', 'Comment added Successfully.');
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
            'comments' => Comment::latest()->paginate(5)
        ]);
    }
}
