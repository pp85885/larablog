@extends('layouts.app')

@section('meta_description',"$post->meta_description")

@section('meta_keyword',"$post->meta_keyword")

@section('title',"$post->meta_title")

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>{{ $post->name }}</h4>    
                </div> 
                <h6>{!! $post->category->name . " / ". $post->name !!}</h6>
                <div class="card card-shadow mt-4 mb-5">
                    <div class="card-body">
                        <p>{!! $post->description !!}</p>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card card-shadow">
                    <div class="card-header">
                        <h3>Leave your Comment</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('save-post') }}" method="post">
                            @csrf
                            <input type="hidden" name="post" value="{{ $post->id }}">
                            <div class="form-group">
                                <label>Comment</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="3" name="comment" required></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-success">Post</button>
                            </div>
                        </form>
                        @forelse ($post->comments as $comment)
                            <div class="comment-content card card-shadow mt-3" style="padding: 10px">
                                <h6 class="mb-1">{{ $comment->user->name }} 
                                    <small class="ms-3 text-primary">Commented on: {{ $comment->created_at->format('d-M-Y') }}</small>
                                </h6>
                                <p>{{ $comment->comments }}</p>
                                @if (Auth::check() && Auth::user()->id == $comment->user_id)
                                    <div class="button">
                                        <button class="btn btn-primary btn-sm me-2">Edit</button>
                                        <button onclick="delete_comment({{ $comment->id }})" class="btn btn-danger btn-sm me-2 delete">Delete</button>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="alert">
                                <p>No comments found !</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="border p-2 my-2">
                    <h4>
                        <img src="{{ asset('assets/images/ads3.png') }}" alt="ads" class="w-100">
                    </h4>
                </div>
                <div class="card card-shadow mt-2">
                    <div class="card-header"><h3>Latest Post</h3></div>
                    <div class="card-body">
                        @foreach ($latest_post as $obj)
                            <a href="{{ url('tutorial/'.$obj->category->slug.'/'.$obj->slug) }}" class="text-decoration-none">> {{ $obj->name }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function delete_comment(id){
        if(confirm('Do Really want to Delete This ?')){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/delete-comment',
                data: {id : id},
                success: function(data){
                    $('.delete').closest('.comment-content').remove();
                }
            });


        }
    }
</script>


@endsection