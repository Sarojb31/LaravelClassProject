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
            <h4><span style="color:green">Thank You</span>!!!</h4></p>
  </div>
  </div>
</div>


    <div class="row">
        <div class="container">
        <div class="white-box">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('donate.submit')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Book Name</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Name of the Book" value="{{old('title')}}">
                        </div>
                    </div>

                   

                    <!-- <div class="col-md-3 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter Price for the Book" value="{{old('price')}}">
                        </div>
                    </div>
                </div> -->

               <br>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity" placeholder="No. of book" value="{{old('title')}}">
                        </div>
                    </div>

                   <!--  <div class="col-md-3 col-md-offset-1">
                        <div class="form-group">
                            <label class="control-label">Discount</label>
                            <input type="number" class="form-control" name="discount" placeholder="Enter Product Discount" value="{{old('brand')}}">
                        </div>
                    </div>
                </div> -->
                
                

                <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="control-label">Category</label>
                            <select name="category" id="parent_category" class="form-control">
                                <option value="0" selected>---Select Any One Category---</option>
                                @foreach($category as $value)
                                    <option value="{{$value->id}}">{{$value->category_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-file-now" class="col-md-12">Book Image</label>
                            <input type="file" name="image" id="input-file-now" class="dropify"/>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="input-file-now" class="col-md-12">Other Image</label>
                            <input type="file" name="other_images[]" multiple>
                        </div>
                    </div>
                </div>
 -->

                <div class="form-group">
                    <input type="submit" value="Donate Book" class="btn btn-success">
                </div>


            </form>
        </div>
    </div>
    </div>

@endsection

