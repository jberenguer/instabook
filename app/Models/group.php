<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

    public function photos() {
        return $this->hasMany(photo::class);
    }
    public function users(){
        return $this->belongsToMany(user::class)->using(GroupUser::class)->withTimestamps();
    }
}
