<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{

    public function render()
    {
        return view('livewire.comments');
    }

    public $comments = [
        [
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis doloribus, placeat modi deleniti optio explicabo et aut nam ullam reiciendis porro, tenetur aperiam. Quibusdam cupiditate nam delectus totam doloribus, minima placeat quasi alias ullam numquam sequi ab! In, ex. Id, itaque! Officia nihil illo corporis, labore beatae quo ullam debitis nesciunt alias corrupti aperiam. Aperiam libero deserunt perspiciatis non suscipit.',
            'created_at' => '3 min ago',
            'creator' => 'Asif Ul Islam'
        ]
    ];

    public $newComment;



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
