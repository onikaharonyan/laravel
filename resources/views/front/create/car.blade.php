@extends ( 'front.layouts.home' )

@section ( 'title' , 'Profile' )

@section ( 'content' )

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset ( 'front/img/bg/breadcrumb_bg.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>Cars</h2>
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
                            @if ( $item->isEmpty () ) <div style="font-size: 20px; width: 100%; height: 100%; text-align: center;">you have not added Car</div> @endif
                            @foreach ( $item as $brand )

                                <li class="p-4 inventory-widget">
                                    <ul class="d-flex align-items-center justify-content-between">
                                        <li>
                                            {{ $brand->title }}
                                        </li>
                                        <li class="d-flex align-items-center justify-content-center">
                                            published <span class="@if ( $brand->published !== 0 )new_block_true @else new_block @endif ">@if ( $brand->published == 0 ) No @else Yes @endif</span>
                                        </li>
                                    </ul>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 d-flex justify-content-center">
                        <aside class="inventory-sidebar" style="width: 100%;">
                            <div class="widget inventory-widget">
                                <div class="mb-4">
                                    <ul class="d-flex justify-content-between align-items-center">
                                        @auth
                                            <li class="header-btn">
                                                <a href="{{ route ( 'front.create.brand' ) }}" class="btn">add brand</a>
                                            </li>
                                            <li class="header-btn">
                                                <a href="{{ route ( 'front.create.model' ) }}" class="btn">add model</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="inv-widget-title mb-25">
                                    <h5 class="title">Create car Car</h5>
                                </div>
                                <form action="{{ route ( 'front.store.car' ) }}" class="sidebar-find-car" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method( 'patch' )
                                    <div class="form-grp">
                                        <input type="text" placeholder="Name" name="title" value="{{ old ( 'title' ) }}">
                                    </div>
                                    <div class="form-grp comment-form">
                                        <textarea name="description" id="message" placeholder="Car description">{{ old ( 'description' ) }}</textarea>
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Year" name="year" value="{{ old ( 'year' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Mileage" name="mileage" value="{{ old ( 'mileage' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Engine" name="engine" value="{{ old ( 'engine' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Towing" name="towing" value="{{ old ( 'towing' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Wheel" name="wheel" value="{{ old ( 'wheel' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Gearbox" name="gearbox" value="{{ old ( 'gearbox' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <input type="text" placeholder="Color" name="color" value="{{ old ( 'color' ) }}">
                                    </div>
                                    <div class="form-grp">
                                        <i class="fas fa-dollar-sign"></i>
                                        <select class="selected" name="model">
                                            @foreach ( $brands as $key => $brand )
                                                <optgroup label="{{ $brand->title }}" data-i="{{ $key }}">
                                                    @foreach ( $brand->show as $item )
                                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-grp">
                                        <i class="flaticon-car"></i>
                                        <input type="file" placeholder="Image" name="image[]" multiple>
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
