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
                                    <th><strong>Action</strong></th>

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

                                    @if (!auth()->user()->isParticipant()) <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditChallengeModal{{$data->id}}">
                                            Edit
                                        </button></td>

                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="EditChallengeModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form class="" action="{{URL::to('/editChallenge')}}" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Challenge</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        @csrf
                                                        <input type="hidden" id="title" name="id" class="form-control" value="{{$data->id}}" placeholder="Enter title">

                                                        <label for="title">Title</label>

                                                        <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}" placeholder="Enter title">
                                                        <br><br>
                                                        <label for="status">Status</label>
                                                        <select id="status" name="status" class="form-control">

                                                            <option value="closed" name="status">closed</option>
                                                            <option value="ongoing" name="status">ongoing</option>
                                                        </select>
                                                        <br><br>
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" class="form-control" placeholder="Enter description">{{$data->description}}</textarea>
                                                        <br><br>
                                                        <label for="startDate">StartDate</label>
                                                        <input type="date" id="startDate" name="startDate" class="form-control" value="{{$data->startDate}}" placeholder="Enter startDate">
                                                        <br><br>
                                                        <label for="finishDate">FinishDate</label>
                                                        <input type="date" id="finishDate" name="finishDate" class="form-control" value="{{$data->finishDate}}" placeholder="Enter finishDate">



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    @if (auth()->user()->isParticipant()) <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#submitCodeModal{{$data->id}}">
                                            Submit Code
                                        </button></td>
                                    @endif
                                    <!-- Modal -->
                                    <div class="modal fade" id="submitCodeModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form class="" action="{{URL::to('/submitCode')}}" method="post">
                                            
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">My Code</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    @csrf
                                                        <input type="hidden" id="title" name="challenge_id" class="form-control" value="{{$data->id}}" placeholder="Enter title">


                                                        <label for="description">My Code:</label>
                                                        <br><br>
                                                        <textarea name="myCode" class="form-control"></textarea>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit Code</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

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