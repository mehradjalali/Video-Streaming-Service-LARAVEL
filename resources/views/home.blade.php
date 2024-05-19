@extends('layouts.app')

@section('content')

<div id="page-content" class="page-content">

    <section id="categories" class="pb-0 gray-bg" style="margin-top: 300px;">
        <div class="landing-categories owl-carousel">
            <div class="col-md-12 mt-5 text-center">
                <a href="{{route('videos.all')}}" class="btn btn-primary btn-lg">ALL VIDEOS</a>
            </div>
        </div>
        <div class="landing-categories owl-carousel" style="margin-top:-20px;">
            <div class="col-md-12 mt-5 text-center">
                <a href="{{route('video.upload')}}" class="btn btn-primary btn-lg bg-card">UPLOAD VIDEO</a>
            </div>
        </div>
    </section>
</div>
@endsection