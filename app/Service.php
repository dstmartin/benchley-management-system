<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'date', 'time', 'type',
    ];

    protected $with = ['people'];

    public function people()
    {
        // return $this->belongsToMany(Person::class, 'people_services', 'services_id', 'people_id');
        return $this->belongsToMany(Person::class)->withPivot('id', 'status')->withTimestamps();
    }
}
