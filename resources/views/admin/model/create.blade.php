@extends ( 'admin.layouts.main' )

@section ( 'content' )
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Create model</h3>
        </div>
        <form action="{{ route ( 'admin.models.store' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="form-group">
                    <label for="brand_name">Brand name</label>
                    <input type="text" class="form-control" id="brand_name" placeholder="Brand name" name="title">
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <select class="custom-select" name="brand_id">
                        @foreach ( $brands as $item )
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-default">Create</button>
            </div>
        </form>
    </div>
@endsection
