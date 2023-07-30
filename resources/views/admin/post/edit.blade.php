
@extends('layouts.master')

@section('title','Edit Post')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Post</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error )
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ url('admin/update-post/'.$post_info->id) }}">
                @csrf
                @method('put')
                
                <div class="mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">---Select---</option>
                        @foreach ($category as $obj )
                            <option value="{{ $obj->id }}" {{ $post_info->category_id == $obj->id ? 'selected': '' }}>{{ $obj->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Post Name</label>
                    <input type="text" name="name" value="{{ $post_info->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" value="{{ $post_info->slug }}"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control summernote" rows="4">{{ $post_info->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>iframe</label>
                    <input type="text" name="yt_iframe" value="{{ $post_info->yt_iframe }}"class="form-control">
                </div>

                <div class="mb-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post_info->meta_title }}"class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $post_info->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword</label>
                    <input type="text" name="meta_keyword"value="{{ $post_info->meta_keyword }}" class="form-control">
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status"{{ $post_info->status ==1 ? 'checked':'' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection()