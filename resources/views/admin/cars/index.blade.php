@extends ( 'admin.layouts.main' )

@section ( 'content' )
    <a class="btn btn-app" href="{{ route ( 'admin.cars.create' ) }}">
        <i class="fas fa-edit"></i> Add
    </a>
    <div class="card">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>published</th>
                        <th>Author</th>
                        <th style="width: 40px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $item as $key => $brands )
                        <tr>
                            <td>{{ $key+1 }}.</td>
                            <td>{{ $brands->title }}</td>
                            <td>@if( $brands->published !== 0 ) Yes @else No @endif</td>
                            <td>{{ $brands->user[0]->name }}</td>
                            <td>
                                <div class="btn-group">
                                    @if( $brands->published == 0 )
                                        <form action="{{ route ( 'admin.cars.published' , [ 'id' => $brands->id ] ) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route ( 'admin.cars.edit' , [ 'id' => $brands->id ] ) }}" class="btn btn-default">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route ( 'admin.cars.delete' , [ 'id' => $brands->id ] ) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
    </div>
    {{ $item->links() }}
@endsection
