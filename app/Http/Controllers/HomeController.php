<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
     public function index(){
      // $categories = Category::all();
      $posts = Post::latest()->paginate(2);
  
      return view('home', compact( 'posts'));
}
}