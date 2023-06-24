<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Resources\AlbumResource;
class AlbumController extends Controller
{

public function __construct(){
    $this->middleware('auth:sanctum')->except('index','show','fetch');
}


  public function fetch(){
    return AlbumResource::collection(Album::with('songs')->paginate(25));
  }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $albums = Album::all();

        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Album $album)
    {
        //
        // dd($album);
  
        // @session()->flush('success', 'Album Created successfully ');

        $request->validate([
            "title" => 'bail|required',
        ]);
        
        Album::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'description' => $request->description
        ]);


        return redirect()->route('albums');
        // return redirect()->view('albums.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
        $photo = $album->fetchFirstMedia();
        // dd($album->id);
        $songs = Song::where('album_id', $album->id)->get();
        // dd($songs);
        return view('albums.show', compact('album','photo','songs'));
        // dd($photos->file_url);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
        // return "am Editing now";
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album  )
    {
        //
    //   @session()->flush('success', 'Album Tile has been updated successfully!');
    $request->validate([
        "title" => 'bail|required',
    ]);
    
      $album->update([
        'title' => $request->title,
        'artist' => $request->artist,
        'description' => $request->description
      ]);

      return redirect()->route('albums');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //
        $album->delete();
        return redirect()->back(); 
    }

        /**
     * Remove the specified resource from storage.
     */
    public function upload(Request $request, Album $album)
    {
        //

    //    return redirect()->back();

    $request->validate([
        "image" => 'bail|required',
    ]);
    

    if (DB::table('media')->where('medially_id', $album->id)->exists()) {
        // DB::table('media')->where('medially_id', $album->id)->delete();
        // dd($album->fetchFirstMedia());
        $id = $album->id;
        $select = Media::where('medially_id',$id)->firstOrFail();
        
        $select->delete();
        if($select){
            if($request->has('image')){

              $album->attachMedia($request->file('image'));
                 
               }
               
             Album::where("id", $album->id)->update([
                'url' => $album->fetchFirstMedia()['file_url'],
            ]);
            // dd($album->fetchFirstMedia()['file_url']);

        }

    

    }else{

        if($request->has('image')){
            // Album::create()
            $album->attachMedia($request->file('image'));
        }
            Album::where("id", $album->id)->update([
                'url' => $album->fetchFirstMedia()['file_url'],
            ]);
             
           

    }
       
       return redirect()->back();

    }
}
