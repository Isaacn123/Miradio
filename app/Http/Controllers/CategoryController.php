<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Radio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Http\Resources\ModelCategoryResource;
use App\Http\Resources\PostRadioResource;
use App\Http\Resources\RadioCategoryDetailsResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $limit = 25;
        return  view('category.index')->with('categories', CategoryResource::collection(Category::orderBy('id', 'desc')->paginate($limit)));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_name',
            'slug'
        ]);

     $category =  Category::create([
        'category_name' => $request->name,
        'slug' => Str::slug($request->name), 
      ]);

     
     
   if($category){
    if($request->has('image')){
        $category->attachMedia($request->file('image'));
 }
 
   $id = $category->id;

  
   }

   Category::where('id', $id)->update([
    'category_image' => $category->fetchFirstMedia()['file_url'],
 ]);


     return redirect()->route('categorys');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('category.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        $category->delete();
        redirect()->back(); 
    }

    // public function approve(Category $training) 
    // {
    //     $training->update(['featured' => '1']);

    //     return redirect()->route('features')->with('success', 'Category Approved'); // if you want to redirect to a list of all trainings and would need an index action
    //     // return redirect()->route('trainings', ['training' => $training])->with('success', 'Training Approved'); // if you want redirect to detail page of this training
    // }

    public function changeStatus(Request $request)
    {
        $category = Category::find($request->id);
        $category->featured = $request->status;
        $category->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function fetch(){
        $c = CategoryResource::collection(Category::with('messages')->get());
        // $key = $c->search(function($item) {
        //     return $item->category_name != 'Radios';
        // });

        $d = 'Radios';

        $filtered = $c->filter(function ($value, $key) use($d){
            return $value['category_name']!=$d;
        });
        
       return   $filtered;

        // return CategoryResource::collection(Category::with('messages')->orderBy('id', 'desc')->paginate(25));
      }

      public function single_category($id){
       $category = Category::where('id', $id)->with('messages')->first();

       return response([
        'data' =>  $category,
        'success' => "successfully retrieved."
       ]);
       
      }

      public function single_message($id){

        $message = Message::where('id',$id)->with('audios')->first(); 
        
        return response([
           'data' =>  $message,
           'success' => "successfully retrieved."    
        ]);
   
       }

       public function category_details($id){

        $posts =   PostRadioResource::collection(Radio::where('category_id',$id)->get());
        
        $category =  Category::where('id',$id)->first();

        return response([
        'status' => 'ok',
        "count" =>  Radio::count(),
        'category' =>  $category,
        'posts' => $posts,
        ]);

       }


       public function categories(){
        
        $categories =  ModelCategoryResource::collection(Category::all());

        return response([
            "status" => "ok",
            "count" => Category::count(),
            "categories" => $categories
        ]);
       }
}
