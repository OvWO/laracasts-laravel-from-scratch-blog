<?php

namespace App;

use App\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function publish(Post $post)
    {
        /*Option*/ /*Very Verbose*/
        // Post::create([
        //     'title' => ucfirst(request('title')),
        //     'body' => ucfirst(request('body')),
        //     'user_id' => auth()->id() //Dont forget the $fillables array
        // ]);

        /*Option*/ /*Longer way. Requires an array of params*/
        // $this->posts()->create(
        //     'title' => ucfirst(request('title')),
        //     'body' => ucfirst(request('body')),
        //     'user_id' => auth()->id() //Dont forget the $fillables array
        // ]);


        /*Option*/ /*Using the post relationship*/
        $this->posts()->save($post);
     }
}
