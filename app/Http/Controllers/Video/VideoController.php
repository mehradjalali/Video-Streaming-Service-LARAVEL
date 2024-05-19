<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Models\video\video;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class VideoController extends Controller {
    public function allVideos() {
        if (!isset(Auth::user()->id)) {
            return view('home');
        }
        $user_id = Auth::user()->id;
        $videos = Video::select()->where('user_id', $user_id)->get();
        return view('videos.allVideos', compact('videos'));
    }

    public function uploadVideo() {
        return view('videos.uploadVideo');
    }

    public function storeVideo(Request $request) {
        if (!isset(Auth::user()->id)) {
            return view('home');
        }
        $destinationPath = 'assets/videos';
        if (!isset($request->video)) {
            return Redirect::route('video.upload')->with(['fail' => 'you must select a file']);
        }
        $video = $request->video;
        $filename = $video->getClientOriginalName();
        $videoMoved = $video->move($destinationPath, $filename);
        if (!$videoMoved) {
            return Redirect::route('videos.all')->with(['fail' => 'video upload failed']);
        }
        $storedVideo = Video::create([
            "name" => $request->name,
            "filename" => $filename,
            "user_id" => Auth::user()->id,
        ]);
        return Redirect::route('videos.all')->with(['success' => 'video uploaded successfully']);
    }
}