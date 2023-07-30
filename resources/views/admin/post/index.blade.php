@extends('layouts.master')

@section('title','Posts')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Posts
                <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Posts</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table id="myTable" class="table table-hover table-inverse table-bordered">
                <thead class="thead-inverse">
                    <tr>
                        <th>Post</th>
                        <th>Category</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post_list as $obj)
                    <tr>
                        <td scope="row">{{ $obj->name }}</td>
                        <td>{{ $obj->category->name }}</td>
                        <td>
                            <a href="{{ url('admin/edit-post/'.$obj->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('admin/delete-post')."/".$obj->id }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection