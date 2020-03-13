@extends('default')

@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Create Challenge</h1>
        @if(Session::has('addChallenge'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('addChallenge') }}</p>
        @endif
   
    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->

<div class="row">
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="input-group custom-search-form">
                <form class="" action="{{URL::to('/storeChallenge')}}" method="post">
                    @csrf
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="" placeholder="Enter title">
                    <br><br>
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="closed">closed</option>
                        <option value="ongoing" selected>ongoing</option>
                    </select>
                    <br><br>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" value="" placeholder="Enter description"></textarea>
                    <br><br>
                    <label for="startDate">StartDate</label>
                    <input type="date" id="startDate" name="startDate" class="form-control" value="" placeholder="Enter startDate">
                    <br><br>
                    <label for="finishDate">FinishDate</label>
                    <input type="date" id="finishDate" name="finishDate" class="form-control" value="" placeholder="Enter finishDate">
                    <br><br><br><br>
                    <button type="submit" name="button">Create</button>

                </form>
            </div>
        </div>
    </div>

</div>

@endsection