<?php

namespace App\Models\Traits;
use Illuminate\Support\Str;

trait UuidTrait
{
    public static function boot()
    {
        static::creating(function($model){

            $model->{$model->getKeyName()} = (String) Str::uuid();
        });
    }
}
