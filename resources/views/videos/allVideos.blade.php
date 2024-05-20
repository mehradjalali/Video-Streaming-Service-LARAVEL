@extends('layouts.app')

@section('content')

<br><br><br><br>
<div style="text-align: center;">
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
                <a href="{{route('video.upload')}}" class="btn btn-primary btn-lg mb-4 text-center">Insert URL</a>
                @if ($videos->count())
                <table align="center" style="width: 100%" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Video</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <th scope="row">{{$video->id}}</th>
                            <td height=auto width="100%" valign="middle" align="center">
                                <br>
                                <video controls preload="auto" muted loop width="15%" height=auto controls>
                                    <source src="{{asset('assets/videos/'.$video->filename.'')}}" type="video/mp4">
                                </video>
                                <div class="actions_link">
                                    <a href="#myModal{{$video->id}}" class="btn btn-warning" data-toggle="modal">Show
                                        Video</a>

                                    <!-- Modal HTML -->
                                    <div id="myModal{{$video->id}}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn btn-lg btn-danger"
                                                        data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body flex">
                                                    <iframe id="cartoonVideo"
                                                        src="{{asset('assets/videos/'.$video->filename.'')}}"
                                                        frameborder="1" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a> | </a>
                                    <a class="btn btn-primary" href="{{route('video.details', $video->id)}}">Edit</a>
                                    <a> | </a>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                        href=" {{route('video.delete', $video->id)}}">Delete</a>
                                </div>
                            </td>
                            <th scope="row"><a class="btn btn-lg btn-info"
                                    href="{{route('video.details', $video->id)}}">{{$video->name}}</a></th </tr>
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
</div>
@endsection