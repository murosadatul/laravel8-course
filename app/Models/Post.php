<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function archives()
    {
        $query = $this->selectRaw(" DATE_FORMAT(created_at, '%M %Y') as created, count(1) as total")
        ->groupBy("created")
        ->get();
        return $query;
    }

    function articles()
    {
        $query = Post::selectRaw('*,
        (select name from categories where id = category_id) as categori')->paginate(5);
        return $query;
    }
}
