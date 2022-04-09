<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating( function($model){
            if( empty($model->{$model->getKeyName()})){
            $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
}
