<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'slug',
        'title',
        'image',
        'excerpt',
        'body',
    ];

    public function user() {
        return $this->belongsTo( User::class, 'user_id', 'id' );
    }

    public function category() {
        return $this->belongsTo( Category::class, 'category_id', 'id' )->withDefault([
            'title' => 'None',
            'slug' => '#',
        ]);
    }

    public function comments() {
        return $this->hasMany( Comment::class );
    }
}
