<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\Model\User\Tag;
use App\Model\User\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $posts = Post::all();
        return view('admin/post/show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('posts.create')){
            $tags = tag::all();
            $categories = category::all();
            return view('admin/post/post', compact('tags','categories'));
        }

        return redirect(route('admin.home'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

                'title'=>'required',
                'subtitle'=>'required',
                'slug'=>'required',
                'body'=>'required',
        ]);

        if($request->hasFile('image')){

            $imageName = $request->image->store('public');
        }

        $post = new Post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->status = $request->status;
        $post->body = $request->body;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

          

        

        return redirect()->route('post.index')->with('info', 'Post add titled: '.$post->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         if (Auth::user()->can('posts.update')) {
            $post = post::with('tags','categories')->where('id',$id)->first();
            $tags =tag::all();
            $categories =category::all();
            return view('admin.post.edit',compact('tags','categories','post'));
        }
        return redirect(route('admin.home'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
          $this->validate($request,[

                'title'=>'required',
                'subtitle'=>'required',
                'slug'=>'required',
                'body'=>'required',
        ]);


           if($request->hasFile('image')){

            $imageName = $request->image->store('public');
           // return 'yes';
        }

        $post = post::find($id);

        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->status = $request->status;
        $post->body = $request->body;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        $post->save();  

        

        return redirect()->route('post.index')->with('info', 'Post edited  titled: '.$post->title);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back()->with('info', 'Post is Deleted');
    }
}
