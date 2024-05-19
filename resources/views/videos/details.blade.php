@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if (\Session::has('update'))
                        <div class="alert alert-success">
                            <p>{!! \Session::get('update') !!}</p>
                        </div>
                        @endif
                    </div>
                    <h5 class="card-title mb-5 d-inline">Edit Video</h5>
                    <form method="POST" action="{{route('video.update', $video->id)}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                value="{{$video->name}}" />
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <video controls preload="auto" muted loop width="400" height="400" controls>
                                <source src="{{asset('assets/videos/'.$video->filename.'')}}" type="video/mp4">
                            </video>
                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <label>Video</label>

                            <input type="file" name="video" id="form2Example1" class="form-control" placeholder="video"
                                accept="video/mp4,video/x-m4v,video/*" />
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