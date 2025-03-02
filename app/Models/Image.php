<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['imageable_id', 'imageable_type', 'path'];

    public function user()

    {
        return $this->belongsTo(User::class);
    }
}
