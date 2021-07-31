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
</div>
</center>
<div class="container mt-5"style="margin-left:100px;">
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>


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
            ajax: '{{route("showcontactajax")}}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'message',
                    name: 'message'
                },
                
            ]
        });
    });

</script>

@endsection
