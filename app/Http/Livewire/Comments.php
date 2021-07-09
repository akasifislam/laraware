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
        $initialComment = Comment::all();
        $this->comments = $initialComment;
    }



    public function addComment()
    {
        if ($this->newComment == '') {
            return;
        }
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'masterman'
        ]);
        $this->newComment = "";
    }
}
