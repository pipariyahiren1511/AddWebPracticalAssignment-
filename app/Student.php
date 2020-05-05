<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'grade',
        'birth_date',
        'address',
        'city',
        'country',
        'photo',
    ];

    protected $appends = ['image']; // append image of user to userdetail data

    //Accessor for get image with student object
    public function getImageAttribute()
    {
        $image = "";
        if (isset($this->attributes['photo']) && $this->attributes['photo'] != "") {
            $image = Storage::url($this->attributes['photo']);
        }
        return $image;
    }
    
}
