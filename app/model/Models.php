<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'models';

    protected $fillable = [];

    protected $guarded = [];


    public function user () {
        return $this->hasMany ( User::class , 'id' , 'author' );
    }

    public function cars () {
        return $this->hasMany ( CarsModel::class , 'model' , 'id' );
    }
}
