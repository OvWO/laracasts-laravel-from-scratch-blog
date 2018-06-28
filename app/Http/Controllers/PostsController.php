<?php
/*Dependency injection(everywhere), constructor(if a injected class needs another class it will call it) injection and method injection(route-model binding example) are passing arguments and Laravel will figure out the class via reflection*/
namespace App\Http\Controllers;
/*A comment*/
use App\Post;
use App\Repositories\PostsRepository;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index',
            'show'
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsRepository $post)//NOTE: IT IS NO THE MODEL./*Example of Automatic Dependency Injection*/
    {
        //  $x = request('year');
        // return $x;
        // $posts = Post::latest();

        /*Think of Repositories as containers or collection of things. A dedicated collection may filter, return results, add more data to it and many more. It can extract repetetive code of controllers*/

        $posts = (new PostsRepository)->all();



         // $posts = Post::latest()
         //    ->filter(request(['month', 'year']))
         //    ->get();

        // if($month = request('month')){
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);//Carbon passes months "strings" to "months numbers (12)"
        // }

        // if($year = request('year')){
        //     $posts->whereYear('created_at', $year);
        // }

        // $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        //     ->groupBy('year', 'month')
        //     ->orderByRaw('min(created_at) desc')// If this line is removed this will not break
        //     ->get()
        //     ->toArray();

        // $archives = Post::archives();

        // $posts = Post::latest()
        //     ->paginate(6)
        // };

        // return view('posts.index')->with('posts', Post::orderBy(
        //     'created_at',
        //     'desc')// or ->oldest()
        //     ->paginate(6)
        // );

        // return view('posts.index', compact('posts','archives'));

        return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
         // return $request;

        /*Debug options*/
        // dump(), var_dump(), return $request
        // dd(request()->all());
        // dd(request('title'));
        // dd(request(['title', 'body']));

        $this->validate(request(), [
            'title' => 'required|min:2',
            'body' => 'required|min:2'
        ]);

        /*option*/ /*Understandable*/ /*DON'T FORGET THE $fillable ARRAY IN THE MODEL*/
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        /*OUTDATED*/
        /*option*/ /*Better and Optimal*/
        // Post::create(request([ 'title', 'body']));

        /*OUTDATED*/
        /*Option*/ /*Custom and Long*/
        // $post = new Post;
        // $post->title = ucfirst(request('title'));
        // $post->body = ucfirst(request('body'));
        // $post->save();

        /*OUTDATED*/
        /*Option*/ /*Custom with Eloquent*/
        // Post::create([
        //     'title' => ucfirst($request['title']),
        //     'body' => ucfirst($request['body'])
        // ]);


        /*Option*/ /*Custom with Eloquent without the request variable*/
        // Post::create([
        //     'title' => ucfirst(request('title')),
        //     'body' => ucfirst(request('body')),
        //     'user_id' => auth()->id() //Dont forget the $fillables array
        // ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // session()->flash('message', 'New post published successfully');

        return redirect('/posts')
            ->with('message', 'New post published successfully');
    }


    public function show(Post $post)
    {
        /*Option*/ /*Long and Undersantadable*/
        // $post = Post::find($id); //change the function variables to $id

        /*Option*/ /*Optimal. Using Route Model Binding*/
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return json_encode('Not working');
        // $post = Post::find($post->id);
        // return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
