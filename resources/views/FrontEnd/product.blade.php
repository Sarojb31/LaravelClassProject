@extends('FrontEnd.home')

@section('title')

Login
@endsection



@section('content')

<!-- New Products-->
<div class="container">
  <div class="row text-center" style="height: 200px; padding: 30px 0; margin: 50px 0; ">
    <div class="col-12 align-middle  h-100">
        <h3 class="text-center">Pustak <span style="color:green">Product</span></h3>
        <p class="text-center ">Your Donation Might be more than enough for Readers.<br>
          <h4><span style="color:green">PLEASE THINK ABOUT IT</span>!!!</h4></p>
  </div>
  </div>
</div>
<!-- New Product Text// -->

<div class="container">

<div class="card">
  <div class="row">
    <aside class="col-sm-5 border-right">
<div >
 <form method="POST" action="{{ route('order.register') }}" enctype="multipart/form-data" id="order">
   @csrf
   <input type="hidden" name="product_id" value="{{$product->id}}">
   <input type="hidden" name="ordered_by" value="Auth:user()">
    <input type="hidden" name="price" value="{{$product->price}}">



   <div class="align-self-center" style="max-width: 300;"> <a href="#"><center><img src="{{ asset('storage/'.$product->product_image)}}" alt="" style="width: 100%"></center></a></div>
</div> <!-- slider-product.// -->

    </aside>
    <aside class="col-sm-7">
            <article class="card-body p-5">
          <h3 class="title mb-3" style="color:green; text-transform: uppercase;">{{$product->product_name}}</h3>

            <p class="price-detail-wrap"> 
          <span class="price h3 text-warning"> 
        <span class="currency">RS</span><span class="num">{{$product->price}}</span>
  </span> 
  </p> <!-- price-detail-wrap .// -->
<dl class="item-property">
  <dt>Description</dt>
  <dd><p>{{$product->description}} </p></dd>
</dl>
<dl class="param param-feature">
  <dt>PustakSewa ID</dt>
  <dd>{{$product->id}}</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>AUTHOR</dt>
  <dd>{{$product->author}}</dd>
</dl>  <!-- item-property-hor .// -->
<dl class="param param-feature">
  <dt>LOCATION</dt>
  <dd>PATANDHOKA</dd>
</dl>  <!-- item-property-hor .// -->

<hr>

  <div class="row">
    <div class="col-sm-5">
      <dl class="param param-inline">
        <dt>Quantity: </dt>
        <dd>
          <select class="form-control form-control-sm" style="width:70px;" name="quantity">
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> 3 </option>
          </select>
        </dd>
      </dl>  <!-- item-property .// -->
    </div> <!-- col.// -->
    
  </div> <!-- row.// -->
<hr>
</form>
  <a class="btn btn-lg btn-primary text-uppercase" onclick="event.preventDefault();document.getElementById('order').submit();"> <span>Add to Cart</span> </a>
  </article> <!-- card-body.// -->
    </aside> <!-- col.// -->
  </div> <!-- row.// -->
</div> <!-- card.// -->
</div>
<!--container.//-->


@endsection
