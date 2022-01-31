<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\RequestBrand;
use App\model\Brand;

class FrontBrandController extends Controller
{
    public function index () {
        $item = Brand::where ( 'author' , Auth ()->user ()->id )->orderBy('created_at', 'desc')->get ();

        return view ( 'front.create.brand' , compact ( 'item' ) );
    }

    public function store ( RequestBrand $request ) {
        $data = $request->validated ();

        $brand = Brand::where ( 'title' , $data['title'] )->get ();

        if ( $brand->isEmpty () ) {
            if ( $request->hasFile ( 'image' ) ) {
                $imageName = time().'.'.$data['image']->getClientOriginalExtension();

                $data['image'] = $data['image']->move ( 'images' , $imageName);

                $data['image'] = $data['image']->getPath().'/'.$data['image']->getFileName();
            }
            $data['author'] = Auth ()->user ()->id;
            Brand::firstOrCreate ( $data );
        } else {
            return redirect ()->route ( 'front.create.brand' )->with ( 'message', 'This brand already exists' );
        }

        return redirect ()->route ( 'front.create.brand' )->with ( 'message', 'Done successfully!' );
    }
}
