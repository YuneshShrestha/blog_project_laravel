<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth',['except'=>['index', 'show']]);
    }

    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        // dd($request);
       
        if($search != ""){
            
            $posts= Post::where('title', 'LIKE', "%$search%")->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
             }
            )->paginate(5);

            // $posts= Post::where('title', 'LIKE', "%$search%")->paginate(5);
            
            // $posts= Post::orderBy('updated_at','DESC')->paginate(5);
        }
        else{
            // return $search;
            $posts= Post::orderBy('updated_at','DESC')->paginate(5);
        }
        $data = compact('posts','search');
        return view('blog.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'title'=> 'required',
           'description'=> 'required',
           'image'=>'bail|required|mimes:jpeg,jpg,png|max:5048'
       ]);
       $post = new Post();
       $post->title = $request->title;
       $post->description = $request->description;
       if($request->hasFile('image')){
           $temp = $request->image;
           $name =  time() . $temp->getClientOriginalName();
           $temp->move('images/',$name);
           $post->image_path = 'images/'.$name;
       }
       $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
       $post->slug = $slug;
       $post->user_id = auth()->user()->id;
       $post->save();
       $message = [
        'message'=>'Post has been added',
        'message_type'=>'post'
       ];
       return redirect('/blog')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('blog.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'image'=>'mimes:jpeg,jpg,png|max:5048'
        ]);
        $post = Post::where('slug',$slug)->first();
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->hasFile('image')){
            $temp = $request->image;
            $name =  time() . $temp->getClientOriginalName();
            $temp->move('images/',$name);
            $post->image_path = 'images/'.$name;
        }
        $post->save();
        $message = [
            'message'=>'Post has been updated',
            'message_type'=>'update'
           ];
        return redirect('/blog')->with('message', $message);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
       $post = Post::where('slug',$slug)->first();
       $post->delete();
       $message = [
        'message'=>'Post has been deleted',
        'message_type'=>'delete'
       ];
       return redirect('/blog')->with('message', $message);
    }
    // public function search(){
    //     return 'search';
    // }
}
