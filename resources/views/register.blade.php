@extends('default')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Register</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->

<div class="row">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif

            <div class="content">
                <div class="input-group custom-search-form">
                    <form class="" action="{{URL::to('/store')}}" method="post">
                        @csrf
                        <input type="text" name="name" class="form-control" value="" placeholder="Enter name">
                        <br><br>
                        <input type="text" name="email" class="form-control" value="" placeholder="Enter email">
                        <br><br>
                        <input type="password" name="password" class="form-control" value="" placeholder="Enter password">
                        <br><br>
                        <input type="hidden" name="_taken" value="{{csrf_token()}}">
                        <br><br>
                        <button type="submit" name="button">Register</button>



                    </form>
                </div>
            </div>
            @if($errors->any())
            <h4 class="alert alert-danger">{{$errors->first()}}</h4>
            @endif
        </div>
    </div>

</div>

@endsection