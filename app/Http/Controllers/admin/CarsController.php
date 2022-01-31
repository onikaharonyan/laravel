<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cars;
use App\Http\Requests\CarsUpdate;
use App\model\Brand;
use App\model\CarsImages;
use App\model\CarsModel;
use App\model\Models;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index () {
        $item = CarsModel::with ( [ 'user:id,name' ] )
        ->select ( 'id' , 'title' , 'published' , 'author' )
        ->orderBy('created_at', 'desc')
        ->paginate ( 15 );

        return view ( 'admin.cars.index' , compact ( 'item' ) );
    }

    public function create () {
        $brands = Brand::with( [ 'show' => function ( $event ) {
            $event->where ( 'publiced' , true );
        }] )->get ();
        return view ( 'admin.cars.create' , compact ( 'brands' , 'models' ) );
    }

    public function store ( Cars $request ) {

        $data = $request->validated ();

        $iamges = $data['image'];

        unset ( $data['image'] );

        $data['published'] = true;

        $data['author'] = Auth ()->user ()->id;

        $id = CarsModel::firstOrCreate ( $data );

        if ( $request->hasFile ( 'image' ) ) {

            foreach ( $iamges as $key => $image ) {
                $imageName = time().$key.'.'.$image->getClientOriginalExtension();

                $data_iamge['image'] = $image->move ( 'images' , $imageName);

                $data_iamge['image'] = $data_iamge['image']->getPath().'/'.$data_iamge['image']->getFileName();

                $data_iamge['car_id'] = $id->id;

                CarsImages::firstOrCreate ( $data_iamge );
            }

        }

        return redirect ()->route ( 'admin.cars' )->with ( 'message', 'Done successfully!' );

    }

    public function edit ( Request $request ) {
        $brands = Brand::with('show')->get ();
        $car = CarsModel::where ( 'id' , $request->id )->with('images')->get ();

        return view ( 'admin.cars.edit' , compact ( 'car' , 'brands' ) );
    }

    public function update ( CarsUpdate $request ) {
        $updateCar = CarsModel::find ( $request->id );

        $requestCar = $request->validated ();

        if ( $request->hasFile ( 'image' ) ) {

            $iamges = $requestCar['image'];

            unset ( $requestCar ['image'] );

            foreach ( $iamges as $key => $image ) {
                $imageName = time().$key.'.'.$image->getClientOriginalExtension();

                $data_iamge['image'] = $image->move ( 'images' , $imageName);

                $data_iamge['image'] = $data_iamge['image']->getPath().'/'.$data_iamge['image']->getFileName();

                $data_iamge['car_id'] = $updateCar->id;

                CarsImages::firstOrCreate ( $data_iamge );
            }

        }

        $updateCar->update ( $requestCar );

        return redirect ()->route ( 'admin.cars' )->with ( 'message', 'Done successfully!' );
    }

    public function destroy ( Request $request ) {
        $car = CarsModel::find ( $request->id );

        $carImage = CarsModel::where ( 'id' , $car->id )->with ( 'images' )->get ();

        if ( !$carImage[0]->images->isEmpty() ) {
            foreach ( $carImage[0]->images as $image ) {
                unlink ( $image->image );
                $image->delete ();
            }
        }

        $car->delete ();

        return redirect ()->route ( 'admin.cars' )->with ( 'message', 'Done successfully!' );
    }

    public function published ( Request $request ) {
        $car = CarsModel::find ( $request->id );

        $car->update ([
            'published' => true,
        ]);

        return redirect ()->route ( 'admin.cars' )->with ( 'message', 'Done successfully!' );
    }

    public function ajaxResult ( Request $request ) {
        $image = CarsImages::find ( $request->id );
        $image->delete ();
        unlink ( $image->image );
        return response ()->json ( [ 'models' => true ] );
    }

    public static function countCars () {
        $carNopublished = count ( CarsModel::where ( 'published' , false )->select ( 'id' )->get () );
        return $carNopublished;
    }
}
