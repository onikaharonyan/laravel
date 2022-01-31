@extends ( 'front.layouts.home' )

@section ( 'title' , $car[0]->title )

@section ( 'content' )
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg inventory-details-breadcrumb" data-background="{{ asset ( 'front/img/bg/breadcrumb_bg.jpg' ) }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2>{{ $car[0]->title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- inventory-details-slide -->
    <div class="inventory-details-slide">
        <div class="container-fluid p-0 fix">
            <div class="row no-gutters inv-details-active">
                @foreach ( $car[0]->images as $image )
                    <div class="col-lg-4">
                        <div class="inv-details-slide-item">
                            <img src="{{ asset ( $image->image ) }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- inventory-details-slide-end -->

    <!-- inventory-list-area -->
    <section class="inventory-details-area gray-lite-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inventory-features mb-30">
                        <div class="inv-details-title">
                            <h5>Inventory Features</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <div class="inventory-features-item">
                                    <h6>Year :</h6>
                                    <span>{{ $car[0]->year }}</span>
                                </div>
                                <div class="inventory-features-item">
                                    <h6>Mileage :</h6>
                                    <span>{{ $car[0]->mileage }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="inventory-features-item">
                                    <h6>Engine :</h6>
                                    <span>{{ $car[0]->engine }}</span>
                                </div>
                                <div class="inventory-features-item">
                                    <h6>Towing :</h6>
                                    <span>{{ $car[0]->towing }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="inventory-features-item">
                                    <h6>Wheel :</h6>
                                    <span>{{ $car[0]->wheel }}</span>
                                </div>
                                <div class="inventory-features-item">
                                    <h6>Gearbox :</h6>
                                    <span>{{ $car[0]->gearbox }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4">
                                <div class="inventory-features-item">
                                    <h6>Color :</h6>
                                    <span>{{ $car[0]->color }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inventory-details-description mb-30">
                        <div class="inv-details-title">
                            <h5>Description</h5>
                        </div>
                        <p>{{ $car[0]->description }}</p>
                    </div>
            </div>
        </div>
    </section>
    <!-- inventory-list-area-end -->

@endsection
