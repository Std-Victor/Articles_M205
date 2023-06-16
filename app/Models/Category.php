<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
