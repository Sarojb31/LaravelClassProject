@extends('layouts.app')

@section('title')
User Edit
@endsection

@section('page_heading')
    User Edit
@endsection

@section('content')
    <div class="white-box">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">
                            <a href="{{ route('admin.user.list') }}" class="btn btn-info"><i class="fa fa-arrow-circle-left"></i> Back</a>
                            <br>
                            <br>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.user.update') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{$user->id}}" name="user_id">

                                <div class="form-group row" >
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <input  type="text" class="form-control " name="name" value="{{ $user->name }}" >

                                        @if($errors->has('name'))
                                            <span class="invalid-feedback" role="alert" style="color:red;">
                                                <b> * {{ $errors->first('name') }}</b>
                                            </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input  type="email" readonly class="form-control " name="email" value="{{ $user->email }}" required >

                                        @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert" style="color:red;">
                                                <b> * {{ $errors->first('email') }}</b>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">Contact Number</label>

                                    <div class="col-md-6">
                                        <input  type="number" class="form-control  is-invalid " name="contact" value="{{ $user->contact_number }}"  placeholder="Enter Phone Number">

                                        @if($errors->has('contact'))
                                            <span class="invalid-feedback" role="alert" style="color:red;">
                                                <b> * {{ $errors->first('contact') }}</b>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"> New Password</label>

                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" >

                                        @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert" style="color:red;">
                                                 *<b> {{ $errors->first('password') }} </b>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input  type="password" class="form-control" name="password_confirmation" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Image Upload') }}</label>

                                    <div class="col-md-6">
                                        <input type="file" name="user_avatar">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection