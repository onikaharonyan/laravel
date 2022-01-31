@extends ( 'admin.layouts.main' )

@section ( 'content' )
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit car</h3>
    </div>
    <form action="{{ route ( 'admin.cars.update' , [ 'id' => $car[0]->id ] ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="brand_name">Car name</label>
                <input type="text" class="form-control" placeholder="Brand name" name="title" value="{{ $car[0]->title }}">
            </div>
            <div class="form-group">
                <label>Car description</label>
                <textarea class="form-control" rows="3" placeholder="Car description" name="description">{{ $car[0]->description }}</textarea>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car year</label>
                        <input type="text" class="form-control" placeholder="Brand year" name="year" value="{{ $car[0]->year }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car mileage</label>
                        <input type="text" class="form-control" placeholder="Car mileage" name="mileage" value="{{ $car[0]->mileage }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car engine</label>
                        <input type="text" class="form-control" placeholder="Car engine" name="engine" value="{{ $car[0]->engine }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car towing</label>
                        <input type="text" class="form-control" placeholder="Car towing" name="towing" value="{{ $car[0]->towing }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car wheel</label>
                        <input type="text" class="form-control" placeholder="Car wheel" name="wheel" value="{{ $car[0]->wheel }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car gearbox</label>
                        <input type="text" class="form-control" placeholder="Car gearbox" name="gearbox" value="{{ $car[0]->gearbox }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="brand_name">Car color</label>
                        <input type="text" class="form-control" placeholder="Car engine" name="color" value="{{ $car[0]->color }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Model</label>
                        <select class="custom-select" name="model" id="model" data-action="{{ route ( 'admin.ajax.models' ) }}">
                            @foreach ( $brands as $item )
                                <optgroup label="{{ $item->title }}">
                                    @foreach ( $item->show as $models )
                                        <option value="{{ $models->id }}" @if ( $models->id == $car[0]->model ) selected @endif>{{ $models->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Car images</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image[]" multiple>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline card-tabs">
            <div class="card-body">
                <div class="row">
                    @foreach ( $car[0]->images as $item )
                        <div class="col-2 parent_block">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12 text-center pt-4">
                                            <img src="{{ asset ( $item->image ) }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-primary delete_this_image"
                                            data-id="{{ $item->id }}"
                                            data-link="{{ route ( 'admin.cars.image' ) }}">
                                            Ջնջել
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-default">Edit</button>
        </div>
    </form>
</div>
@endsection
