<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function blog()
    {
        $categories = Category::all();

        $latestposts = Post::orderBy('created_at', 'desc')
                            ->where('status', 1)
                            ->limit(3)
                            ->get();

        $posts = Post::with('category')
                         ->where('status', 1)
                         ->orderBy('created_at', 'desc')
                         ->paginate(9);

        foreach ($posts as $post) {
            # code...
           $user = User::findOrFail($post->user_id);

           $post->author_image = $user->profile_picture;

           $post->author = $user->name;

           //$post->author = $user->name.' '.$user->firstname;
        }


        return view('pages.espace_media',compact('posts', 'categories', 'latestposts'));
    }

    public function postDetails($slug){

        $categories = Category::all();

        $latestposts = Post::orderBy('created_at', 'desc')
                            ->where('status', 1)
                            ->limit(3)
                            ->get();

        $post = Post::with('category')->where('slug', $slug)->first();

        $user = User::findOrFail($post->user_id);

        $post->author_image = $user->profile_picture;

        $post->author = $user->name;

        return view('pages.show',compact('post', 'categories', 'latestposts'));
    }

    public function categoryPosts($slug){

        $categories = Category::all();

        $latestposts = Post::orderBy('created_at', 'desc')
                            ->limit(3)
                            ->get();

        $data = Category::with('posts')->where('slug',$slug)->first();

        foreach ($data->posts as $post) {
            # code...
           $user = User::findOrFail($post->user_id);

           $post->author_image = $user->profile_picture;

           $post->author = $user->name;

           //$post->author = $user->name.' '.$user->firstname;
        }

        return view('website.pages.category_posts',compact('data', 'categories', 'latestposts'));
    }


    public function authorPost($name)
    {

      $categories = Category::all();

      $user = User::where('name', Str::upper($name))->first();

      $latestposts = Post::orderBy('created_at', 'desc')
                            ->limit(3)
                            ->get();

      $posts = $user->posts()->get();

      foreach ($posts as $post) {
            # code...

           $post->author_image = $user->profile_picture;

           $post->author = $user->name;

           //$post->author = $user->name.' '.$user->firstname;
      }

      return view('website.pages.author_posts',compact('posts', 'user', 'categories', 'latestposts'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        $posts = Post::where('user_id', $user_id)
                        ->where('status', 1)
                        ->get();

        foreach ($posts as $post) {
            # code...
           $user = User::findOrFail($post->user_id);

           $post->author_image = $user->profile_picture;

           $post->author = $user->name;

           //$post->author = $user->name.' '.$user->firstname;
        }

        return view('admin.posts.index')->with('posts', $posts);
    }


    public function pending()
    {
        $user_id = auth()->user()->id;

        $posts = Post::where('user_id', $user_id)
                        ->where('status', 0)
                        ->get();

        return view('admin.posts.pending')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    public function check_slug(Request $request)
    {
        // Old version: without uniqueness
        //$slug = str_slug($request->title);

        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:120',
            'slug'  => 'required|min:3|max:255|unique:posts',
            'description' => 'nullable',
            'body' => 'required',
            'attach_file' => 'nullable',
            'video_url' => 'nullable',
            'cover_image' =>'image|nullable',
            'status' => 'required',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        if ($request->hasfile('cover_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->status = $request->input('status');
        $post->user_id = auth()->user()->id;
        //$post->attach_file = $request->input('attach_file');
        $post->video_url = $request->input('video_url');

        if($request->input('category_id') == ''){

            $post->category_id = 1;

        }else{

            $post->category_id = $request->input('category_id');
        }

        //$post->meta_keywords = $request->input('meta_keywords');
        //$post->meta_description = $request->input('meta_description');
        
        //$post->username = auth()->user()->name.' '.auth()->user()->firstname;

        /*$historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Post';
        $historique->user_id = auth()->user()->id;*/

        $post->save();

       //$historique->save();
        if($post->status == 1){
            return redirect()->route('posts.index')
            ->with('success',
             'Article publiée avec succès.');

        }else{
            return redirect()->route('pending_posts')
            ->with('success',
             'Article en attente de publication.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); //Get post specified by id

        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id); //Get post specified by id

        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));

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
        $post = Post::findOrFail($id); //Get post specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'title' => 'required|max:120',
            'slug'  => 'required|min:3|max:255|unique:posts,id,' . $post->slug,
            'description' => 'nullable',
            'body' => 'required',
            'attach_file' => 'nullable',
            'video_url' => 'nullable',
            'cover_image' =>'image|nullable',
            'status' => 'required',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        if ($request->hasfile('cover_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        $post->title = $request->input('title');
        $post->description = $request->input('description');
        //$post->slug = $request->input('slug');
        $post->body = $request->input('body');

        if ($request->hasfile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->status = $request->input('status');
        $post->user_id = auth()->user()->id;
        //$post->attach_file = $request->input('attach_file');
        $post->video_url = $request->input('video_url');

        if($request->input('category_id') == ' '){

            $post->category_id = 1;

        }else{

            $post->category_id = $request->input('category_id');
        }
        // your previous code

        //$post->meta_keywords = $request->input('meta_keywords');
        //$post->meta_description = $request->input('meta_description');
  
        $post->save();

        if($post->status == 1){
            return redirect()->route('posts.index')
            ->with('success',
             'Article éditée avec succès.');

        }else{
            return redirect()->route('pending_posts')
            ->with('success',
             'Article mise en attente.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a post with a given id and delete
        $post = Post::findOrFail($id);
  
        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success',
             'Article supprimée avec succès.');
    
    }
}
