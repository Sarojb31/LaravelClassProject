@extends('FrontEnd.home')

@section('title')

Donate Books
@endsection

@section('content'))

<div class="container">
  <div class="row text-center" style="height: 200px; padding: 30px 0; margin: 50px 0; ">
    <div class="col-12 align-middle  h-100">
        <h3 class="text-center">Pustak <span style="color:green">Product</span></h3>
        <p class="text-center ">Your Donation will be of greater cause .<br>
           </p>
            <hr>
             <h4><span style="color:green">Thank You</span>!!!</h4></p>
  </div>
  </div>
</div>

 
    <div class="row container">
        <div class="white-box col-12">
            <table class="table table-bordered " id="user-datatable" title="PRODUCT TABLE">
                <thead>
                <tr>
                <th>S.N.</th>
                <th>Name</th>

                <th>Added By</th>
                <th>Image</th>
                
                </tr>
                </thead>
                <tbody>
                    @foreach($donation as $value)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->name}}</td>
                    
                    
                    <td>{{$value->user->name}}</td>
                     <td><img src="{{asset('storage/'.$value->image)}}" alt="{{$value->image}}" style="max-width: 100px;" class="img img-responsive"></td>
               </tr>
               @endforeach
        </div>
    </tbody>
</table></div></div>






@endsection