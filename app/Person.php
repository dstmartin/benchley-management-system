<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_id', 'firstname', 'lastname', 'suffix', 'email', 'birthdate', 'gender', 'phoneHome', 'phoneCell', 'phoneWork',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'birthdate'];

    /**
     * Get the family for the person.
     */
    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    /**
     * Get the services for the person.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('firstname', 'like', '%'.$query.'%')
                ->orWhere('lastname', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('phoneHome', 'like', '%'.$query.'%')
                ->orWhere('phoneCell', 'like', '%'.$query.'%')
                ->orWhere('phoneWork', 'like', '%'.$query.'%');
    }
}
