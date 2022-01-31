<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelsRequest;
use App\model\Brand;
use App\model\Models;
use Illuminate\Http\Request;
use App\model\CarsModel;

class ModelsController extends Controller
{
    public function index () {
        $item = Models::with ( [ 'user:id,name' ] )
            ->select ( 'id' , 'title' , 'publiced' , 'author' )
            ->orderBy('created_at', 'desc')->paginate ( 15 );

        return view ( 'admin.model.index' , compact ( 'item' ) );
    }

    public function create () {
        $brands = Brand::where ( 'publiced' , true )->select ( 'id' , 'title' )->get ();
        return view ( 'admin.model.create' , compact ( 'brands' ) );
    }

    public function store ( ModelsRequest $request ) {

        $data = $request->validated ();

        $data['publiced'] = true;

        $data['author'] = Auth ()->user ()->id;

        Models::firstOrCreate ( $data );

        return redirect ()->route ( 'admin.models' )->with ( 'message', 'Done successfully!' );
    }

    public function edit ( Request $request ) {
        $brand = Models::where ( 'id' , $request->id )->get ();
        $brands = Brand::select ( 'id' , 'title' )->get ();

        return view ( 'admin.model.edit' , compact ( 'brand' , 'brands' ) );
    }

    public function update ( ModelsRequest $request ) {
        $updateModel = Models::find ( $request->id );

        $requestModel = $request->validated ();

        $requestModel['publiced'] = true;

        $updateModel->update ( $requestModel );

        return redirect ()->route ( 'admin.models' )->with ( 'message', 'Done successfully!' );
    }

    public function published ( Request $request ) {
        $car = Models::find ( $request->id );

        $car->update ([
            'publiced' => true,
        ]);

        return redirect ()->route ( 'admin.models' )->with ( 'message', 'Done successfully!' );
    }

    public function destroy ( Request $request ) {
        $brand = Models::find ( $request->id );

        $car = CarsModel::where ( 'model' , $brand->id )->get ();

        if ( !$car->isEmpty () ) {
            return redirect ()->route ( 'admin.models' )->with ( 'message', 'Unable to delete this model, contains cars .' );
        } else {
            $brand->delete();

            return redirect()->route('admin.models')->with('message', 'Done successfully!');
        }
    }

    public static function countModel () {
        $modelNopublished = count ( Models::where ( 'publiced' , false )->select ( 'id' )->get () );
        return $modelNopublished;
    }
}
