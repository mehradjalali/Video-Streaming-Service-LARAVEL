@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 50px;">
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
                            <th scope="col">name</th>
                            <th scope="col">length</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <th scope="row">{{$video->id}}</th>
                            <td>{{$video->name}}</td>
                            <td>{{$video->length}}</td>

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