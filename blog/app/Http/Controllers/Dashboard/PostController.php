<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Post;
use App\Http\Controllers\Traits\FileUpload;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function list()
    {
        $posts = Post::query();

        return datatables()->of($posts)
            ->make(true);
    }
    public function index()
    {

        return view('dashboard.posts.index');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:1|max:49',
            'description' => 'required|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = $this->saveFiles(request()->file('image'), 'images');
        $data = $request->all();
        $data['image'] = $image_name;

        Post::create($data);
        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.posts.show", ["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("dashboard.posts.form", ["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        request()->validate([
            'title' => 'required|min:1|max:49',
            'description' => 'required|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->has('image')){
            $image_name = $this->saveFiles(request()->file('image'), 'images');
        }else{
            $image_name = $post->image;
        }

        $data = $request->all();
        $data['image'] = $image_name;
        $post->update($data);
        return redirect()->route('dashboard.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

    }
}
