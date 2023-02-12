<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string) Str::uuid();
        });
    }
    public function getIncrementing()
    {
        return false;
    }
    public function getKeyType()
    {
        return 'string';
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class,'brands_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class,'categories_id','id');
    }

    public function materials()
    {
        return $this->hasMany(Materials::class);
    }

}
