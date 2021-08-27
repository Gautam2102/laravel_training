@extends('common')

@section('content')
<div class="container m-5">
    <form action="{{ route('postbill')}}" method="post">
        @csrf

        <div class="container register-form">
            <div class="form">
                <div class="note">
                    <h2>genrate bill*</h2>
                </div>
                @if(Session::has('message'))
                <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
                @endif
                <div class="form-content">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name *"
                                    value="{{$data->name}}" />
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">

                                <select class="form-control" name="month">
                                    <option value="">Select Month </option>
                                    <?php  for($i = 1; $i <= 12; $i++){  ?>

                                    <option value="<?= date('M', strtotime('2020-'.$i.'-01')) ?>">
                                        <?= date('M', strtotime('2020-'.$i.'-01')) ?>
                                    </option>
                                    <?php }  ?>

                                </select>
                                @error('month')
                                <div class="text-danger">{{$message}}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="units" placeholder=" Enter Units Cosume*"
                                    value="" />
                                @error('units')
                                <div class="text-danger">{{$message}}</div>

                                @enderror
                            </div>


                        </div>
                        <button type="submit" class="btnSubmit  btn-block">Submit</button>
                    </div>
                </div>
    </form>
</div>
@endsection