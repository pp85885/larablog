@extends('layouts.app')

@section('title','Stone | Blog')

@section('content')

<div class=" bg-danger py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    @foreach ($category as $item)
                        
                    <div class="item">
                        <a href="{{ url('tutorial/'.$item->slug) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ asset('uploads/category/'.$item->image) }}" alt="ads" class="w-100">
                                <div class="card-body">
                                    <h5 class="text-dark text-center">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-grey">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertising Area</h3>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Blog Of Stone</h4>
                <div class="underline"></div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque veniam suscipit, inventore id voluptatem deleniti odit magnam assumenda quibusdam repellendus libero voluptates perferendis cumque nobis, quasi dolore deserunt veritatis? Optio.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque veniam suscipit, inventore id voluptatem deleniti odit magnam assumenda quibusdam repellendus libero voluptates perferendis cumque nobis, quasi dolore deserunt veritatis? Optio.</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
                <div class="underline"></div>
            </div>
            @foreach ($category as $item)
            <div class="col-md-3">
                <div class="card card-body mb-3">
                    <a href="{{ url('tutorial/'.$item->slug) }}" class="text-decoration-none">
                        <h4 class="text-dark mb-0 text-center">{{ $item->name }}</h4>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach ($latest_post as $post)
                <div class="card card-body shadow mb-3">
                    <a href="{{ url('tutorial/'.$post->category->slug.'/'.$post->slug) }}" class="text-decoration-none">
                        <h4 class="text-dark mb-0">{{ $post->name }}</h4>
                    </a>
                    <h6 class="mt-2">Posted On: {{ $post->created_at->format('d-M-Y') }}</h6>
                </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="text-center border p-3">
                    <h3><img src="{{ asset('assets/images/ads3.png') }}" alt="ads"></h3>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    $(function() {
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 5,
            loop: true,
            nav: false,
            dots: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,

            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });
    });
</script>   
{{-- <script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({

            loop:true,
            margin:10,
            nav:true,
            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,

            //Autoplay
            autoPlay : false,
            goToFirst : true,
            goToFirstSpeed : 1000,

            // // Navigation
            // navigation : true,
            // navigationText : ["prev","next"],
            // pagination : true,
            // paginationNumbers: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    });
</script> --}}

@endsection()