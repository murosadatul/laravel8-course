<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_tag extends Model
{
    use HasFactory;
    protected $table = 'post_tags';

    public function articles($tag_id)
    {
        $query = Post_tag::join('posts','posts.id','=','post_id')
        ->select('posts.*')
        ->where('post_tags.tag_id','=',$tag_id)
        ->paginate(5);
        return $query;
    }
}
