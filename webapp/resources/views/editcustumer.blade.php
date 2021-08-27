@extends('common')

@section('content')
    <div class="container m-5">
        <form action="{{ route('updatedata')}}" method="post">
            @csrf

            <div class="container register-form">
                <div class="form">
                    <div class="note">
                        <h2>Update Details</h2>
                    </div>
                    @if(Session::has('message'))
                    <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
                    @endif
                    <div class="form-content">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                <input type="hidden" class="form-control" name="id"  value="{{$data->id}}"/>
                                    <input type="text" class="form-control" name="name" placeholder="Your Name *" value="{{$data->name}}"/>
                                    @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="address"
                                        placeholder=" Your Address *" value="{{$data->address}}" />
                                    @error('address')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  value="{{$data->email}}" name="email" placeholder=" Your Email*"
                                        value="" />
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}" placeholder="Mobile *"
                                        value="" />
                                    @error('mobile')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"value="{{$data->city}}" name="city" placeholder="City *" />
                                    @error('city')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                                <button type="submit" class="btnSubmit  btn-block">Update</button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
@endsection