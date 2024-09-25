<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\Category;
use Illuminate\Support\Facades\Auth;


class GaleriPhotocontroller extends Controller
{
    public function index()
    {

        $listPost = Post::first();

       return view('admin.galeri-photo.index', [
        'pageTitle' => 'Galeri-photo',
        'listPost' => Post::all()
       ]);

    }
    public function create()
    {
        // dd(Category::categories);
        return view('admin.galeri-photo.create', [
            'pageTitle'        =>'create Galeri-Photo',
            'listCategory' => Category::categories,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required',
            'description'    => 'required',
            'category'       => 'required'
        ],[
            'title.required' => 'kamu sedang error',
            'description.required' => 'kamu sedang error'
        ]);
        $post = Post::create([
            'title'=>$validated['title'],
            'description'=>$validated['description'],
            'category'=>$validated['category'],
            'user_id'=>Auth::user()->id
        ]);
        return redirect(route('admin-galeri-photo', absolute: false));

        // dd($post);
        // return redirect();

    }
    public function edit(string $postid){
       $post=post::findOrfail($postid);
       //mengembalikan ke halaman admin edit
       return view('Admin.galeri-photo.edit', [
        'pageTitle' => 'Edit Album',
        'post'      => $post,
        'listCategory' => Category::categories,
       ]);
        // dd('mau edit galeri-photo..',$post);
    }

}
