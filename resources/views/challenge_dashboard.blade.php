@extends('default')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">

            @if ($status === 'ongoing')
            Ongoing Challenges
            @else
            All Challenges
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
                        <table id="tableCss" class="table table-striped table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th><strong>ID</strong></th>
                                    <th><strong>Title</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Description</strong></th>
                                    <th><strong>StartDate</strong></th>
                                    <th><strong>FinishDate</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach(session()->get('data') as $key => $data)--}}

                                @foreach($challenges as $key => $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->startDate}}</td>
                                    <td>{{$data->finishDate}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection