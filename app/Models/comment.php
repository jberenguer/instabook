<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

        public function photo() {
            return $this->BelongsTo(photo::class);
        }

        public function user() {
            return $this->BelongsTo(user::class);
        }

        public function replies() {
            return $this->HasMany(comment::class);
        }
        public function replyTo() {
            return $this->BelongsTo(comment::class, 'comment_id');
        }
        protected static function booted(){
            static::creating(function ($c){
                return !is_null($c->user->groups->find($c->photo->group));
            });
        }

}
