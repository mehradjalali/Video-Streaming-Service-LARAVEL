@extends('layouts.app')

@section('content')

<br><br><br><br>
<div style="text-align: center;">
    <div class="col">
        <div class="card">
            <div class="card-body">
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
                <a href="{{route('video.insert')}}" class="btn btn-primary btn-lg mb-4 text-center">Insert URL</a>
                @if ($videos->count())
                <table align="center" style="width: 100%" class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">URL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $video)
                        <tr>
                            <th scope="row">
                                {{$video->id}}
                            </th>
                            <td height=auto width=100% align="center">
                                <div class="actions_link">
                                    <br>
                                    <a href="#myModal{{$video->id}}" class="btn btn-warning btn-lg"
                                        data-toggle="modal">{{$video->name}}</a>
                                    <br><br>
                                    <!-- Modal HTML -->
                                    <div id="myModal{{$video->id}}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn btn-lg btn-danger"
                                                        data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body flex">
                                                    <iframe id="cartoonVideo" src="{{$video->URL}}" frameborder="1"
                                                        allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-outline-primary"
                                        href="{{route('video.details', $video->id)}}">Edit</a>
                                    <a> | </a>
                                    <a class="btn btn-outline-danger" onclick="return confirm('Are you sure?')"
                                        href=" {{route('video.delete', $video->id)}}">Delete</a>
                                </div>
                            </td>
                            <td height=auto width="100%" valign="middle" align="center">
                                <a href="{{$video->URL}}" class="btn btn-success"> Video URL </a>
                            </td>

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