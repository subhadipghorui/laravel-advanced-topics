<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable = ['title', 'body'];

    protected $with = ['category:id,name,about'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
