<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'sqlite2';

    // protected $guarded = [];
    protected $fillable = ['title', 'body'];

    protected $with = ['category:id,name,about'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
