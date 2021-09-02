@extends('common')

@section('content')
    <div class="container m-5">
        <form action="{{ route('postdata')}}" method="post">
            @csrf

            <div class="container register-form">
                <div class="form">
                    <div class="note">
                        <h4>Please Fill Details*</h4>
                    </div>
                    @if(Session::has('message'))
                    <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
                    @endif
                    <div class="form-content">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name *" />
                                    @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="address"
                                        placeholder=" Your Address *" />
                                    @error('address')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder=" Your Email*"
                                        value="" />
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile *"
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
                                    
                                    @error('city')
                                    <div class="text-danger">{{$message}}</div>

                                    @enderror
                                    <select class="form-control" name="city" placeholder="City *">

                                    <option value="">Select City</option>
                                    @foreach($city as $list)
                                    <option value="{{$list->city}}">{{$list->city}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btnSubmit  btn-block">Submit</button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
@endsection