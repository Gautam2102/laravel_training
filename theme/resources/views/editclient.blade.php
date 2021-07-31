@extends('layouts.home')

@section('content')
<div class="container mb-5" style="margin-top:100px;border-radius:30px;">
    <div class="row justify-content-center">
    @if ($message = Session::get('success'))

<script>
    swal( "success", "{!! $message !!}", {

        button: "ok",

    })

</script>

    @elseif($message = Session::get('fails'))
    <script>
    swal( "failed", "{!! $message !!}", {

        button: "ok",

    })

</script>

@endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-weight:bold;">{{ __( 'Client ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateclient') }}" >
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}"class="form-control">
                        
                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" >
                                <input id="" type="hidden" class="form-control" name="image"value="{{$data->image}}" >
                                @error('image')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <img src="{{asset('img/'.$data->image)}}" height="120px"width="130px" alt="">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
