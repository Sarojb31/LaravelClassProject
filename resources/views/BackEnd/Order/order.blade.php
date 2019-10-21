helo
@extends('BackEnd.admin')
@section('title')
Order List
@endsection


@section('css')
    <link href="{{ asset('BackEnd_assets/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('title')
Order List
@endsection

@section('page_heading')
    <h3>Order List</h3>
@endsection


@section('content')

    <div class="row ">
        <div class="white-box">
            <table class="table table-bordered  " id="user-datatable">
                <thead>
                {{--<tr>--}}
                <th>S.N.</th>
                <th>Book</th>
                <th>quantity</th>
                <th>Ordered By</th>
                <th>Address</th>
                <th>Total Price(NRS)</th>
                <th>Ordered At</th>
                
                {{--</tr>--}}
                </thead>

                <tbody>
                @foreach($order as $value)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->product->product_name}}</td>
                       <td>{{$value->quantity}}</td>
                        <td>{{$value->user->name}}</td>
                        <td>{{$value->user->address}}</td>

                        
                       @php($total=$value->quantity*$value->product->price)
                       <td>{{$total}}</td>
                       <td>{{$value->created_at}}</td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

 
    

@endsection


@section('scripts')
   

@endsection