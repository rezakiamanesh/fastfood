<?php


namespace App\Traits;

use App\Models\Category;

trait HasCategory
{
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
