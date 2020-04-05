<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'style'];

    public function hobbies() {
        return $this->belongsToMany('App\Hobby');
    }

    public function filteredHobbies() {
        return $this->belongsToMany('App\Hobby')
            ->wherePivot('tag_id', $this->id)
            ->orderBy('updated_at', 'DESC');
    }

}
