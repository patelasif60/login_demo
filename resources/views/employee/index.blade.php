@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Employee</h1>
    <a href="{{route('employee.create')}}" class="btn btn-sm btn-primary float-end mb-3">Create Employee</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>company</th>
                <th width="300px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data) && $data->count())
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->first_name }} {{$value->last_name}}</td>
                        <td>{{ $value->company->name }}</td>
                        <td>
                            <a href="{{route('employee.edit',$value->id)}}" class="btn btn-sm btn-info">Edit</a>
                            <button onclick ="changeStatus({{$value->is_active}},{{$value->id}})" class="btn btn-sm {{$value->is_active ? 'btn-secondary' : 'btn-primary'}}">{{$value->is_active ? 'DeActive' :'Active'}}</button>
                            <button onclick ="deleteemployee({{$value->id}})" class="btn btn-sm btn-danger">Delete</button>
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
</div>
@endsection
<script>
function changeStatus(val,id){
    status = val==0 ? 1 : 0;
    $.ajax({
        type: "post",
        url: '{{ route('employee.changestatus') }}',
        data: {
            'id':id,
            'is_active':status,
            '_token': '{{ csrf_token() }}'
        },
        success: function( response ){
            $("#preloader").hide();
            location.reload()
        }
    })
}
function deleteemployee(id) {
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
                    url: '{{ route('employee.destroy') }}',
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