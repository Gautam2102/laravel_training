
@extends('common')

@section('content')
   <!-- Button trigger modal -->
   <div class="container">
   @if(Session::has('message'))
                    <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
                    @endif

    <table class="table table-bordered data-table m-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Month</th>
                <th>city</th>
                <th>Units</th>
                <th>Total Amount</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
</body>
   
<script type="text/javascript">
$(function() {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.billlist') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'months',
                name: 'months'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'units',
                name: 'units'
            },
            {
                data: 'amounts',
                name: 'amounts'
            },
            {
            data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

});
</script>
@endsection

</html>