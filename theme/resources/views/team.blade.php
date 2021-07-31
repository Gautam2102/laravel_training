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
                <div class="card-header text-center" style="font-weight:bold;">{{ __( 'Team ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('postteam') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" autocomplete="name" autofocus>

                                @error('title')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror"
                                    name="body" value="{{ old('body') }}" ></textarea>

                                @error('body')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    >

                                @error('description')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image">
                                @error('image')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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
