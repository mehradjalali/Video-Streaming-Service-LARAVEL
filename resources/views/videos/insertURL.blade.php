@extends('layouts.app')

@section('content')
<div class='center' style="width: 500px;">
    <div class="container-fluid">
        <br><br><br><br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            @if (\Session::has('fail'))
                            <div class="alert alert-danger">
                                <p>{!! \Session::get('fail') !!}</p>
                            </div>
                            @endif
                        </div>
                        <form method="POST" action="{{route('video.store')}}" enctype="multipart/form-data">
                            <!-- Email input -->
                            @csrf
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="name" id="form2Example1" class="form-control"
                                    placeholder="name" />
                            </div>
                            <div class="form-outline mb-4 mt-4">
                                <label>Video URL</label>
                                <br>
                                <input type="url" id="url" name="url">
                            </div>


                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Insert
                                URL</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection