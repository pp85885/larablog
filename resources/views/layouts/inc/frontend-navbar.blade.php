<div class="global-navbar">
    <div class="container">
        <div class="row py-2">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                <img src="{{ asset('assets/images/logo.png') }}" class="w-100">
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h2>Advertising Area</h2>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">
                <img src="{{ asset('assets/images/logo.png') }}" style="width: 140px" alt="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    @php
                        $categories  =   App\Models\Category:: where('navbar_status','1')->where('status','1')->get();
                    @endphp

                    @foreach ($categories as $cate)
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('tutorial/'.$cate->slug) }}">{{ $cate->name }}</a>
                    </li>    

                    @endforeach
                </ul>
                @if (Auth::check())
                    <a class="text-decoration-none text-dark bg-white p-2" style="font-weight: 700;" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>                                                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a class="text-decoration-none text-dark bg-white p-2" style="font-weight: 700;" href="{{ route('login') }}">Login</a>
                @endif
            </div>
        </div>
    </nav>
</div>