<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    if (auth()->check() && auth()->user()->role === 'admin') {
        $posts = Post::latest()->paginate(10);
    } else {
        $posts = Post::where('user_id', auth()->id())->latest()->paginate(10);
    }

    return view('posts.index', compact('posts'));
}

        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create  post 
       
    $categories = Category::all(); // Fetch all categories from the database
    return view('posts.create', compact('categories'));
    
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
        'title' => 'required',
        'content' => 'required',
        'featured_image'=> 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id', 
    ]);
$featured_image= null;
if($request->hasfile('featured_image')){
    $image = $request->file('fetaured_image');
    $featured_image = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('uploads'),$featured_image);
}
    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->featured_image= $request->input('featured_Image');
    $post->category_id = $request->input('category_id');
    $post->user_id = auth()->id();

    
    $post->slug = Str::slug($request->input('title'), '-');  
  
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post')); 
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Fetch all categories
        $categories = Category::all(); 
    
        
        return view('posts.edit', compact('post', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($post->featured_image && file_exists(public_path('uploads/'.$post->featured_image))) {
                unlink(public_path('uploads/'.$post->featured_image));
            }
            $image = $request->file('featured_image');
            $featured_image = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $featured_image);
            $post->featured_image = $featured_image;
        }
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
{
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
}

}
