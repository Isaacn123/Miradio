<?php

namespace App\Http\Controllers;

use App\Models\Radio;
use App\Models\Category;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
use App\Http\Resources\RadioResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryRadioResource;

class RadioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $radios = Radio::all();

        return view('radios.index', compact('radios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
     return view('radios.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $ds = Str::uuid('uuid')->toString();

        $request->validate([
            'radio_name',
            'category_id' ,
            'radio_image'

        ]);

        if($request->has('radio_image')){
    
            $result = $request->radio_image->storeOnCloudinaryAs('radio_cover', "_".$ds );

        }

        Radio::create([
            'radio_name' => $request->radio_name,
            'category_id' => $request->cid,
            'radio_image' => $result->getPath(),
            'radio_url' => $request->radio_url,
        ]);

        return redirect()->route('radio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Radio $radio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Radio $radio)
    {
        //
        $categories = Category::all();
        return view('radios.create', compact('radio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Radio $radios)
    {
        //

        $ds = Str::uuid('uuid')->toString();
        $request->validate([
            "radio_name" => 'bail|required',
        ]);
        
          if($request->has('radio_name')){
            // $message->update([
            //     'title' => $message->title,
            //   ]);
            Radio::where('id',radio->id)->update([
                'radio_name' => $request->radio_name,
              ]);
          }

          if($request->has('cid')){
            // $message->update([
            //     'title' => $message->title,
            //   ]);
            Radio::where('id',radio->id)->update([
                'category_id' => $request->cid,
              ]);
          }
         
          if($request->has('radio_image')){
            // $message->updateMedia($request->radio_image); 
            $result = $request->radio_image->storeOnCloudinaryAs('radio_cover_update', "_".$radio->radio_name.$ds );

            Radio::where('id',radio->id)->update([
                'radio_image' => $result->getPath(),
              ]);

          }

         if($request->has('radio_url')){

            Message::where('id',$radio->id)->update([
                'radio_url'  => $request->radio_url,
              ]);
         }
      
    
          return redirect()->route('albums');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Radio $radios)
    {
        //
        $radios->delete();
        return redirect()->back();
    }



    public function recentRadios(){
        $posts = RadioResource::collection(Radio::latest()->take(10)->get());

        return response([
            'data' => $posts,
            "status" => "ok",
            "count" => $posts->count() ,
            "count_total" => Radio::count() ,
        ]);
    }


    public function homeRadios(){
        $featured = RadioResource::collection(Radio::where('featured',1)->get());

        $categories = CategoryRadioResource::collection(Category::where('featured',1)->get());

        $recent = RadioResource::collection(Radio::latest()->take(10)->get());

        $random = RadioResource::collection(Radio::orderByRaw("RAND()")->take(10)->get());

        return response([
            'featured'=> $featured,
            'categories' => $categories,
            'recent' => $recent,
            'radom' => $random,
            "status" => "ok",
        ]);
    }
}
