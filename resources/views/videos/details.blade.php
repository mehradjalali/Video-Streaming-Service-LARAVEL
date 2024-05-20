@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="center" style="width:30%">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (\Session::has('update'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('update') !!}</p>
                        </div>
                        @endif
                        <h5 class="card-title mb-5 d-inline">Edit Video</h5>
                        <form method="POST" action="{{route('video.update', $video->id)}}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4 mt-4">
                                <label>Name</label>
                                <input type="text" name="name" id="form2Example1" class="form-control"
                                    value="{{$video->name}}" />
                            </div>
                            <div class="form-outline mb-4 mt-4">
                                <video controls preload="auto" muted loop width="100%" height=auto controls>
                                    <source src="{{$video->URL}}">
                                </video>
                            </div>
                            <div class="form-outline mb-4 mt-4">
                                <label>Video</label>
                                <div class="form-outline mb-4 mt-4">
                                    <label>Video URL</label>
                                    <br>
                                    <input type="url" id="url" name="url" placeholder="{{$video->URL}}"
                                        value="{{$video->URL}}">
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">update</button>
                    </div>
                    <!-- Submit button -->


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection