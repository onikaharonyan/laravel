<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cars;
use App\Http\Requests\front\RequestBrand;
use App\model\Brand;
use App\model\CarsImages;
use App\model\CarsModel;

class FrontCarController extends Controller
{
    public function index () {
        $item = CarsModel::where ( 'author' , Auth ()->user ()->id )->orderBy('created_at', 'desc')->get ();

        $brands = Brand::with( [ 'show' => function ( $event ) {
            $event->where ( 'publiced' , true );
        }] )->orderBy('created_at', 'desc')->get ();

        return view ( 'front.create.car' , compact ( 'item' , 'brands' ) );
    }

    public function store ( Cars $request ) {
        $data = $request->validated ();

        $iamges = $data['image'];

        unset ( $data['image'] );

        $data['author'] = Auth ()->user ()->id;

        $id = CarsModel::firstOrCreate ( $data );

        if ( $request->hasFile ( 'image' ) ) {
            foreach ( $iamges as $key => $item ) {
                $imageName = time().$key.'.'.$item->getClientOriginalExtension();

                $img['image'] = $item->move ( 'images' , $imageName);

                $img['image'] = $img['image']->getPath().'/'.$img['image']->getFileName();

                $img['car_id'] = $id->id;

                CarsImages::firstOrCreate ( $img );
            }
        }

        return redirect ()->route ( 'front.create.car' )->with ( 'message', 'Done successfully!' );
    }
}
