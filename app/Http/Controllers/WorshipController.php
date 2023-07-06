<?php

namespace App\Http\Controllers;

use App\Models\Worship;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $worships = Worship::all();
        return view('worshipmusic.index', compact('worships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('worshipmusic.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // dd($request->music_url);

        $ds = Str::uuid('uuid')->toString();

        $request->validate([
            'music_name',
            'category_id' ,
            'music_image',
            'music_url'

        ]);

        if($request->has('music_image')){
    
            $images = $request->music_image->storeOnCloudinaryAs('worship_cover', "_".$ds );

        }


    $worship = Worship::create([
            'music_name' => $request->music_name,
            'category_id' => $request->cid,
            'music_image' => $images->getPath(),
            
        ]);

        if($request->has('music_url')){
            $dsw = Str::uuid('uuid')->toString();
    
            $music = $request->music_url->storeOnCloudinaryAs('worship_music', "_".$request->music_name.$dsw );
            $worship->update([
            'music_url' =>  $music->getPath(),
            ]);
        }

        return redirect()->route('music.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Worship $worship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worship $worship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worship $worship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($worship)
    {
        //

        $wors = Worship::find($worship)->first();

        // dd($wors);

        $wors->delete();
         return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $category = Worship::find($request->id);
        $category->featured = $request->status;
        $category->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
