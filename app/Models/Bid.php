<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'slug', 'user_id', 'amount'];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function post() {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
