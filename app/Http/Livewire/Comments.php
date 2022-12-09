<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Comments extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $newComment;

    public $image;


    // Upload image funcion
    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData){
        $this->image = $imageData;
    }

    // Updated function
    public function updated($field)
    {
        $this->validateOnly($field, ['newComment'=> 'required|max:200']);
    }


    // AddComment function
    public function addComment(){

        $this->validate(['newComment'=> 'required|max:200']);

        $image = $this->storeImage();

        $createdComment = Comment::create([
            'body' => $this->newComment, 'user_id' => 1,
            'image' => $image,
        ]);
        
        $this->newComment = ''; // refresh input text after submit button
        $this->image = ''; // refresh image input after submit button


        // Flash success messagge
        session()->flash('message', 'Post successfully addeded. ');
    }

    public function storeImage(){

        // se non c'è l'img -> return null
        if (!$this->image) {
            return null;
        }

        // se c'è l'img -> encode -> create random name -> store nella cartella public -> return image name
        $img = ImageManagerStatic::make($this->image)->encode('jpg');

        $name = Str::random() . '.jpg';
        
        Storage::disk('public')->put($name, $img);
       
        return $name;
            
    }

    // RemoveComment function
    public function removeComment($commentId)
    {
       $comment = Comment::find($commentId);
       
        // se l'img non è null ->  remove img
        if(!is_null($comment->image)) {
            Storage::delete($comment->image); 
        }
      
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
