<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class Comments extends Component
{

    public $comments;

    public $newComment;
    
    // Mount function to show all comments
    public function mount(){

       $initialComments = Comment::all();
       $initialComments = Comment::orderBy('created_at', 'desc')->get();
       $this->comments = $initialComments;

    }

    // Updated function
    public function updated($field)
    {
        $this->validateOnly($field, ['newComment'=> 'required|max:200']);
    }


    // AddComment function
    public function addComment(){

        $this->validate(['newComment'=> 'required|max:200']);

        $createdComment = Comment::create(['body' => $this->newComment, 'user_id' => 1]);
        $this->comments->prepend($createdComment);
        
        $this->newComment = ''; // refresh input text after submit button

        // Flash success messagge
        session()->flash('message', 'Post successfully addeded. ');
    }

    // RemoveComment function
    public function removeComment($commentId)
    {
       $comment = Comment::find($commentId);
       $comment->delete();
       
       $this->comments = $this->comments->except($commentId);

       // Flash success messagge
       session()->flash('message', 'Post successfully deleted. ');
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
