@extends('default')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">


            @if(Session::has('loginMessage'))
            {{ Session::get('loginMessage') }}: {{ Auth::user()->name }}
            @endif

        </h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->

<div class="row">
    <div class="flex-center position-ref full-height">


        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="input-group custom-search-form">
                    <div class="table-responsive">
                        Welcome To Challenge Dashboard!
                    </div>
                </div>


            </div>
        </div>

    </div>

    @endsection