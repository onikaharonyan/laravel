<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $guarded = [];

    protected $fillable = [];

    public function show () {
        return $this->hasMany ( Models::class , 'brand_id' , 'id' );
    }

    public function user () {
        return $this->hasMany ( User::class , 'id' , 'author' );
    }

    public function cars () {
        return $this->hasManyThrough(
            CarsModel::class,
            Models::class,
            'brand_id', // Models
            'model', // CarsModel
            'id', // Brand
            'id' // Models
        );
    }

    public function model () {
        return $this->hasMany ( Models::class , 'brand_id' , 'id' );
    }
}
