@extends ( 'front.layouts.home' )

@section ( 'title' , 'Cars' )

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

    <!-- car-search-area -->
    <section class="car-search-area gray-bg pb-40">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="car-search-wrap">
                        <div class="small-title mb-20">
                            <h4><i class="flaticon-searching-car"></i> LOOKING FOR A <span>CAR?</span></h4>
                        </div>
                        <form action="#" class="car-search-form">
                            <div class="row align-items-end">
                                <div class="col custom-col-6">
                                    <label>Brands</label>
                                    <select name="brands" class="selected" id="BrandsSelect" data-link="{{ route ( 'front.ajax.models' ) }}">
                                        @foreach ( $brands as $brand )
                                            <option value="{{ $brand->id }}"
                                            @if ( request ()->get ( 'brands' ) )
                                                @if ( request ()->get ( 'brands' ) == $brand->id )
                                                    selected
                                            @endif
                                        @endif
                                            >{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col custom-col-6">
                                    <label>MISSING MODEL</label>
                                    <select name="models"
                                            class="selected"
                                            id="ModelsAppend"
                                            data-load="{{ request ()->get ( 'brands' ) }}"
                                            data-active="{{ request ()->get ( 'models' ) }}"
                                            data-link="{{ route ( 'front.ajax.models' ) }}">
                                        <option value="">Select Model</option>
                                    </select>
                                </div>
                                <div class="col custom-col-6">
                                    <button class="btn">SELECT VEHICLE</button>
                                </div>
                            </div>
                        </form>
                        <div class="car-search-map-icon"><i class="flaticon-location"></i></div>
                        <div class="car-search-shape"><img src="img/images/car_search_shape.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- car-search-area-end -->

    <!-- car-search-area -->
    <section class="popular-selling-wrap gray-bg pt-15">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-selling-wrap">
                        @if ( $cars->isEmpty() )
                            There are no cars in the section
                        @endif
                        @foreach ( $cars as $car )
                        <div class="inventory-list-item">
                            <div class="inventory-list-thumb">
                                <img src="{{ asset ( $car->imagesFirst->image ) }}" alt="">
                            </div>
                            <div class="inventory-list-content">
                                <h4><a href="{{ route ( 'main.cars.show' , [ 'id' => $car->id ] ) }}">{{ $car->title }}</a></h4>
                                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ $car->description }}</p>
                                <div class="inv-item-meta">
                                    <ul>
                                        <li class="call"></li>
                                        <li>Year : {{ $car->year }}</li>
                                        <li>Color : {{ $car->color }}</li>
                                        <li>{{ $car->mileage }} miles</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- car-search-area-end -->

@endsection
