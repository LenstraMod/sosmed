<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'content'
    ];

    protected $guarded = [];

    public function getRecentComments(){
        return $this->orderBy('created_at','desc')->take(5)->get();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(post::class);
    }
}
