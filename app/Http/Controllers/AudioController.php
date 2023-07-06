<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AudioController extends Controller
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
    public function create(Message $message)
    {
        //

        // dd($message->id);
        return view('audios.create', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Message $message)
    {
        //

        // dd($message->id);

        $ds = Str::uuid('uuid')->toString();

        // dd($ds);
        //
        // dd($album->id);
        // @session()->flush('success','audio music has been successfully add to the ALBUM');
        $request->validate([
            "title" => 'bail|required',
            'audio' => 'bail|required',

        ]);
        if($request->has('audio') && $request->has('title')){
            //   dd($request->audio);
              
            $result = $request->audio->storeOnCloudinaryAs('message_audios', "messages_".$ds );
            // $result = $request->audio->uploadFile();

            if($request){
               $audio =  Audio::create([
                    'message_type' => 'App\Models\Message',
                    'message_id' => $message->id,
                    'file_url' => $result->getPath(),
                    'audio_title' => $request->title,
                    'file_type' => $result->getFileType(),
                    'size' => $result->getSize(),
                ]);

                Message::where('id',$message->id)->update([
                    'audio_id' => $audio->id
                ]);
            }
      
        }
      
        return redirect()->back();

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Audio $audio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audio $audio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Audio $audio)
    {
        //
    }
}
