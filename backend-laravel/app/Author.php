<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','email','bio', 'books'];
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

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
