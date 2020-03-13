@extends('default')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Approve Guest</h1>


    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->

<div class="row">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="input-group custom-search-form">
                <div class="table-responsive">
                    <table id="tableCss" class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><strong>ID</strong></th>
                                <th><strong>Name</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Type</strong></th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $key => $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->type}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditUserModal{{$data->id}}">
                                        Edit
                                    </button></td>





                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="EditUserModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form class="" action="{{URL::to('/approveUser')}}" method="post">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Approve User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" id="title" name="user_id" class="form-control" value="{{$data->id}}" placeholder="Enter title">


                                                <label for="type">Role:</label>
                                                <br><br>
                                                <select id="type" name="type" class="form-control">
                                                    <option value="Admin" name="type">Admin</option>
                                                    <option value="Orginazer" name="type">Orginazer</option>
                                                    <option value="Participant" name="type">Participant</option>
                                                    <option value="Guest" name="type">Guest</option>
                                                </select>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

</div>

@endsection