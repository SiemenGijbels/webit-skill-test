<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'price', 'media', 'body'];

    public function bids() {
        return $this->hasMany('\App\Models\Bid', 'post_id', 'id')->withTimestamps();
    }

}
