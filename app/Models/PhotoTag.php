<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;


class PhotoTag extends Pivot
{
    use HasFactory;
    public function photo() {
            return $this->belongsTo(photo::class);
        }
    public function tag() {
            return $this->BelongsTo(tag::class);
        }

}
