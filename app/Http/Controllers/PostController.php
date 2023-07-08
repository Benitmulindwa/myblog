<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::latest()->paginate(6);

        return view('blog.index',[
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=$request->validate([

            'title'=>'required|string|unique:posts,title|max:30',
            'min_to_read'=>'required|numeric',
            'body'=>'required|string|max:255',
            'image'=>'nullable|image',
        ]);
        if($request->hasFile('image')){
            $fields['image']=$this->storeimage($request);
        }
        // else {
        //     $fields['image']=''
        // }

        Post::create($fields);

        return redirect(route('blog.index'))
            ->with('message','The article has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findorfail($id);
        //dd($post);
        return view('blog.show',[
            'post'=>$post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('blog.edit',[
            'post'=>Post::findorfail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::findorfail($id);
        $post->update($request->except(['_token','_method']));

        return redirect(route('blog.index'))->with('message', 'The article has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findorfail($id);
        $post->delete();

        return redirect(route('blog.index'))->with('message','Post has been deleted successfully!');
    }
    public function storeimage($request){

        
        $newImageName=uniqId().'-'.$request->title.'.'.$request->image->extension();
        return $request->image->move(public_path('image'), $newImageName);
        }
    
}
