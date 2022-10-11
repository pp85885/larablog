@extends('layouts.master')

@section('title', 'Category')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Category
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imgae</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <td>
                                    <img width="40" src="{{ asset('uploads/category/' . $item->image) }}"
                                        alt="category-image">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status == '1' ? 'Shown' : 'hidden' }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-category') . '/' . $item->id }}" class="btn btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    {{-- <a href="{{ url('admin/delete-category/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <button class="btn btn-danger" onclick="deleteRecord(this.value)"
                                        value="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="alert alert-danger">Are you sure to <b>delete</b> this record ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger delete" value="">Yes</button>
                </div>
            </div>
        </div>
    </div>

@endsection()

@section('script')
<script>
    function deleteRecord(category_id) {
        $('.delete').val(category_id);
        $('#deleteModal').modal('show');
    }
    $(document).on('click','.delete',function(){
        var cate_id  =  $(this).val();
        window.location.href= "{{ url('admin/delete-category/') }}/" + cate_id;
    });
</script>
@endsection