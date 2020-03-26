<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class Users extends Component
{
    public $search;
    public $users;
    
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }
}
