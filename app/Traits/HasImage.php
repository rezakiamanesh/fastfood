<?php


namespace App\Traits;


use App\Models\Image;

trait HasImage
{
    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
