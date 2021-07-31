@extends('layouts.home')

@section('content')
<center>
<div class="container">
    @if ($message = Session::get('success'))

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

    </div>
</div>
@endif
</center>
<div class="container mt-5"style="margin-left:100px;">
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Body</th>
                
                <th>Action</th>


            </tr>

        </thead>

    </table>
</div>

<script>
    $(function () {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            method: 'GET',
            ajax: '{{route("showclientajax")}}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });

</script>

@endsection
