@extends('layouts.app')
@section('page-scripts')
    <script src="{{ asset('js/company/index.js') }}"></script>
@endsection
@section('content')
    <h1>Company</h1>
    <a href="{{route('company.create')}}" class="btn btn-sm btn-primary float-end mb-3">Create Company</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Website</th>
                <th>Logo</th>
                <th width="300px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->website }}</td>
                        <td><img src="{{$value->logo}}"/></td>
                        <td>
                            <a href="{{route('company.edit',$value->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <button onclick="deleteCompany({{$value->id}})" class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>
         
    {!! $data->links() !!}
@endsection
<script>
function deleteCompany(id) {
    swal({
            title: 'Are you sure?',
            text: "This information will be permanently deleted!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result){
            if(result)
            {
                $.ajax({
                    type: "post",
                    url: '{{ route('company.destroy') }}',
                    data: {
                        'id':id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function( response ){
                        $("#preloader").hide();
                        location.reload()
                    }
                })
            }
    });
}
</script>