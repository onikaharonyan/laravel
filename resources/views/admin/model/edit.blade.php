@extends ( 'admin.layouts.main' )

@section ( 'content' )
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit model</h3>
    </div>
    <form action="{{ route ( 'admin.models.update' , [ 'id' => $brand[0]->id ] ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="brand_name">Brand name</label>
                <input type="text" class="form-control" id="brand_name" placeholder="Brand name" name="title" value="{{ $brand[0]->title }}">
            </div>
            <div class="form-group">
                <label>Brand</label>
                <select class="custom-select" name="brand_id">
                    @foreach ( $brands as $item )
                        <option value="{{ $item->id }}" @if ( $item->id == $brand[0]->brand_id ) selected @endif>{{ $item->title }}</option>
                    @endforeach
                </select>
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
