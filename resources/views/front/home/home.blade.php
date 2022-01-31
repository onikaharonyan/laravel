@extends ( 'front.layouts.home' )

@section ( 'title' , 'Home' )

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

    <!-- popular-selling-brand -->
    <section class="car-search-area  gray-bg pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="car-search-wrap">
                        <div class="popular-selling-top">
                            <div class="popular-selling-title">
                                <h4>Brands</h4>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            @foreach ( $brands as $brand )

                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="popular-selling-items">
                                        <a href="{{ route ( 'main.cars' , [ 'brands' => $brand->id ] ) }}"><img src="{{ asset ( $brand->image ) }}" alt=""></a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular-selling-brand-end -->

    <!-- latest-cars-area -->
    <section class="latest-cars-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title text-center mb-35">
                        <h2 class="overlay-title">All Seller</h2>
                        <span class="sub-title">our Featured Cars</span>
                        <h2 class="title">latest released Cars</h2>
                    </div>
                </div>
            </div>
            <div class="latest-cars-wrapper">
                <div class="row latest-car-items-active">
                    @foreach ( $cars as $car )
                        <div class="col-lg-4 col-md-6 grid-item grid-sizer cat-two">
                            <div class="latest-car-item mb-60">
                                <div class="latest-car-thumb mb-25">
                                    <a href="{{ route ( 'main.cars.show' , [ 'id' => $car->id ] ) }}">
                                        <img src="{{ asset ( $car->imagesFirst->image ) }}" alt="">
                                    </a>
                                </div>
                                <div class="latest-car-content">
                                    <div class="latest-car-content-top">
                                        <h5><a href="{{ route ( 'main.cars.show' , [ 'id' => $car->id ] ) }}">{{ $car->title }}</a></h5>
                                    </div>
                                    <p>Build Year : <span>{{ $car->year }}</span></p>
                                    <div class="latest-car-meta">
                                        <ul>
                                            <li><i class="flaticon-settings"></i> {{ $car->gearbox }}</li>
                                            <li><i class="flaticon-gasoline-pump"></i> {{ $car->color }}</li>
                                            <li><i class="flaticon-motorway"></i> {{ $car->mileage }} Ml</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="latest-car-btn text-center mt-10">
                            <a href="{{ route ( 'main.cars' ) }}" class="btn">SHOW ALL CARS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest-cars-area-end -->

@endsection
