<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PhotoUser extends Pivot
{
    use HasFactory;
        public function photo() {
                return $this->belongsTo(photo::class);
            }
        public function user() {
                return $this->BelongsTo(user::class);
            }
    protected static function booted(){
        static::creating(function ($p){
            return !is_null($p->user->groups->find($p->photo->group));
        });
    }
}
