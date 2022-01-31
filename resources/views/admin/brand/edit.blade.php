@extends ( 'admin.layouts.main' )

@section ( 'content' )
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Edit brand</h3>
    </div>
    <form action="{{ route ( 'admin.brand.update' , [ 'id' => $brand[0]->id ] ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="brand_name">Brand name</label>
                <input type="text" class="form-control" id="brand_name" placeholder="Brand name" name="title" value="{{ $brand[0]->title }}">
            </div>
            <div class="form-group">
                <label for="brand_image">Brand icon update</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="brand_image" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="card bg-light d-flex flex-fill col-2">
                <div class="card-body pt-4">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img src="{{ asset ( $brand[0]->image ) }}" alt="user-avatar" class="img-circle img-fluid">
                        </div>
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
            <button type="submit" class="btn btn-default">Edit</button>
        </div>
    </form>
</div>
@endsection
