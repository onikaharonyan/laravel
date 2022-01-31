<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\model\Brand;
use App\model\CarsModel;
use App\model\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {
        $cars = CarsModel::with ( 'imagesFirst' )
            ->where ( 'published' , true )
            ->orderBy('created_at', 'desc')
            ->get ();

        $brands = Brand::where ( 'publiced' , true )->orderBy('created_at', 'desc')->limit ( 8 )->get ();

        return view ( 'front.home.home' , compact ( 'cars' , 'brands' ) );
    }

    public function show ( Request $request ) {

        $brands = Brand::where ( 'publiced' , true )->orderBy('created_at', 'desc')->get ();

        if ( $request->input('brands') ) {

        $cars = Brand::with ( [ 'cars' => function ( $cars ) use ( $request ) {
            $cars->with ( 'imagesFirst' );
            $cars->where ( 'published' , true );
            $cars->orderBy('created_at', 'desc');
            $cars->paginate ( 5 );
            if ( $request->models ) { $cars->where ( 'model' , $request->models ); }
        }] )
            ->where ( 'id' , $request->brands )
            ->get ();

            $cars = $cars[0]->cars;
        } else {

        $cars = CarsModel::with ( 'imagesFirst' )
                ->where ( 'published' , true )
                ->orderBy('created_at', 'desc')
                ->paginate ( 5 );
        }

        return view ( 'front.car.index' , compact ( 'cars' , 'brands' ) );
    }

    public function infoview ( Request $request ) {
        $car = CarsModel::with ( 'images' )->where ( 'id' , $request->id )->get ();

        if ( $car->isEmpty () ) {
            return abort ( 404 );
        }

        return view ( 'front.car.show' , compact ( 'car' ) );
    }
}
