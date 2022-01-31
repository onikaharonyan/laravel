<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand;
use App\model\Brand as BrandModel;
use App\model\Models;
use Illuminate\Http\Request;
use App\Http\Requests\BrandUpdate;

class BrandController extends Controller
{
    public function index () {
        $item = BrandModel::with ( [ 'user:id,name' ] )
            ->select ( 'id' , 'title' , 'publiced' , 'author' )
            ->orderBy('created_at', 'desc')->paginate ( 15 );

        return view ( 'admin.brand.index' , compact ( 'item' ) );
    }

    public function create () {
        return view ( 'admin.brand.create' );
    }

    public function store ( Brand $request ) {

        $data = $request->validated ();

        if ( $request->hasFile ( 'image' ) ) {

            $imageName = time().'.'.$request['image']->getClientOriginalExtension();

            $data['image'] = $request['image']->move ( 'images' , $imageName);

            $data['image'] = $data['image']->getPath().'/'.$data['image']->getFileName();

        }

        $data['author'] = Auth ()->user ()->id;

        $data['publiced'] = true;

        BrandModel::firstOrCreate ( $data );

        return redirect ()->route ( 'admin.brand' )->with ( 'message', 'Done successfully!' );
    }

    public function edit ( Request $request ) {
        $brand = BrandModel::where ( 'id' , $request->id )->get ();

        return view ( 'admin.brand.edit' , compact ( 'brand' ) );
    }

    public function update ( BrandUpdate $request ) {
        $updateBrand = BrandModel::find ( $request->id );

        $requestBrand = $request->validated ();

        if ( $request->hasFile ( 'image' ) ) {
            unlink ( $updateBrand->image );

            $imageName = time().'.'.$request['image']->getClientOriginalExtension();

            $requestBrand['image'] = $request['image']->move ( 'images' , $imageName);

            $requestBrand['image'] = $requestBrand['image']->getPath().'/'.$requestBrand['image']->getFileName();
        }

        $requestBrand['publiced'] = true;

        $updateBrand->update ( $requestBrand );

        return redirect ()->route ( 'admin.brand' )->with ( 'message', 'Done successfully!' );
    }

    public function published ( Request $request ) {
        $car = BrandModel::find ( $request->id );

        $car->update ([
            'publiced' => true,
        ]);

        return redirect ()->route ( 'admin.brand' )->with ( 'message', 'Done successfully!' );
    }

    public function destroy ( Request $request ) {
        $brand = BrandModel::find ( $request->id );

        $model = Models::where ( 'brand_id' , $brand->id )->get ();

        if ( !$model->isEmpty () ) {
            return redirect ()->route ( 'admin.brand' )->with ( 'message', 'Unable to delete this brand, contains model' );
        } else {
            unlink ( $brand->image );

            $brand->delete ();

            return redirect ()->route ( 'admin.brand' )->with ( 'message', 'Done successfully!' );
        }
    }

    public static function countBrand () {
        $brandNopubliced = count ( BrandModel::where ( 'publiced' , false )->select ( 'id' )->get () );
        return $brandNopubliced;
    }
}
