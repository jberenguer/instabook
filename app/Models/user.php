<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany(comment::class);
    }
    public function photosAppearance(){
        return $this->belongsToMany(photo::class)->using(PhotoUser::class)->withTimestamps();
    }
    public function photos() {
        return $this->hasMany(photo::class);
    }
    public function groups(){
        return $this->belongsToMany(group::class)->using(GroupUser::class)->withTimestamps();
    }
}
