<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CarsModel extends Model
{
    protected $table = 'cars_models';

    protected $guarded = [];

    protected $fillable = [];

    public function images () {
        return $this->hasMany ( CarsImages::class , 'car_id' , 'id' );
    }

    public function imagesFirst () {
        return $this->hasOne ( CarsImages::class , 'car_id' , 'id' );
    }

    public function user () {
        return $this->hasMany ( User::class , 'id' , 'author' );
    }
}
