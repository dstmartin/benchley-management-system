<?php

namespace App\Http\Livewire\Services;

use App\Service;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Show extends Component
{
    public $service;
    public $type;
    public $status;
    public $people;

    protected $updatesQueryString = ['status'];


    public function mount($service)
    {
        // dd($service);
        // $this->service = $service;
        $this->service = Service::find($service);
        $this->status = request()->query('status', $this->status);
    }

    public function render()
    {
        // dd(Service::find($this->service)->people->search($this->status));
        
        // return view('livewire.services.show');

        $this->people = $this->service->people;

        if (isset($this->status) && $this->status != 'All')
        {
            if ($this->status == 'Not Assigned') {
                $this->people = $this->service->people()->wherePivot('status', null)->get();
            } else {
                $this->people = $this->service->people()->wherePivot('status', $this->status)->get();
            }
        } else {
            $this->people = $this->service->people;
        }

        // $this->people = $this->service->people()->wherePivot('status', 'Present')->get();

        return view('livewire.services.show', [
            // 'people' => $this->service->people->search($this->status),
            // 'people' => Service::find($this->service)->people,
            // $this->people => Service::find($this->service)->people,
        ]);
    }

    public function changeStatus($id, $status)
    {
        $this->service->people()->updateExistingPivot($id, ['status' => $status]);
        $this->service = $this->service->fresh();
    }

    public function filterStatus($status)
    {
        $this->status = $status;
    }
}