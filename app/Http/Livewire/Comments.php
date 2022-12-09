<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;
use Livewire\WithPagination;

class Comments extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $newComment;

    // Updated function
    public function updated($field)
    {
        $this->validateOnly($field, ['newComment'=> 'required|max:200']);
    }


    // AddComment function
    public function addComment(){

        $this->validate(['newComment'=> 'required|max:200']);

        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        
        $this->newComment = ''; // refresh input text after submit button

        // Flash success messagge
        session()->flash('message', 'Post successfully addeded. ');
    }

    // RemoveComment function
    public function removeComment($commentId)
    {
       $comment = Comment::find($commentId);
       $comment->delete();

       // Flash success messagge
       session()->flash('message', 'Post successfully deleted. ');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5),
        ]);
    }
}
