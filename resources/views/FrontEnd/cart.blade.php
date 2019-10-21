@extends('FrontEnd.home')

@section('title')

Cart
@endsection

@section('content')

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

<!-- Product Container -->
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

<div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                   @php($total = 0)
               
@foreach($order as $value)
              <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="{{ asset('storage/'.$value->product->product_image)}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">{{$value->product->product_name}}</a></h5><span class="text-muted font-weight-normal font-italic">{{$value->product->category->category_title}}</</span>
                      </div>
                    </div>
                  </th>
                  <td class="align-middle"><strong>{{$value->price}}</strong></td>
                  <td class="align-middle"><strong>{{$value->quantity}}</strong></td>
                  <td class="align-middle"><a onclick="event.preventDefault(); document.getElementById('trash').submit();"><i class="fa fa-trash"></i></a>
                  </td>
                  <form action="{{route('trash',$value->id)}}" id="trash" method="POST">
                            @csrf
                                

                        </form>

               
                  @php($total=$total + $value->price)
                </tr>

      @endforeach
                
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        
        <div class="col-lg-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <ul class="list-unstyled mb-4">
              
                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">RS :{{$total}}</h5>
              </li>
            </ul><a href="{{route('final')}}" class="btn btn-dark rounded-pill py-2 btn-block" onmouseover="this.style.background:green">Check Out</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



@endsection