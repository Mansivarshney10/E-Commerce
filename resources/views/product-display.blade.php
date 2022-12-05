@include('product-layout')

<style>
    .price {
        margin-top: -45px;
    }

    .ratings{
        margin-right:10px;
    }

    .ratings i{
        
        color:#cecece;
        font-size:18px;
    }

    .rating-color{
        color:#fbc634 !important;
    }

    .review-count{
        font-weight:400;
        margin-bottom:2px;
        font-size:18px !important;
    }

    .small-ratings i{
    color:#cecece;   
    }

    .review-stat{
        font-weight:200;
        font-size:18px;
        margin-bottom:2px;
    }

</style>

@php 
$data = session('view');

$disPrice = $data['price'] - $data['productDetails'][0]['discount']/100;
$emi = number_format((float)$data['price']/12, 2, '.', '');

@endphp

<div class="container">
    <div class="jumbotron">
        <div class="card mb-3 product" style="max-width: 100%;">
            <div class="row g-0">
              <div class="col-md-4">
                {{-- <img src="{{ $data['image'] }}" class="img-fluid rounded-start mt-3" alt="..."> --}}
                
                <div id="carouselExampleControls" class="carousel slide mt-4 me-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $data['image'] }}" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $data['image'] }}" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $data['image'] }}" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
              </div> 

              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $data['name'] }} - {{ $data['description'] }}</h5>

                  <div class="height-100 container justify-content-center align-items-center">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="ratings">
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star rating-color"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h6 class="review-count">12 Reviews</h6>
                        </div>
                    </div>
                  </div>

                  <p class="discount" style="font-size: 20px">{{ $data['productDetails'][0]['discount'] }}% &nbsp; ₹ {{ $disPrice }}</p>
                  <s class="price" style="font-size: 18px">₹ {{ $data['price'] }}</s>
                  <p>Inclusive of all taxes EMI starts at ₹{{ $emi }}. No Cost EMI available</p>
                  <h3> About the Phone </h3>
                  <ul>
                    <li>{{ $data['productDescription'][0]['point_1'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_2'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_3'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_4'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_5'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_6'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_7'] }}</li>
                    <li>{{ $data['productDescription'][0]['point_8'] }}</li>
                  </ul>

                  <p class="btn-holder"><a href="{{ route('add.to.cart', $data['id']) }}" class="btn btn-warning text-center" role="button">Add to cart</a>
                  <a href="..." class="btn btn-secondary text-center" role="button" @disabled(true)>Wish list</a></p>
                  
                  <div class="row g-0">
                    <div class="card ms-4" style="width: 10rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Iphone 12 (128GB) - Blue</h5>
                        <a href="#" class="btn btn-primary">Shop</a>
                        </div>
                    </div>

                    <div class="card ms-4" style="width: 10rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Iphone 12 (128GB) - white</h5>
                        <a href="#" class="btn btn-primary">Shop</a>
                        </div>
                    </div>

                    <div class="card ms-4" style="width: 10rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Iphone 12 (128GB) - purple</h5>
                        <a href="#" class="btn btn-primary">Shop</a>
                        </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
<div>