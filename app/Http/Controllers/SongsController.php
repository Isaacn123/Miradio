<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use App\Models\Album;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Album $album)
    {
        //

        return view('songs.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Album $album)
    {
        //
        // dd($album->id);
        // @session()->flush('success','audio music has been successfully add to the ALBUM');
        $request->validate([
            "title" => 'bail|required',
            'audio' => 'bail|required',

        ]);
        if($request->has('audio') && $request->has('title')){
            //   dd($request->audio);
            $result = $request->audio->storeOnCloudinaryAs('audios', 'songs');
            // $result = $request->audio->uploadFile();

            if($request){
                Song::create([
                    'album_type' => 'App\Models\Album',
                    'album_id' => $album->id,
                    'file_url' => $result->getPath(),
                    'song_title' => $request->title,
                    'file_type' => $result->getFileType(),
                    'size' => $result->getSize(),
                ]);
            }
      
        }
      
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $songs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $songs)
    {
        //
    }
}
