<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Models\video\video;
use Auth;

class VideoController extends Controller {
    public function allVideos() {
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
            $videos = Video::select()->where('user_id', $user_id)->get();
            return view('videos.allVideos', compact('videos'));
        }
    }
}