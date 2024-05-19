@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('success') !!}</p>
                    </div>
                    @endif
                    @if (\Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{!! \Session::get('fail') !!}</p>
                    </div>
                    @endif
                </div>
                <h5 class="card-title mb-4 d-inline">Videos</h5>
                <a href="{{route('video.upload')}}" class="btn btn-primary mb-4 text-center float-right">Upload
                    Videos</a>
                @if ($videos->count())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">video</th>
                            <th scope="col">name</th>
                            <th scope="col">filename</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <th scope="row">{{$video->id}}</th>
                            <td>
                                <video controls preload="auto" muted loop width="150" height="150" controls>
                                    <source src="{{asset('assets/videos/'.$video->filename.'')}}" type="video/mp4">
                                </video>
                            </td>
                            <td>{{$video->name}}</td>
                            <td>{{$video->filename}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="container">
                    <div class="alert alert-danger margin-top: -25px;">
                        <p>No videos uploaded yet</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection