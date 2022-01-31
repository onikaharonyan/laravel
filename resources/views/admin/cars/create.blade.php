@extends ( 'admin.layouts.main' )

@section ( 'content' )
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Create brand</h3>
        </div>
        <form action="{{ route ( 'admin.cars.store' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="brand_name">Car name</label>
                    <input type="text" class="form-control" placeholder="Brand name" name="title" value="{{ old ( 'title' ) }}">
                </div>
                <div class="form-group">
                    <label>Car description</label>
                    <textarea class="form-control" rows="3" placeholder="Car description" name="description">{{ old ( 'description' ) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car year</label>
                            <input type="text" class="form-control" placeholder="Brand year" name="year" value="{{ old ( 'year' ) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car mileage</label>
                            <input type="text" class="form-control" placeholder="Car mileage" name="mileage" value="{{ old ( 'mileage' ) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car engine</label>
                            <input type="text" class="form-control" placeholder="Car engine" name="engine" value="{{ old ( 'engine' ) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car towing</label>
                            <input type="text" class="form-control" placeholder="Car towing" name="towing" value="{{ old ( 'towing' ) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car wheel</label>
                            <input type="text" class="form-control" placeholder="Car wheel" name="wheel" value="{{ old ( 'wheel' ) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car gearbox</label>
                            <input type="text" class="form-control" placeholder="Car gearbox" name="gearbox" value="{{ old ( 'gearbox' ) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="brand_name">Car color</label>
                            <input type="text" class="form-control" placeholder="Car engine" name="color" value="{{ old ( 'color' ) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Model</label>
                            <select class="custom-select" name="model" id="model" data-action="{{ route ( 'admin.ajax.models' ) }}">
                                @foreach ( $brands as $item )
                                    <optgroup label="{{ $item->title }}">
                                    @foreach ( $item->show as $models )
                                            <option value="{{ $models->id }}">{{ $models->title }}</option>
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
                <button type="submit" class="btn btn-default">Create</button>
            </div>
        </form>
    </div>
@endsection
