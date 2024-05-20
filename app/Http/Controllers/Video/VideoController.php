<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use App\Models\video\video;
use Auth;
use File;
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

    public function insertURL() {
        return view('videos.insertURL');
    }

    public function storeVideo(Request $request) {
        if (!isset(Auth::user()->id)) {
            return view('home');
        }
        $storedVideo = Video::create([
            "name" => $request->name,
            "URL" => $request->url,
            "user_id" => Auth::user()->id,
        ]);
        return Redirect::route('videos.all')->with(['success' => 'video inserted successfully']);
    }

    public function deleteVideo($id) {
        $deleteVideo = Video::find($id);
        if (File::exists(public_path('assets/videos/' . $deleteVideo->filename))) {
            File::delete(public_path('assets/images/' . $deleteVideo->filename));
        }
        $deleteVideo->delete();
        if ($deleteVideo) {
            return Redirect::route('videos.all')->with(['success' => 'video deleted successfully']);
        }
    }

    public function videoDetails($id) {
        $video = Video::find($id);
        if (!$video) {
            return Redirect::route('home');
        }
        return view('videos.details', compact('video'));
    }
    public function editVideo(Request $request, $id) {
        if (!isset(Auth::user()->id)) {
            return view('home');
        }
        $video = Video::find($id);
        $file = $video->filename;
        if (isset($request->video)) {
            $destinationPath = 'assets/videos';
            $file = $request->video->getClientOriginalName();
            $request->video->move(public_path($destinationPath), $file);
        }

        $video->update([
            "name" => $request->name,
            "filename" => $file,
        ]);
        if ($video) {
            return Redirect::route('video.details', $id)->with(['update' => 'video edited successfully']);
        }
    }
}