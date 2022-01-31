@extends ( 'front.layouts.home' )

@section ( 'title' , 'Add brand' )

@section ( 'content' )

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset ( 'front/img/bg/breadcrumb_bg.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>Brands</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <section class="login-register-area gray-lite pb-120">
        <div class="container">
            <div class="login-reg-wrap">
                <div class="row no-gutters p-4">
                    <div class="col-xl-8 col-lg-8 col-md-8 d-flex justify-content-center">
                        <ul class="inventory-widget col-12">
                            @if ( $item->isEmpty () ) <div style="font-size: 20px; width: 100%; height: 100%; text-align: center;">you have not added Model</div> @endif
                            @foreach ( $item as $brand )

                                <li class="p-4 inventory-widget">
                                    <ul class="d-flex align-items-center justify-content-between">
                                        <li>
                                            {{ $brand->title }}
                                        </li>
                                        <li class="d-flex align-items-center justify-content-center">
                                            published <span class="@if ( $brand->publiced !== 0 )new_block_true @else new_block @endif ">@if ( $brand->publiced == 0 ) No @else Yes @endif</span>
                                        </li>
                                    </ul>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 d-flex justify-content-center">
                        <aside class="inventory-sidebar">
                            <div class="widget inventory-widget">
                                <div class="inv-widget-title mb-25">
                                    <h5 class="title">Create car brand</h5>
                                </div>
                                <form action="{{ route ( 'front.store.brand' ) }}" class="sidebar-find-car" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method( 'patch' )
                                    <div class="form-grp">
                                        <input type="text" placeholder="Name" name="title">
                                    </div>
                                    <div class="form-grp">
                                        <input type="file" placeholder="Image" name="image">
                                    </div>
                                    <button class="btn">Create</button>
                                </form>
                                <div class="mt-4">
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
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
