<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public function persons()
    {
        return $this->hasMany(\App\Models\Person::class, 'category_id');
    }
}
