@extends('layouts.app')

@section('meta_description',"$category->meta_description")

@section('meta_keyword',"$category->meta_keyword")

@section('title',"$category->meta_title")

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>{{ $category->name }}</h4>    
                </div> 
                
                @forelse ($post as $postItem)
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            
                            <a href="{{ url('tutorial/'.$category->slug.'/'.$postItem->slug) }}" class="text-decoration-none">
                                <h2 class="post-heading">{{ $postItem->name }}</h2>
                            </a>
                            <h6>Posted On: {{ $postItem->created_at->format('d-m-Y') }}
                                <span class="ms-3">Posted By: {{ $postItem->user->name }}</span>
                            </h6>
                        </div>
                    </div>
                @empty
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <h2 class="post-heading">No Post Available...!</h2>
                        </div>
                    </div>
                @endforelse
                <div class="pagination">
                    {{ $post->links() }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="border p-2">
                    <h4><img src="{{ asset('assets/images/ads3.png') }}" alt="ads" class="w-100"></h4>
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

@endsection()