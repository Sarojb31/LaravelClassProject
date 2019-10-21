     
@extends('FrontEnd.home')

@section('title')

Home
@endsection

@section('css')

<style type="text/css">
 /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
      /*New product*/
    .img-wrap {
    position: relative;
    border-radius: 0.25rem 0 0 0.25rem; }

    .img-wrap {
    border-radius: 0.2rem 0.2rem 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    width: 100%;
    text-align: center; }

    .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      width: auto;
      align-content: center;
      display: inline-block;
      -o-object-fit: cover;
         object-fit: cover; }

     .img-wrap {
       height: 180px; }

    .img-wrap {
      overflow: hidden;
      }

      .card-product {
  margin-bottom: 1rem;
  width: 100%;
  /* btn-overlay-bottom */ }
  .card-product:after {
    content: "";
    display: table;
    clear: both;
    visibility: hidden; }
  .card-product .img-wrap {
    border-radius: 0.2rem 0.2rem 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center; }
    .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      width: auto;
      display: inline-block;
      -o-object-fit: cover;
         object-fit: cover; }
  .card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .action-wrap {
    padding-top: 4px;
    margin-top: 4px; }
  .card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee; }
  .card-product .title {
    margin-top: 0; }
  .card-product .btn-overlay {
    -webkit-transition: .5s;
    transition: .5s;
    opacity: 0;
    left: 0;
    bottom: 0;
    color: #fff;
    width: 100%;
    padding: 5px 0;
    font-size: 12px;
    text-align: center;
    position: absolute;
    text-transform: uppercase;
    background: rgba(0, 0, 0, 0.5); }
  .card-product:hover .btn-overlay {
    opacity: 1; }
  .card-product:hover {
    -webkit-box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);
            box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);
    -webkit-transition: .5s;
    transition: .5s; }





    </style>

@endSection


@section('content')
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    


    <div class="carousel-item active">
      <div class="view" style="max-height:583px;" >
        <img class="d-block w-100" style="height: 100%;" src="{{asset('FrontEnd_asset/images/sl-1.jpg')}}"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
       </div>
      <div class="carousel-caption align-content-center">
        <h3 class="h3-responsive">PustakSewa</h3>
        
      </div>

    </div>
   

    <div class="carousel-item">
      <!--Mask color-->
      <div class="view" style="max-height:583px ">
        <img class="d-block w-100" style="height: 100%;" src="{{asset('FrontEnd_asset/images/img.jpg')}}"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Reuse the Book</h3>
        <!-- <p>Third text</p> -->
      </div>
    </div>

    <div class="carousel-item">
      <!--Mask color-->
      <div class="view" style="max-height:583px;" >
        <img class="d-block w-100" style="height: 100%;" src="{{asset('FrontEnd_asset/images/BookClub_Banner.jpg')}}"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">GO Green</h3>
       
      </div>
    </div>
  </div>

  <!--/.Slides-->
  
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->


<!-- New Products-->
@foreach($category as $value)
<div class="container">
  <div class="row text-center" style="height: 200px; padding: 30px 0; margin: 50px 0; ">
    <div class="col-12 align-middle ">
        <h3 class="text-center" style="color:green">{{ $value->category_title }} </h3>
        <p class="text-center " >ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dcommodoor incididunt ut labore et dcommodo
        consequat. Duis a
        consequat. Duis a.</p>
  </div>
  </div>
</div>


<!-- New Product Text// -->




<div class="container">
  <div class="row " >
    @foreach($value->product as $product)
              <div class="col-sm-6 col-md-3 col- " >
                <figure class="card card-product "  >
                    <div class="img-wrap imgcontainer ">
                     <a href="{{route('product',$product->id)}}">
                        <img src="{{asset('storage/'.$product->product_image)}}" alt="{{$product->product_name}}" class="image" ></a>
                        <div class="middle">
                         <a href="{{route('product',$product->id)}}"><i class="fas fa-shopping-cart fa-3x text"></i></a>
                         </div>
                    </div>
                    <figcaption class="info-wrap">
                        <a href="{{route('product',$product->id)}}" class="title">{{$product->product_name}}</a>
                        <p>{{$product->description}}</p>
                          <div class="price-wrap">
                              <span class="price-new">{{$product->price}}</span>
                          </div> <!-- price-wrap.// -->
                          

                    </figcaption>
                </figure> <!-- card // -->
              </div> 
              @endforeach  
  </div>

  @endforeach
  <!--Row COmpleted-->
</div><!--Conatainer-->
</div>


@endsection