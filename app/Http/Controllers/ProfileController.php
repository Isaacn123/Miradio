<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Agent;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $profile = Profile::first();

        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
        
       return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        //
        // $slug = Str::slug($request->fullname)
        if(isset($request->profile_file)){
            // dd($request->file('profile_file'));
            $path = $request->file('profile_file');
            $nameF = "user_" . time();
            
            $result = $path->storeOnCloudinaryAs('Profile', $nameF);
            $imagename = $result->getFileName();
            $extension = $result->getExtension();
            $paths = $result->getSecurePath();
            // dd($paths);
            $profile->photoUrl = $paths;
        }
   
         $profile->update($request->all());

        return back()->with('success','Profile updated successfully.');

        // return response()->json(['success' => true, 'message' => 'Profile updated successfully.'],200);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }


    public function getprofile($id){
    
        return response([
            'message'=> 'Data profile'
        ]);
    }



  /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function updateagent(Request $request, $profile)
    {
    
        // return back()->with('success','Profile updated successfully.');

        return response()->json(['success' => true, 'message' => 'Profile updated successfully.',
       'response' => $profile
    ],200);
       
    }

}