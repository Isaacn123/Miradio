<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Category;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Resources\MessageResource;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $limit = 25;
        return view('messages.index')->with('messages', Message::orderBy('id', 'desc')->paginate($limit));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //\
        $categories = Category::all();
        return view('messages.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ds = Str::uuid('uuid')->toString();
        $request->validate([
            'title',
            'category'
        ]);

        $messages = new Message();

          $messages->title =  $request->title;
          $messages->cid = $request->categoryid;

          $messages->save();


          if($messages){
            if($request->has('audio_file')){
           
                $result = $request->audio_file->storeOnCloudinaryAs('messages', "message_".$ds );
    
            }
    
            if($request->has('image')){
    
             $messages->attachMedia($request->file('image'));
                   
              }

          $select = Media::where('medially_id', $messages->id)->firstOrFail();
          Message::where('id', $messages->id)->update([
           'image_cover' => $messages->fetchFirstMedia()['file_url'],
           'stream_url' => $result->getPath(),
           'medially_id' =>   $select->id,
          ]);
        
          }

          return redirect()->route('message.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
        $categories = Category::all();
        return view('messages.create', compact('categories'))->with('message', $message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
        $ds = Str::uuid('uuid')->toString();
        $request->validate([
            "title" => 'bail|required',
        ]);
        
          if($request->has('title')){
            $message->update([
                'title' => $message->title,
              ]);
          }
         
          if($request->has('image')){
            $message->updateMedia($request->image); 

            Message::where('id',$message->id)->update([
                'image_cover' => $message->fetchFirstMedia()['file_url'],
              ]);

          }

         if($request->has('audio_file')){
            $request->audio_file->storeOnCloudinaryAs('messages', "message_".$ds );

            Message::where('id',$message->id)->update([
                'stream_url'  => $result->getPath(),
              ]);
         }
      
    
          return redirect()->route('albums');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
        $select = Media::where('medially_id', $messages->id)->firstOrFail();
        $message->delete();
        $select->delete();
        return redirect()->back();
    }

    public function fetch_messages(){
      return  MessageResource::collection(Message::with('category')->paginate(25));
    }

    public function single_message($id){

     $message = Message::where('id',$id)->first(); 
     
     return response([
        'data' =>  $message,
        'success' => "successfully retrieved."
     ]);

    }
}
