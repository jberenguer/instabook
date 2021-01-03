<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;




    public function comments() {
        return $this->hasMany(Comment::class);
    }
    public function group() {
        return $this->BelongsTo(group::class);
    }
    public function tags(){
        return $this->belongsToMany(tag::class)->using(PhotoTag::class)->withTimestamps();
    }
    public function users(){
        return $this->belongsToMany(user::class)->using(PhotoUser::class)->withTimestamps();
    }
    public function owner(){
        return $this->belongsTo(user::class, 'user_id');
    }
    protected static function booted(){
        static::creating(function ($p){
            return !is_null($p->owner->groups->find($p->group));
        });
    }

}
