<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\RequestModel;
use App\model\Brand;
use App\model\Models;
use Illuminate\Http\Request;

class FrontModelController extends Controller
{
    public function index () {
        $item = Models::where ( 'author' , Auth ()->user ()->id )->orderBy('created_at', 'desc')->get ();

        $brands = Brand::where ( 'publiced' , true )->select ( 'id' , 'title' )->get ();

        return view ( 'front.create.model' , compact ( 'item' , 'brands' ) );
    }

    public function store ( RequestModel $request ) {
        $data = $request->validated ();

        $brand = Models::where ( 'title' , $data['title'] )->get ();

        if ( $brand->isEmpty () ) {
            $data['author'] = Auth ()->user ()->id;
            Models::firstOrCreate ( $data );
        } else {
            return redirect ()->route ( 'front.create.model' )->with ( 'message', 'This model already exists' );
        }

        return redirect ()->route ( 'front.create.model' )->with ( 'message', 'Done successfully!' );
    }

    public function ajaxResult ( Request $request ) {
        $item = Models::where ( 'brand_id' , $request->id )
            ->where ( 'publiced' , true )
            ->orderBy('created_at', 'desc')
            ->select ( 'id' , 'title' )
            ->get ();
        return response ()->json ( [ 'result' => $item ] );
    }
}
