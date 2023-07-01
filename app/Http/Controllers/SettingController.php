<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        if(Setting::first()){
        $id = Setting::first()->id;
        return view('settings.index');
        }else{
            return view('settings.index');
        }

    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd('STORE');

        $post = $request->all();

        $settings = Setting::create($post);

        return redirect()->route('setting.index')
                        ->with('success',' Settings created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //

        return view('settings.change');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    //    $posts = $request->all()
        $setting->update($request->all());
//    dd($request);



  return redirect()->back()
  ->with('success','Settings updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }


    public function getsettings(){

        $posts = Setting::where('id',1)->first();

        return response([
            'status' => 'ok',
            'settings' => $posts
        ]);
    }


    public static function quickRandom($length = 45)

{
    // $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $key =substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    return redirect()->back()->with('key');
}


}
