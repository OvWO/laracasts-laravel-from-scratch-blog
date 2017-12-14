<?php

namespace App\Repositories;

use App\Post;

class PostsRepository
{
    public function all()
    {
        return Post::latest()
            ->filter(request(['month', 'year']))
            ->paginate(5);
    }

}
