<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
use App\Http\Resources\SocialResource;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $socials = Social::all();
        return view('socials.index', compact('socials'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ds = Str::uuid('uuid')->toString();

        $request->validate([
           'name', 
           'icon',
        ]);
        if($request->has('icon')){

            $result = $request->icon->storeOnCloudinaryAs('social_media_icons', "_".$ds );
        }
        Social::create([
            'name' => $request->name, 
            'icon' => isset($result) ? $result->getPath() : '',
            'url' => $request->url
        ]);

        return redirect()->route('social.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Social $social)
    {
        //
        return view('socials.create',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Social $social)
    {
        //


        if($request->has('name')){
            Social::where('id', $social->id)->update([
                'name' => $request->name, 
            ]); 
        }


        if($request->has('url')){
            Social::where('id', $social->id)->update([
                'url' => $request->url, 
            ]); 
        }

        if($request->has('icon')){

            $result = $request->icon->storeOnCloudinaryAs('social_media_icons', "_".$social->name.$ds );

            Social::where('id', $social->id)->update([
                'icon' => $result->getPath(), 
            ]);
        }


        return redirect()->route('social.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Social $social)
    {
        //
        $social->delete();

        return redirect()->back();
    }


    public function getsocials(){

        $socials = SocialResource::collection(Social::all());

        return response([
            'data' => $socials,
            'status' => "ok"
        ]);
    }
}
