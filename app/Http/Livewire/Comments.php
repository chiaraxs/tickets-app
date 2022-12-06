<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $newComment;

    public $comments = [
        [
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mauris urna, semper quis consequat quis, accumsan non tortor. Vestibulum accumsan diam in ullamcorper tristique. Nam sodales turpis ut tellus faucibus, id pulvinar est accumsan. Etiam lorem mauris, blandit in mollis dictum, rhoncus sit amet erat. Proin euismod a sem euismod volutpat. Donec libero ex, iaculis vitae scelerisque et, consectetur ut elit. Aliquam erat volutpat.',
            'created_at' => '5 minutes ago',
            'creator' => 'Chiara',
        ]
    ];

    // AddComment function
    public function addComment(){

        // Previene la pubblicazione di commenti vuoti al click sul button
        if($this->newComment == '') {
            return;
        }
        
        // array_unshift ordina i nuovi commenti dall'alto verso il basso
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Yago',
        ]);

        $this->newComment = ''; // refresh input text after submit button
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
