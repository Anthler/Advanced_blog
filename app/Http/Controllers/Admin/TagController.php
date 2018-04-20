<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Tag;

class TagController extends Controller
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
        $this->middleware('can:posts.tag');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin/tag/show', ['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tag/tag');
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
            'name' => 'required',
            'slug' =>'required'
        ]);

        $tag = new Tag;

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect()->route('tag.index');
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
        $tag = tag::where('id',$id)->first();
        return view('admin.tag.edit',compact('tag'));
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

                'slug'=>'required',
                'name'=>'required',
                
        ]);

        $tag = tag::find($id);

        $tag->name = $request->name;
        $tag->slug = $request->slug;

        $tag->save();

        return redirect()->route('tag.index')->with('info', 'Tag edited  titled: '.$tag->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        tag::where('id',$id)->delete();
        return redirect()->back()->with('info', 'Tag is Deleted');
         
    }
}
