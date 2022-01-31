@extends ( 'admin.layouts.main' )

@section ( 'content' )
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Create brand</h3>
        </div>
        <form action="{{ route ( 'admin.brand.store' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="brand_name">Brand name</label>
                    <input type="text" class="form-control" id="brand_name" placeholder="Brand name" name="title">
                </div>
                <div class="form-group">
                    <label for="brand_image">Brand icon</label>
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
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-default">Create</button>
            </div>
        </form>
    </div>
@endsection
