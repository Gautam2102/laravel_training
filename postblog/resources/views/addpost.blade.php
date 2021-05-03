
@include(public_path('css/add_post.css'))

<div class="container">
    <form id="contact" action="/add-post" method="post" enctype="multipart/form-data">
        @csrf
        @if ($message = Session::get('success'))

        <div class="success">


            <strong>{{ $message }} <a href="{{ URL('/show-post/'.session('id'))}}"style="text-align:center;">Show</a></strong>

        </div>
       
        @endif
        <h3>Post Blog</h3>
        <input type="hidden" name="id" value="{{session('id')}}">
        <fieldset>
            <input name=" title" placeholder="Enter Title" type="text">
            @error('title')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>

        <fieldset>
            <textarea placeholder="Type your body here...." name="body" tabindex="5"></textarea>
            @error('body')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>

        <fieldset>
            <input placeholder="Description" name="description" type="text">
            @error('description')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>

        <fieldset>
            Insert Image:
            <input type="file" name="image">
            @error('image')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>

        <button type="submit" name="submit" class="btn-info btn-block">Post</button>

    </form>
</div>