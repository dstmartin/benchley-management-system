<?php

namespace App\Http\Livewire;

use App\Person;
use Livewire\Component;
use Livewire\WithPagination;

class People extends Component
{
    use WithPagination;
    
    public $count = 10;
    public $search;
    public $sortField = 'firstname';
    public $sortAsc = true;


    // public $people;

    protected $updatesQueryString = ['search', 'count'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function sortBy($field) 
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }      
        $this->sortField = $field;
    }
    
    public function render()
    {
        // $this->people = Person::paginate(10);
      
        // return view('livewire.people');

        return view('livewire.people', [
            'people' => Person::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->count),
        ]);
    }
}