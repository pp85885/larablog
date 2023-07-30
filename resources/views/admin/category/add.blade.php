
@extends('layouts.master')

@section('title','Add Category')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error )
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ url('admin/add-category') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <h6>SEO mode</h6>
                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword</label>
                    <input type="text" name="meta_keyword" class="form-control">
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection()