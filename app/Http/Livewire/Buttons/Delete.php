<?php

namespace App\Http\Livewire\Buttons;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Delete extends Component
{
    public $post;
    public bool $confirmingPostDelete = false;

    public function confirmPostDelete()
    {
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-post');
        $this->confirmingPostDelete = true;
    }

    public function deletePost()
    {
        File::delete(public_path('img/blog/'. $this->post->cover_image));
        $this->post->delete();

        return to_route('posts.index')->with('success', 'Post was deleted!');
    }

    public function render()
    { 
        return view('livewire.buttons.delete', [

        ]);
    }
}
